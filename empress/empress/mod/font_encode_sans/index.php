<?php
add_action('wp_enqueue_scripts', function () {
	// Load assets
	wp_enqueue_style('font_encode_sans', EMPRESS_ASSETS . "/font_encode_sans/font_encode_sans.css");
});
