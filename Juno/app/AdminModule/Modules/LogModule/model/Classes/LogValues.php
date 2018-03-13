<?php

namespace LogModule\Classes;

use Nette\Reflection\ClassType;

class LogValues {

    const ACTION_INSERT = 1,
        ACTION_UPDATE = 2,
        ACTION_DELETE = 3;

    const TAB_PROJECTS = 4,
        TAB_DASHBOARD = 5,
        TAB_TEST_ANALYSES = 6,
        TAB_TEST_PLAN = 7,
        TAB_TEST_EXECUTION = 8,
        TAB_ISSUES = 9,
        TAB_SETTINGS = 10;

    public static $LOG_VALUES = [];

    public static function getLogValues() {
        $constants = array_flip(self::$LOG_VALUES);
        return $constants;
    }

    public static function setValues() {
        self::$LOG_VALUES = ClassType::from(self::class)->constants;
    }

}