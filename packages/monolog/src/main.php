<?php
define('APP_PATH', __DIR__ . '/..');
define('STORAGE_PATH', APP_PATH . '/storage');
define('LOG_FILE', STORAGE_PATH . '/app.log');

require APP_PATH . '/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');

// Now add some handlers
$logger->pushHandler(new StreamHandler(LOG_FILE, Level::Debug));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('My logger is now ready');