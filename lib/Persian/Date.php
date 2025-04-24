<?php
namespace ehsanx64\phplib\Persian;

use \ehsanx64\phplib;
use Exception;

include __DIR__ . '/jdf-2.70.php';

//  Date class
class Date {
	// These format string are class defaults
	// For Jalali dates
	public static $dateFormat = 'j F Y';
	public static $timeFormat = 'H:i';

	// For Gregorian dates
	public static $gDateFormat = 'Y-m-d';
	public static $gTimeFormat = 'H:i';


	/*
	 * Generate Jalali date string using current timestamp or provided one
	 *
	 * @param string $timestamp Timestamp for date generation. Current timestamp will be used if not specified.
	 * @param string $format The format used for date string generation. If not specified default class format is used.
	 *
	 * @return string Date string
	 */
	public static function getDate($timestamp = '', $format = '') {
		$ts = $timestamp;

		// If no timestamp is given use system's current timestamp
		if (empty($timestamp)) {
			$ts = time();
		}

		$f = $format;

		// If no format string given, use class default format string
		if (empty($format)) {
			$f = self::$dateFormat;
		}

		return Jdate::jdate($f, $ts, '', 'UTC');
	}


	/**
	 * Convert Gregorian date to Jalali date
	 *
	 * @param string $gregorianDateString The Gregorian date string for conversion
	 * @param string $format Format string for conversion, class default will be used if not given.
	 * @return string Jalali date
	 */
	public static function toJalaliDate($gregorianDateString, $format = '') {
		// Generate the timestamp
		$t = \ehsanx64\phplib\Date::toTimestamp($gregorianDateString);

		return self::getDate($t, $format);
	}


	/**
	 * Convert Jalali date to Gregorian date. If this parameter is already a Gregorian date, method will return
	 * it without any conversion taking place.
	 *
	 * @param string $jalaliDate Date to convert (Jalali)
	 * @param string $format Format to use
	 * @return string string The Gregorian date
	 * @throws Exception
	 */
	public static function toGregorianDate($jalaliDate, $format = '') {
		// If the given date string is not a Jalali date return it
		if (!self::isJalaliDate($jalaliDate)) {
			return $jalaliDate;
		}

		$f = $format;

		// Use default date format is none given
		if (empty($format)) {
			$f = self::$gDateFormat;
		}

		// Get Unix timestamp
		$t = self::toTimestamp($jalaliDate);

		return date($f, $t);
	}


	/**
	 * Convert given Jalali date string to Unix timestamp
	 *
	 * @param string $datestring Jalali date string to convert
	 * @return int Unix timestamp
	 */
	public static function toTimestamp($datestring) {
		// Convert date string numerals and split it according to delimiter
		$latinized = Numeral::toLatin($datestring);
		$dateparts = explode(General\Date::guessDateDelimiter($latinized), $latinized);

		// If the parameter has not 3 components throw an exception
		if (count($dateparts) != 3) {
			throw new Exception('Invalid date');
		}
		$gtimestamp = \ehsanx64\phplib\Persian\Jdate::jmktime(0, 0, 0, $dateparts[1], $dateparts[2], $dateparts[0]);
		return intval($gtimestamp);
	}

	/**
	 * Check if the given parameter looks like a date and if it is in Jalali sensible range.
	 *
	 * @param string $dateString Date string
	 * @return bool True if the date string looks like a Jalali date, false otherwise.
	 */
	public static function isJalaliDate($dateString) {
		// Numeral conversion and delimiter detection
		$d = Numeral::toLatin($dateString);
		$delimiter = General\Date::guessDateDelimiter($d);

		// If no delimiter
		if ($delimiter == false && !empty($dateString)) {
			throw new Exception('Invalid dates supplied');
		}

		$dateparts = explode($delimiter, $d);

		if ($dateparts[0] < 1900 && count($dateparts) == 3) {
			return true;
		}

		return false;
	}
}
