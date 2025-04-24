<?php

namespace empress\Theme;


class Widget {
	public static function action_registerWidgetArea() {
		register_sidebar(array(
			'name' => __('Main Widget Area', 'empress'),
			'id' => 'main-widget-area',
			'before_widget' => '<aside class="widget">',
			'after_widget' => '</aside>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'

		));
	}

}