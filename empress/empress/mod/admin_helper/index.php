<?php

add_action('admin_enqueue_scripts', function () {
	wp_enqueue_style('persianizer', EMPRESS_ASSETS . "/persianizer/persianizer.css");
	wp_enqueue_style('font_encode_sans', EMPRESS_ASSETS . "/font_encode_sans/font_encode_sans.css");
	wp_register_style('admin_helper', EMPRESS_ASSETS . '/admin_helper/admin_helper.css', false, '1.0.0');
	wp_enqueue_style('admin_helper');
});
