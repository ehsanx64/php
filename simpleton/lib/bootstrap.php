<?php
session_start();

// Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', true);

// Define some constants to make life easier
define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(dirname(__FILE__)));
define('BASE_URL', 'http://localhost:8080');
define('CONFIG_DIR', BASE_DIR . DS . 'config');
define('LIB_DIR', BASE_DIR . DS . 'lib');
define('MODEL_DIR', BASE_DIR . DS . 'models');
define('CONTROLLER_DIR', BASE_DIR . DS . 'controllers');
define('VIEW_DIR', BASE_DIR . DS . 'views');
define('LAYOUT_DIR', BASE_DIR . DS . 'layout');

require BASE_DIR . DS . 'vendor' . DS . 'autoload.php';
require LIB_DIR . DS . 'Utility.php';
require LIB_DIR . DS . 'Controller.php';
require LIB_DIR . DS . 'Database.php';
require LIB_DIR . DS . 'Url.php';
require LIB_DIR . DS . 'Model.php';

registerAutoloader();

// Get routing parameters
$get = getRoutingParams();

// Construct controller path
// We need to check for hyphens in controller part
if (strpos($get[0], '-') >= 0) {
	$cparts = explode('-', $get[0]);
	$controller = ucfirst($cparts[0]);

	for ($i = 1; $i < count($cparts); $i++) {
		$controller .= ucfirst($cparts[$i]);
	}
} else {
	$controller = ucfirst($get[0]);
}

$controllerFile = getControllerPath($controller);
executeControllerAction($controller, $controllerFile, $get);

