<?php

ini_set('display_errors', true);
error_reporting(E_ALL|E_STRICT);

// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(realpath(APPLICATION_PATH . '/../lib'), get_include_path())));

// include general macq functions
require_once 'Ctrl/Functions.php';

// Create application, bootstrap, and run
require_once 'Zend/Application.php';
$application = new Zend_Application('development', APPLICATION_PATH . '/config/app.ini');
$application->bootstrap()->run();