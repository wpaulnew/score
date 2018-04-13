<?php

session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/**
 * Define
 */

define('APP', dirname(__DIR__) . '/app');
define('VENDOR', dirname(__DIR__) . '/vendor');
define('VENDOR_CORE', dirname(__DIR__) . '/vendor/core');
define('CORE', '/core');
define('VIEWS', dirname(__DIR__) . '/app/views');
define('PUBLIC', dirname(__DIR__) . '/public');
define('IMG', dirname(__DIR__) . '/public/img');


define('DEFAULT_LINK', '192.168.1.89');

/**
 * Autoload
 */

spl_autoload_register(function ($class) {
    $path = dirname(dirname(__FILE__)) . '/' . str_replace('\\', '/', $class);
    require($path . '.php');
    spl_autoload($path);
});

/**
 * Run app
 */

function getComponent($name)
{
    require_once(VIEWS . '/components/' . $name . '.php');
}

$routes = require_once(VENDOR . '/settings/routes.php');
$router = new \vendor\core\Router($routes);
$router->run();
