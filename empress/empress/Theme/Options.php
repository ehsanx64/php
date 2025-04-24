<?php
namespace empress\Theme;

class Options {
	public static function customLogo() {
		if (function_exists('the_custom_logo')) {
			$customLogo = get_custom_logo();

			// If no custom logo defined ...
			if (empty($customLogo) || is_null($customLogo)) {
				// Echo site name
				bloginfo('name');
			} else {
				// ... if defined echo it
				echo $customLogo;
			}
		}
	}

	public static function filter_customLogo($html) {
		$html = str_replace('class="custom-logo-link"', 'class="brand"', $html);
		// $html = str_replace('class="custom-logo"', 'class=""', $html);
		return $html;
	}
}