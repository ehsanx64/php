<?php
function displayPostViews() {
	if (function_exists('get_totalviews')) {
		if (empress\General::isPersian()) {
			printf(t("%s views"),
				ehsanx64\phplib\Persian\Numeral::toPersian(
					number_format_i18n(the_views(false))));
		} else {
			printf(t("%s views"), number_format_i18n(the_views(false)));
		}
	}
}