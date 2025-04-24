<?php
require_once __DIR__ . '/empress/empress.php';
$emp = empress();

require_once __DIR__ . '/tools.php';
// Hook into wp_enqueue_scripts to include needed asset file into output page
add_action('wp_enqueue_scripts', function () {
	// Enqueue theme's main stylesheet file
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script('masonry', EMPRESS_ASSETS . "/masonry.pkgd.min.js", array(), false, false);
	wp_enqueue_script('theme-scripts', EMPRESS_ASSETS . "/scripts.js", array(), false, true);
});

//\empress\General::disableHeartbeat();

// after_setup_theme action executed before init action, so we hook into it
// to setup theme features
add_action('after_setup_theme', ['empress\Theme\Config', 'action_themeSetup']);

// Add a filter to change custom logo output
add_filter('get_custom_logo', ['empress\Theme\Options', 'filter_customLogo']);

// Hook into widget_init to register widget areas
add_action('widgets_init', ['empress\Theme\Widget', 'action_registerWidgetArea']);


// Add favicon and shortcuticon to header using wp_head action hook
//add_action('wp_head', ['empress\Theme\Header', 'getFaviconHtml']);

// A general callback for init to do needed things
//empress\Theme\Header::removeGeneratorMeta();
empress\Theme\Header::renderFavicon(get_template_directory_uri() . '/images/favicon.ico');
empress\Theme\Header::renderWebsiteIcon(get_template_directory_uri() . '/images/site-icon.png');

empress\Theme\Comment::makeCommentFieldTheLastField();

// Customize comment form fields
empress\Theme\Comment::wrapCommentFieldsInDivWithClass('row comment-fields');
add_filter('comment_form_default_fields', ['empress\Theme\Comment', 'filter_getCommentFormFieldsForMaterialize']);
add_filter('comment_form_defaults', ['empress\Theme\Comment', 'getCommentFormArgsForMaterialize']);

// Filter comment edit link
//add_filter(
//	'edit_comment_link', function ($commentEditLink) {
//	return preg_replace('/comment-edit-link/', 'comment-edit-link btn btn-dark', $commentEditLink);
//}
//);

add_action('init', function () {
	$dummy = new \empress\CustomPostType(['labels' => ['pet', 'pets']]);
	$dummy = new \empress\CustomPostType(['labels' => ['project', 'projects']]);
//	var_dump($dummy);
//	die;
});
