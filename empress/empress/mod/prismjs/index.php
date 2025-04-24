<?php
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('prismjs', EMPRESS_ASSETS . "/prismjs/prism.css");
	wp_enqueue_style('prismjs-theme-material-light', EMPRESS_ASSETS . "/prismjs/prism-material-light.css");
	wp_enqueue_script('clipboardjs', EMPRESS_ASSETS . "/prismjs/clipboard.min.js", [], false, true);
	wp_enqueue_script('prismjs', EMPRESS_ASSETS . "/prismjs/prism.js", ['clipboardjs'], false, true);
});
