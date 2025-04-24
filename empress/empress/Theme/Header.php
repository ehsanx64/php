<?php
namespace empress\Theme;

class Header {
	public static function removeGeneratorMeta() {
		add_action('init', function () {
			remove_action('wp_head', 'wp_generator');
		});
	}

	public static function renderFavicon($fileUri) {
		add_action('wp_head', function () use ($fileUri) {
			echo <<<_EOH
<link rel="shortcut icon" href="$fileUri">
_EOH;
		});
	}

	public static function renderWebsiteIcon($fileUri) {
		add_action('wp_head', function () use ($fileUri) {
			echo <<<_EOH
<link rel="icon" sizes="192x192" href="$fileUri">
_EOH;
		});
	}
}
