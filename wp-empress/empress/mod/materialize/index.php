<?php
//echo 'Materialize';

add_action('init', function () {
	empress()->main->setCommentWalker(new \empress\mod\materialize\CommentWalker);
//	new \empress\mod\materialize\empress_md_slider();

});

add_action('widgets_init', function() {
	register_widget(new \empress\mod\materialize\CategoryList());
});

// Hook into wp_enqueue_scripts to include needed asset file into output page
add_action('wp_enqueue_scripts', function() {
	// Load assets
	wp_enqueue_style('materialize', EMPRESS_ASSETS . "/materialize/css/materialize.min.css");
	wp_enqueue_style('material-icons', EMPRESS_ASSETS . "/materialize/css/material-icons.css");
	wp_enqueue_style('materialize-font-awesome', EMPRESS_ASSETS . "/materialize/css/font-awesome.css");

	if (get_locale() == 'fa_IR') {
		wp_enqueue_style('materialize-rtl', EMPRESS_ASSETS . "/materialize/rtl/rtl.css");
	}

	wp_enqueue_script('materialize-jquery', EMPRESS_ASSETS . "/materialize/js/jquery.min.js", array(), false, false);
	wp_enqueue_script('materialize', EMPRESS_ASSETS . "/materialize/js/materialize.min.js", array('materialize-jquery'), false, false);
});
