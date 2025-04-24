<?php
namespace ehsanx64\phplib;

class Token {
	/**
	 * @var int Length of tokens generated
	 */
	private $tokenLength;

	/**
	 * @var string String of character which will be used during generation
	 */
	private $charPool;

	/**
	 * Token constructor. Default length and pool type is set here
	 */
	public function __construct() {
		$this->tokenLength = 16;
		$this->setAlphanumericPool();
	}

	/**
	 * Set character pools to numeric-only chars
	 */
	public function setNumericPool() {
		$this->charPool = str_shuffle('0123456789');
	}

	/**
	 * Set character pool to alphanumeric chars
	 */
	public function setAlphanumericPool() {
		$this->charPool = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
	}

	/**
	 * Set character pool to alphanumeric chars (no capital letters used)
	 */
	public function setNocapAlphanumericPool() {
		$this->charPool = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
	}

	/**
	 * Generated a random token
	 *
	 * @param int $length Token length. Default value is set in constructor
	 * @return string Generated token
	 */
	public function getRandomToken($length = 0) {
		if ($length == 0) {
			$len = $this->tokenLength;
		} else {
			$len = $length;
		}

		return substr(str_shuffle(str_repeat($this->charPool, $len)), 0, $len);
	}
}