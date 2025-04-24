<?php
use ehsanx64\phplib\Translate;

class Xlate {
	private static $phplibTranslate;

	public static function getInstance() {
		if (self::$phplibTranslate == null) {
			self::$phplibTranslate = new Translate(__DIR__);
		}

		return self::$phplibTranslate;
	}
}

function t($key) {
	return Xlate::getInstance()->t($key);
}

function et($key) {
	// die(var_dump(get_locale()))
	echo Xlate::getInstance()->t($key);
}