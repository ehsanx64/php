<?php
namespace ehsanx64\phplib;

use DateTime;

class Date {
    /**
	 * Convert Gregorian date string to unix timestamp
	 *
	 * @param string $gregorianDate Date string in format (1985-12-01)
	 * @return int Unix timestamp
	 */
	public static function toTimestamp($gregorianDate) {
		// Following lines commented in favor of PHP's strtotime
		/*
		$p = explode('-', $gregorianDate);

		if (count($p) == 3) {
			return (int) mktime(null, null, null, $p[1], $p[2], $p[0]);
		}
		*/
		return (int) strtotime($gregorianDate);
	}


    /**
     * Convert SQL DATETIME string to Unix timestamp
	 *
	 * @param string $sqlDatetimeString The SQL DATETIME. Something like: 2017-04-23 11:59:10 etc
	 * @return integer Unix timestamp
	 */
    public static function sqlDatetimeToTimestamp($sqlDatetimeString) {
        return self::toTimestamp($sqlDatetimeString);
    }


	/**
	 * Check if the given string parameter is a valid date representation
	 *
	 * @param string $datestring The date string to validate
	 * @return bool True if the string is a valid date string false otherwise.
	 */
	public static function isDateString($datestring) {
		$d = DateTime::createFromFormat('Y-m-d', $datestring);
    	return $d && $d->format('Y-m-d') === $datestring;
	}

	/**
	 * Guess date delimiter character in a given date string
	 *
	 * @param string $datestring The date string to search for delimiter
	 * @return bool|string The delimiter character, or false if there is none
	 */
	public static function guessDateDelimiter($datestring) {
		$delimiter = '-';
		if (count(explode($delimiter, $datestring)) == 3) {
			return $delimiter;
		}

		$delimiter = '/';
		if (count(explode($delimiter, $datestring)) == 3) {
			return $delimiter;
		}

		return false;
	}
}
