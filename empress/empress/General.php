<?php
namespace empress;

class General {
	/**
	 * Get current language being used
	 */
	public static function isPersian() {
		if (get_locale() == 'fa_IR') {
			return true;
		}

		return false;
	}

	/**
	 * Disable WordPress Heartbeat via setting an action hook
	 */
	public static function disableHeartbeat() {
		add_action('init', function () {
			wp_deregister_script('heartbeat');
		}, 1);
	}
}