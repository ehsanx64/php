<?php
namespace ehsanx64\phplib;

use ehsanx64\phplib\Persian\Numeral;

/*
 * Simple Translation System
 */
class Translate {
	/**
	 * @var string $translateDirPath Directory in which translate are located
	 */
	private $translateDirPath;

	/**
	 * @var array $translations Array containing loaded translation details (name, path etc)
	 */
	private $translations = [];

	/**
	 * @var string $locale Contains current active locale name (en, fa, en_us, de, per etc)
	 */
	private $locale;

	/**
	 * Constructor. It will automate some tasks if argument provided.
	 *
	 * @param string $translateDir Translate directory absolute path. If this parameter is provided
	 * translations will be loaded automatically.
	 */
	public function __construct($translateDir = '') {
		// If translateDir is given using constructor we'll automate some tasks
		if (!empty($translateDir)) {
			$this->translateDirPath = $translateDir;
		}

		// Try to find out the current locale
		$this->handleLocaleSelection();
	}

	/**
	 * Checks for various global variables or constants to figure out current locale. For example
	 * it will check if any like-wordpress functions and constants and set the locale accordingly.
	 * If everything fail it will set the locale to en
	 */
	public function handleLocaleSelection() {
		$e = new Environment();

		if ($e->is('wordpress') && function_exists('get_locale')) {
			switch (get_locale()) {
			case 'en_US':
				$this->setLocale('en');
				break;
			case 'fa_IR':
				$this->setLocale('fa');
				break;
			default:
				$this->setLocale('en');
				break;
			}

			return;
		}

		// Set locale to en if other methods failed
		$this->setLocale('en');
	}

	/**
	 * Set active locale for translations
	 *
	 * @param string $localeName The locale name to set as active (en or de etc)
	 */
	public function setLocale($localeName) {
		$this->locale = $localeName;
	}

	/**
	 * Get currently active locale
	 *
	 * @return string Get active locale
	 */
	public function getLocale() {
		return $this->locale;
	}

	/**
	 * Translate a string.
	 *
	 * @param $key string The array key used in translation
	 * @return string The translation result
	 */
	public function t($key) {
		$targetFile = $this->translateDirPath . '/' . $this->getLocale() . '.php';
		if (file_exists($targetFile)) {
			$this->translations[] = [
				'locale' => $this->getLocale(),
				'path' => $targetFile
			];
			$values = include $targetFile;
		}

		if (isset($values[$key])) {
			return $values[$key];
		}

		return $key;
	}

	/**
	 * Translate string and feed it to sprintf afterwards
	 * @return string The translation result
	 *
	 */
	public function tr() {
		$params = func_get_args();
		$params[0] = $this->t($params[0]);
		$res = call_user_func_array('sprintf', $params);
		return $res;
	}

	/**
	 * This method is exactly like the tr() but tries to convert numerals to Persian after translation
	 * if locale is set to Persian.
	 *
	 * @return string The translated string with persianized numerals
	 */
	public function trn() {
		$params = func_get_args();
		$params[0] = $this->t($params[0]);
		$res = call_user_func_array('sprintf', $params);

		if ($this->getLocale() == 'fa') {
			return Numeral::toPersian($res);
		}

		return $res;
	}
}