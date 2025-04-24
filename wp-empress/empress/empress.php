<?php
namespace empress;
use ehsanx64\phplib\Module;
use empress\General;

define('EMPRESS_ROOT', __DIR__);
define('EMPRESS_MOD', __DIR__ . '/mod');
define('EMPRESS_TEMP', EMPRESS_ROOT . '/tmp');
define('EMPRESS_ASSETS', get_stylesheet_directory_uri() . '/asset');

// Include composer autoloader
include EMPRESS_ROOT . '/vendor/autoload.php';

// Include empress autoloader
include EMPRESS_ROOT . '/empress-loader.php';

class Empress {
	private static $instance = null;
	private $mainConf = null;
	public $main;

	public function main() {
		if (is_null($this->mainConf)) {
			$this->mainConf = new \empress\conf\main();
		}

		return $this->mainConf;
	}

	public function __construct() {
//		\ehsanx64\phplib\PHP::enableFullErrorReporting();

		if (General::isPersian()) {
			load_textdomain('empress', __DIR__ . '/languages/empress-fa_IR.mo');
		}

		$this->main = new \empress\conf\main();

		// Load available short codes
		$m = new Module(EMPRESS_MOD);
	}

	private static function init() {
		self::$instance = new self();
	}

	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::init();
		}
		return self::$instance;
	}
}




