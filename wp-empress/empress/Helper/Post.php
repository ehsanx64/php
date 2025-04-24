<?php
namespace empress\Helper;

use empress\General;

class Post {
	/**
	 * Get a post by ID
	 *
	 * @param int|string $postId The post ID
	 * @return array|null|\WP_Post The WP_Post object containing the post
	 */
	public static function getPost($postId) {
		return get_post($postId);
	}

	/**
	 * Read post_modified field for the given post ID from database and return its timestamp
	 *
	 * @param int|string $postId The post ID
	 * @return int The timestamp
	 */
	public static function getPostModifiedDate($postId) {
		return strtotime(get_post($postId)->post_modified);
	}

	/**
	 * Get the modified date of the given post for display
	 *
	 * @param int|string $postId The post id
	 * @return string The formatted date string
	 */
	public static function getDisplayPostModifiedDate($postId = '') {
		$id = $postId;

		if (empty($id)) {
			$id = get_the_ID();
		}

		return General::isPersian()
			? get_the_modified_date('', $id)
			: date('d F Y', self::getPostModifiedDate($id));
	}

	/**
	 * Query database for a post with the given guid.
	 *
	 * @param $guid string The guid to search
	 * @return bool|string If a post with such guid exists return its ID as string. Returns False
	 * 	if no post with the given guid found.
	 */
	public static function getPostByGuid($guid) {
		global $wpdb;
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $guid ));

		if (!is_array($attachment) || count($attachment) < 1) {
			return false;
		}

		return $attachment[0];
	}
}