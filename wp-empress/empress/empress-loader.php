<?php
function empress() {
	return  \empress\empress::getInstance();
}

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


