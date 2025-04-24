<?php
class Url {
	public static function getBaseUrl($attachment = '') {
		if (empty($attachment)) {
			return BASE_URL;
		} else {
			return BASE_URL . '/?r=' . $attachment;
		}
	}
}