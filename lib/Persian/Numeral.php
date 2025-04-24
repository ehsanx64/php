<?php
namespace ehsanx64\phplib\Persian;

class Numeral {
	/**
	 * Convert between Persian\Latin numerals. Stolen from jdf :-D
	 *
	 * @param string $latinNumeral Number string to convert
	 * @param string $to Language code to convert numeral to (en or fa)
	 * @param string $dotReplacement Character which specifies decimal point
	 * @return string Converted numeral
	 */
	public static function convertNumeral($numeral, $to = 'en', $dotReplacement = '،') {
		$num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
		$key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $dotReplacement);

		return ($to == 'fa')
			? str_replace($num_a, $key_a, $numeral)
			: str_replace($key_a, $num_a, $numeral);
	}

	/**
	 * Convert any numeral in the given parameter to persian numerals
	 *
	 * @param string $string String to convert
	 * @return string Converted numeral
	 */
	public static function toPersian($string) {
		return self::convertNumeral($string, 'fa');
	}
	
	/**
	 * Convert Persian numerals in given string to Latin numerals
	 *
	 * @param string $string String to convert
	 * @return string Converted numeral
	 */
	public static function toLatin($string) {
		return self::convertNumeral($string, 'en');
	}
}
