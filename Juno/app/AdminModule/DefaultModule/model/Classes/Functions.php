<?php

namespace DefaultModule\Classes;

use Nette\Object,
    Nette\Utils\Arrays,
    Nette\Utils\DateTime;

/**
 * Description of Functions
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class Functions extends Object {
    
    public static function inputEmptyFirstKey($data) {
        Arrays::insertBefore($data, NULL, ["" => "-"]);
        return $data;
    }
    
    public static function disableMaxExecutionTime() {
        ini_set("max_execution_time", 0);
    }
    
    /**
     * Finds out whether it is user or bot
     * @return bool
     */
    public static function isItBot(){
	
	$useragent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
	
	if (isset($useragent) && preg_match('/bot|crawl|slurp|spider/i', $useragent)) {
	    return TRUE;
	  }
	  else {
	    return FALSE;
	  }
    }
    
    /**
     * This function formates predefined invoice number prefix to concrete invoice number
     * It checks RRRR, RR, MM, CCCC...
     * Other chars are left in string
     * @param string $invoiceNumberPrefix
     * @param int $lastId
     * @return string
     */
    public static function returnFormattedInvoiceNumber($invoiceNumberPrefix, $lastId) {
        
        $formattedNumber = $invoiceNumberPrefix;
        $today = new DateTime();
        // contains our prefixes
        // YEAR IN RRRR
        $rrrr = strpos($invoiceNumberPrefix, "RRRR");
        // YEAR IN RR
        if (!$rrrr) {
            $rr = strpos($invoiceNumberPrefix, "RR");
        } else {
            $rr = !$rrrr;
        }
        // Month in MM
        
        $mm = strpos($invoiceNumberPrefix, "MM");
        
        if ($rrrr !== FALSE) $formattedNumber = str_replace ("RRRR", $today->format("Y"), $formattedNumber);
        if ($rr !== FALSE) $formattedNumber = str_replace ("RR", $today->format("y"), $formattedNumber);
        if ($mm !== FALSE) $formattedNumber = str_replace ("MM", $today->format("m"), $formattedNumber);        
        
        // last we do numberzzz as CCCC..
        $countCs = substr_count($formattedNumber, "C");
        // we remove CCCC...
        $formattedNumber = str_replace("C", "", $formattedNumber);
        // we get number with leading zeroes
        $lastIdWIthZeroes = sprintf("%0".$countCs."d", $lastId);
        $formattedNumber = $formattedNumber . $lastIdWIthZeroes;
        
        // Ezzzzzzz ♥
        return $formattedNumber;
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
    
    /**
     * Converts array of arrays to pairs
     * @param type $key - string | null
     * @param type $value - string | array
     * @param type $data - array containing arrays
     * @return Array
     */
    public static function formatArrayToPairs($key, $value, $data) {
        
        $array = [];
        if (is_array($value)) {
           foreach ($data as $d) {
                
                $string = "";
                foreach ($value as $v) {
                    $string = $string . $d[$v] . " ";
                }
                
                if (is_null($key)) {
                    $array[] = $string;
                } else {
                    $array[$d[$key]] = $string;
                }
            }
        } else {
            foreach ($data as $d) {
                if (is_null($key)) {
                    $array[] = $d[$value];
                } else {
                    $array[$d[$key]] = $d[$value];
                }
            }
        }
        
        return $array;
    }
    
    /**
     * Converts array to array which has ID and VALUE the same
     * @param type $array
     * @return type
     */
    public static function formatArrayToSameKeyValue($array) {
        
        $arr = [];
        foreach ($array as $a) {
            $arr[$a] = $a;
        }
        
        return $arr;
    }
    
    /**
     * Returns random hexa colors depending on limit
     * @param type $limit
     * @return string
     */
    public static function getRandomColors($limit = 20) {
        
        $newArray = [];
        
        for ($i = 0; $i < $limit; $i++) {
            
            $randomColor = "#". Functions::getRandomColorPart() . Functions::getRandomColorPart() . Functions::getRandomColorPart();
            $newArray[] = $randomColor;
        }
        
        return $newArray;        
    }
    
    /**
     * Returns random color part
     * @return type
     */
    private static function getRandomColorPart() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    /**
     * Remove array values if they are empty | null
     * @param type $arr
     * @return type
     */
    public static function removeEmptyValues($arr) {
        
        foreach ($arr as $aId => $value) {
            if ($value == "" || $value === " " || $value == NULL) {
                unset($arr[$aId]);
            }
        }
        
        return $arr;
    }
    
    /**
     * Add months as new index if it is missing and sort it by key so it is 1,2,3,4,5..
     * @param string $arr
     * @return string
     */
    public static function addMissingMonths($arr) {
        
        for ($i = 1; $i <= 12; $i++) {
            
            if (!array_key_exists($i, $arr)) {
                $arr[$i] = "0";
            }
            
        }
        ksort($arr);
        
        $newArr = [];
        foreach ($arr as $a) {
            $newArr[] = $a;
        }
        
        return $newArr;
    }
    
    /** 
      * Delete multimedia file if $param is multimedia
      * @param $param is Object of Multimedia or string
      */
    public static function deleteFile($param) {
        
        if (is_object($param)) {
            if (file_exists($param->getPath())) {
                unlink($param->getPath());
            }
        } elseif (is_null($param)) {
            
        } else {
            if (file_exists($param)) {
                unlink($param);
            }
        }
        
    }
    
    public static function generateRandomString($length) {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    } 
    
}
