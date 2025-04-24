<?php
namespace empress\Theme;


class Support {
	/**
	 * Add RSS feed links to HTML head
	 */
	public static function addFeedLinks() {
		add_theme_support('automatic-feed-links');
	}

	/**
	 * Allow theme to add document title tag to HTML <head>. This means the page title is not hardcoded in header and wp should add it.
	 */
	public static function addTitleTag() {
		add_theme_support('title-tag');
	}


	/**
	 * Enable featured image for posts (and pages)
	 */
	public static function addPostThumbnails() {
		add_theme_support('post-thumbnails');
	}
}