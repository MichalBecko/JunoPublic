<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

Tracy\Debugger::$maxDepth = 4;
Tracy\Debugger::$maxLength = 300;
//\Tracy\Debugger::$showBar = FALSE;

$configurator->setDebugMode(TRUE); // enable for your remote IP

$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

// register datetime
DefaultModule\Controls\DateTime::register();
Privilege::setPrivileges();
\LogModule\Classes\LogValues::setValues();

/**
 * Register Dump & Die global function
 * @param $var
 */
function dd($var) {
    dump($var);
    die(1);
}

if ($configurator->isDebugMode()) {
//     this function checks if we are in debug mode but on live server
    if ($_SERVER["REMOTE_ADDR"] == "188.121.181.1") {
        $configurator->addConfig(__DIR__ . '/Core/config/config.local.production.neon');
    } else {
        $configurator->addConfig(__DIR__ . '/Core/config/config.local.development.neon');
    }
} else {

}
$configurator->addConfig(__DIR__ . '/Core/config/config.neon');

$container = $configurator->createContainer();

return $container;