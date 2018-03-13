<?php

use Nette\Reflection\ClassType;

/**
 * Description of Permission
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class Privilege  {
    
    /** ONLY CONST FOR PRIVILEGES!!! */
    CONST
        /** MENU V PROJEKTOCH */
        DASHBOARD_MENU_ITEM = 1,
        TEST_PLAN_MENU_ITEM = 2,
        TEST_ANALYSES_MENU_ITEM = 3,
        TEST_EXECUTION_MENU_ITEM = 4,
        ISSUES_MENU_ITEM = 5,
        SETTINGS_MENU_ITEM = 6,

        /** TEST ANALYSES */
        CREATE_TEST_SET = 7,
        CREATE_TEST_CASE = 8,
        CREATE_BULK_TEST_CASE = 9,
        CREATE_IMPORT = 38,
        EDIT_TEST_SET = 10,
        EDIT_TEST_CASE = 11,
        DELETE_TEST_SET = 12,
        DELETE_TEST_CASE = 13,
        SET_APPROVED_TEST_CASE = 37,

        /** TEST PLAN */
        CREATE_TEST_PLAN = 15,
        CREATE_TEST_PLAN_SPRINT = 16,
        EDIT_TEST_PLAN = 17,
        SHOW_TEST_PLAN_SPRINT = 18,
        DELETE_TEST_PLAN = 19,
        DELETE_TEST_PLAN_SPRINT = 20,

        /** TEST PLAN SPRINT */
        TEST_SPRINT_DASHBOARD = 21,
        EDIT_TEST_SPRINT = 22,
        TEST_SPRINT_SEE_ROLES = 23,
        TEST_SPRINT_EDIT_ROLES = 24,

        /** TEST EXECUTION */
        TEST_EXECUTION_SEE_ALL_PLANS_AND_SPRINTS = 25,
        TEST_EXECUTION_OPEN_TEST_CASE = 26,
        TEST_EXECUTION_SHOW_HISTORY = 27,
        TEST_EXECUTION_CHANGE_STATUS = 28,

        /** SETTINGS */
        SETTINGS_GENERAL_SETTINGS = 29,
        SETTINGS_PROJECT_ROLES = 30,
        SETTINGS_PROJECT_ROLES_EDIT = 31,
        SETTINGS_PROJECT_ROLES_DELETE = 40,
        SETTINGS_OTHER_SETTINGS = 32,
        SETTINGS_DELETE_PROJECT = 33,

        /** ISSUES */
        CREATE_ISSUE = 34,
        CREATE_ISSUE_FROM_MODULE = 35,
        EDIT_ISSUE = 39,
        DELETE_ISSUE = 36,









        /** APP PERMISSIONS SHOULD START AT LEAST FROM 1000 */
        /** USER */
        USER_CREATE = 1001,
        USER_EDIT = 1002,
        USER_ARCHIVE = 1003,
        USER_DELETE = 1004,
        USER_LOGIN_AS_SOMEBODY = 1005,

        /** MENU */
        MENU_HOMEPAGE = 1006,
        MENU_PROJECTS = 1007,
        MENU_USERS = 1008,
        MENU_LOG = 1009,
        MENU_SETTINGS = 1010,
        MENU_SYSTEM = 1011,

        /** SYSTEM */
        SYSTEM_HELP_EDIT = 1012,
        TICKET_WRITE = 1013,


        EXIT = 9999;
    
    public static $PRIVILEGES = [];

    public static $PRIVILEGES_MEANING = [
        1 => "Zobraziť DASHBOARD položku v menu",
        2 => "Zobraziť TEST PLAN položku v menu",
        3 => "Zobraziť TEST ANALYSES položku v menu",
        4 => "Zobraziť TEST EXECUTION položku v menu",
        5 => "Zobraziť ISSUES položku v menu",
        6 => "Zobraziť SETTINGS položku v menu",
        7 => "Právo vytvoriť TEST SET",
        8 => "Právo vytvoriť TEST CASE",
        9 => "Právo vytvoriť BULK TEST CASE",
        10 => "Právo upraviť TEST SET",
        11=> "Právo upraviť TEST CASE",
        12 => "Právo zmazať TEST SET",
        13 => "Právo zmazať TEST CASE",
        15 => "Právo vytvoriť TEST PLAN",
        16 => "Právo vytvoriť TEST SPRINT",
        17 => "Právo upraviť TEST PLAN",
        18 => "Právo zobraziť podrobné informácie a nastavenia TEST SPRINT",
        19 => "Právo zmazať TEST PLAN",
        20 => "Právo zmazať TEST PLAN SPRINT",
        21 => "Zobraziť TEST SPRINT DASHBOARD",
        22 => "Právo upraviť TEST SPRINT",
        23 => "Právo zobraziť jednotlivé role priradené testerom",
        24 => "Právo upraviť jednotlivé role priradené testerom",
        25 => "Právo vidieť celú test exekúciu. 
        Pri nezaškrtnutí sa zobrazia pri testovaní iba MOJE priradené TEST CASE.
        Pri zaškrtnutí sa zobrazia všetky TEST CASE všetkých TESTEROV",
        26 => "Právo otvoriť TEST CASE a vidieť roztestovanosť",
        27 => "Právo zobraziť históriu TEST CASE",
        28 => "Právo zmeniť celkový status TEST CASE",
        29 => "Právo zobraziť celkové nastavenia",
        30 => "Právo zobraziť role pre daný projekt",
        31 => "Právo upraviť role v danom projekte",
        32 => "Právo zobraziť ostatné nastavenia",
        33 => "Právo zmazať projekt",
        34 => "Právo vytvoriť ISSUE v test exekúcií",
        35 => "Právo vytvoriť ISSUE v ISSUES",
        36 => "Právo zmazať ISSUE",
        37 => "Právo označiť TEST CASE ako schválený",
        38 => "Právo importovať TEST ANALYSES",
        39 => "Právo upraviť ISSUE",
        40 => "Právo zmazať role v danom projekte",



        1001 => "Právo vytvoriť USERA",
        1002 => "Právo upraviť USERA",
        1003 => "Právo archivovať USERA",
        1004 => "Právo zmazať USERA",
        1005 => "Právo prihlásiť sa ako iný USER",
        1006 => "Zobraziť menu Homepage",
        1007 => "Zobraziť menu Projekty",
        1008 => "Zobraziť menu Užívatelia",
        1009 => "Zobraziť menu Logy",
        1010 => "Zobraziť menu Nastavenia",
        1011 => "Zobraziť menu Systém",
        1012 => "Právo upraviť nápovedu",
        1013 => "Právo napísať tiket",


        9999 => ""
    ];

    public static $PROJECT_DELIMETER = 1000;
    public static $JUNO_RESOURCE = "juno_admin";
    
    public static function getPrivilegesForProjects() {
        $constants = array_flip(self::$PRIVILEGES);

        $constants = array_filter($constants, function($x) {
            return $x < Privilege::$PROJECT_DELIMETER;
        }, ARRAY_FILTER_USE_KEY);

        return $constants;
    }

    public static function getPrivilegesForJunoAdmin() {
        $constants = array_flip(self::$PRIVILEGES);

        $constants = array_filter($constants, function($x) {
            return $x > Privilege::$PROJECT_DELIMETER;
        }, ARRAY_FILTER_USE_KEY);

        unset($constants[9999]);
        return $constants;
    }

    public static function getPrivilegesMeaning() {
        return static::$PRIVILEGES_MEANING;
    }

    /**
     * Called in bootstrap.php
     */
    public static function setPrivileges() {
        self::$PRIVILEGES = ClassType::from(self::class)->constants;
    }
    
    /** Privilege */
    public static function getPrivilegeByID($ID) {
        return self::getPrivilegesForProjects()[$ID];
    }
    
}
