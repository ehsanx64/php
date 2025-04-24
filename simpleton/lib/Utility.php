<?php
function p($string) {
	printf("<pre>%s</pre>", $string);
}

function d($what) {
	echo '<pre>';
	var_dump($what);
	echo '</pre>';
}

function dd($what) {
	d($what);
	die;
}

function jsonReturn($data) {
	die(json_encode([
		'result' => true,
		'data' => $data
	]));
}

function jsonError($data) {
	die(json_encode([
		'result' => false,
		'data' => $data
	]));
}

function registerAutoloader() {
    spl_autoload_register(function($class) {
        // Use current directory as root to start referencing
        $parentDir = dirname(__DIR__);
        // Convert namespace path to file system path
        $className = str_replace("\\", '/', $class);
        if (!is_array($className)) {
            if (empty($class)) {
                return false;
            }
        } else {
            $className = array_pop($className);
        }
        // If file path exists include it
        if (file_exists($parentDir . '/' . $className . '.php')) {
            require $parentDir . '/' . $className . '.php';
        }
        // This piece added to use autoloading for empress
        if (file_exists(dirname($parentDir) . '/' . $className . '.php')) {
            require dirname($parentDir) . '/' . $className . '.php';
        }
    });
}

function getRoutingParams() {
    if (isset($_GET['r'])) {
        $chopped = explode('/', $_GET['r']);
        if (count($chopped) <= 1) {
            $get[] = $chopped[0];
        } else {
            $get = $chopped;
        }
    } else {
        $get = array(
            'site',
            'index'
        );
    }

    // If no controller specified use default
    if (!isset($get[0]) || empty($get[0])) {
        $get[0] = 'site';
    }

    // If no action specified use default
    if (!isset($get[1]) || empty($get[1])) {
        $get[1] = 'index';
    }

    return $get;
}

function getControllerPath($controllerName) {
    return CONTROLLER_DIR . DS . $controllerName . '.php';
}

function executeControllerAction($controller, $controllerFile, $get) {
    if (file_exists($controllerFile)) {
        // Include the controller file
        require $controllerFile;

        // Get name of controller
        $controllerName = $controller . 'Controller';

        // Instantiate controller class
        $controllerInstance = new $controllerName();

        // Get action name
        // We need to check for hyphens in action part as well
        if (strpos($get[1], '-') >= 0) {
            $aparts = explode('-', $get[1]);
            $method = $aparts[0];

            for ($i = 1; $i < count($aparts); $i++) {
                $method .= ucfirst($aparts[$i]);
            }
        } else {
            $method = $get[1];
        }

        // If a method with action name exists
        if (method_exists($controllerInstance, $method)) {
            // Run the method (action)
            $controllerInstance->$method();
        } else {
            // There is no such controller action
            die('Controller method not found');
        }
    } else {
        // There is no such controller
        die('Controller not found');
    }
}

function cleanControllerName($controllerName) {
    $res = preg_replace('/^controllers\\\/', '', strtolower($controllerName));
    $res = preg_replace('/controller$/i', '', $res);
    return $res;
}
