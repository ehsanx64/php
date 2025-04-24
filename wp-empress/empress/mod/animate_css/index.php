<?php
add_action('wp_enqueue_scripts', function () {
	// Load assets
	wp_enqueue_style('animate', EMPRESS_ASSETS . "/animate_css/animate.css");
});
