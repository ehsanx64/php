<?php
namespace ehsanx64\phplib;

/*
 * Environment detection routines
 */
class Environment {
	/**
	 * @var array $envs This array contains php running environments
	 */
	private $envs = [
		'wordpress' => false,
		'laravel' => false,
	];

	public function __construct() {
	}

	/**
	 * Detect the current environment in which scripting is running. It sets the internal flags and
	 * returns nothing. Use is() for checking for an environment.
	 */
	public function detect() {
		if (function_exists('wp') && function_exists('add_action')) {
			// This is probably WordPress
			$this->envs['wordpress'] = true;
			return;
		}
	}

	/**
	 * Check for an environment.
	 *
	 * @param $phpenv string Environment name (wordpress, laravel etc)
	 * @return boolean True if given environment name is the detected one, false otherwise.
	 * @throws \Exception Feeding this method with an invalid environment name throws an exception.
	 */
	public function is($phpenv) {
		// Detect current environment
		$this->detect();

		if (isset($this->envs[$phpenv])) {
			return $this->envs[$phpenv];
		}

		throw new \Exception('Invalid PHP environment name supplied');
	}
}