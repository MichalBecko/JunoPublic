<?php

namespace ProjectModule\Classes;

/**
 * Description of DefaultValues
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class DefaultValues {
    
    public static $TRUNCATE_MAX_SIZE = 40;
    public static $CONTACT_MAIL = "ahyben@denevy.eu";
    public static $MAX_FILE_SIZE = 2097152;

    public static function getPriorities() {
        return [
            1 => "Low",
            2 => "Medium",
            3 => "High"
        ];
    }
    
    public static function getStatuses() {
        return [
            1 => "No Run",
            2 => "Passed",
            3 => "Failed",
            4 => "N/A",
            5 => "Not completed"
        ];
    }

    public static function getIssueTypes() {
        return [
            1 => "Bug",
            2 => "Defect",
            3 => "Request"
        ];
    }

    public static function getIssueStatuses() {
        return [
            1 => "New",
            2 => "Open",
            3 => "Reopen",
            4 => "Fixed",
            5 => "For Retest",
            6 => "Rejected",
            7 => "Closed"
        ];
    }

    public static function getLabelByStatusID($statusID) {

        $class = "";
        switch ($statusID) {
            case 1:
                $class = "";
                break;
            case 2:
                $class = "success";
                break;
            case 3:
                $class = "danger";
                break;
            case 4:
                $class = "warning";
                break;
            case 5:
                $class = "warning";
                break;
        }

        return $class;
    }
    
    public static function getMaxFileSizeInMB() {
        
        $bytes = self::$MAX_FILE_SIZE;
	
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    
}
