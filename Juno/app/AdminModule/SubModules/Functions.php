<?php

namespace Functions;

use Nette\Utils\Arrays;

/**
 * Description of Functions
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class Functions {

    /**
     * This function returns status of test case by its test steps
     * @param $testSteps
     * @param $countOfTestSteps
     * @return int
     */
    public static function getStatusOfTestCase($testSteps, $countOfTestSteps) {

        // default status is No Run
        $statusID = 0;
        //if all test steps were tested
        if (count($testSteps) == $countOfTestSteps) {

            // if something is failed = Failed
            if (in_array(3, $testSteps)) {
                $statusID = 3;
            // else if something is N/A = N/A
            } elseif (in_array(4, $testSteps)) {
                $statusID = 4;
            // else if it has not completed = Not Completed
            } elseif (in_array(5, $testSteps)) {
                $statusID = 5;
            // else we are happy = Passed!
            } else {
                $statusID = 2;
            }

        // if not, we return Not Completed
        } else {
            $statusID = 5;
        }

        return $statusID;
    }
    
    /**
     * This functions checks array and return its values only by matched $params criterai
     * @param [] $arr
     * @param [] $params
     * @return type
     */
    public static function returnArrIfExists($arr, $params) {
        
        $return = [];
        foreach ($arr as $a) {
            
            $totalBoolean = TRUE;
            foreach ($params as $paramName => $paramValue) {
                if ($a[$paramName] != $paramValue) {
                    $totalBoolean = FALSE;
                }
            }
            if ($totalBoolean) {
                $return[] = $a;
            }            
        }
        return $return;
    }
    
    public static function is_decimal( $val ) {
        return is_numeric( $val ) && floor( $val ) != $val;
    }
    
    /**
     * Converts array of objects to pairs
     * @param type $key - string | null
     * @param type $value - string | array
     * @param type $data - array containing objects
     * @return Array
     */
    public static function formatToPairs($key, $value, $data) {
        
        $array = [];
        if (is_array($value)) {
            foreach ($data as $d) {
                
                $string = "";
                foreach ($value as $v) {
                    $string = $string . $d->$v . " ";
                }
                
                if (is_null($key)) {
                    $array[] = $string;
                } else {
                    $array[$d->$key] = $string;
                }
            }
        } else {
            foreach ($data as $d) {
                if (is_null($key)) {
                    $array[] = $d->$value;
                } else {
                    $array[$d->$key] = $d->$value;
                }
            }
        }
        
        return $array;        
    }
    
    public static function insertEmptyArray($array) {
        Arrays::insertBefore($array, NULL, ["" => "-"]);
        return $array;
    }
    
}
