<?php
namespace empress\Theme;

class Config {
	public static function action_themeSetup() {
		// Loads the theme's translated strings.
		//load_theme_textdomain( 'twentysixteen' );

		Support::addFeedLinks();
		Support::addTitleTag();

		// Add custom logo feature for theme (Custom logo can be set from theme customization page)
		add_theme_support('custom-logo', array(
			'height'      => 150,
			'width'       => 80,
			// 'flex-height' => true,
			// 'flex-width' => true
		));

		Support::addPostThumbnails();
		add_image_size('large', 1024, 830, true);
		add_image_size('medium', 880, 530, true);
		add_image_size('small', 640, 420, true);
		add_image_size('thumbnail', 500, 500, true);

		register_nav_menus(array(
			'main-nav-menu' => __('Main navigation menu', 'empress'),
		));


		// This feature allows themes to explicitly choose to apply HTML5 markup for search forms,
		// comment forms, comment lists, gallery and caption.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Add support for a list of default wordpress post formats, because new post formats
		// cannot be added to wp, these are a way to implement different types of post presentation
		// which should be compatible between any type of theme
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		));

		// Add callback for custom TinyMCE editor stylesheets.
		// add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

		// This feature enables Selective Refresh for Widgets being managed within the Customizer.
		// This feature became available in WordPress 4.5.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}