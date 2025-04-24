<?php
namespace empress;

class CustomPostType extends Post {
    protected $singleKey;
    protected $pluralKey;
    protected $labels;

	/**
	 * CustomPostType constructor.
	 *
	 * Register a new custom post type.
	 * @param array $params New custom post type parameters:
	 * 		@param labels: ['post', 'posts']	- The single and plural name of the new CPT
	 *
	 */
    public function __construct($params = []) {
        if (is_array($params) && !empty($params)) {
            if (isset($params['labels'])) {
                $this->singleKey = $params['labels'][0];
                $this->pluralKey = $params['labels'][1];
                $this->labels = $this->getLabels($this->singleKey, $this->pluralKey);
                $this->registerPostType($this->singleKey, $this->labels, []);
            }
        }
    }

    public function getLabels($singleKey, $pluralKey) {
        $skey = $singleKey;
        $pkey = $pluralKey;

        $labels = [
			'name' => t(ucfirst($pkey)),
			'singular_name' => t(ucfirst($skey)),
			'add_new' => t('Add a new ' . $skey),
			'add_new_item' => t('Add new ' . $skey),
			'edit_item' => t('Edit ' . $skey),
			'new_item' => t('New ' . $skey),
			'view_item' => t('View ' . $skey),
			'view_items' => t('View ' . $pkey),
			'search_items' => t('Search ' . $pkey),
			'not_found' => t('No ' . $pkey . ' found'),
			'not_found_in_trash' => t('No ' . $pkey . ' found in Trash'),
		// 'parent_item_colon' - This string isn't used on non-hierarchical types. In hierarchical ones the default is 'Parent Page:'.
			'all_items' => t('All ' . $pkey),
			'archives' => t(ucfirst($skey) . ' Archives'),
			'attributes' => t(ucfirst($skey) . ' Attributes'),
//		'insert_into_item' - String for the media frame button. Default is Insert into post/Insert into page.
//		'uploaded_to_this_item' - String for the media frame filter. Default is Uploaded to this post/Uploaded to this page.
			'featured_image' => t(ucfirst($skey) . ' image'),
			'set_featured_image' => t('Set ' . $skey . ' image'),
			'remove_featured_image' => t('Remove ' . $skey . ' image'),
			'use_featured_image' => t('Use as ' . $skey . ' image'),
			'menu_name' => t(ucfirst($pkey)),
			'filter_items_list' => $pkey,
			'items_list_navigation' => $pkey,
			'items_list' => $pkey,
			'name_admin_bar' => $pkey
		];

		return $labels;
    }

    public function registerPostType($key, $labels, $taxonomies) {
        $args = [
			'labels' => $labels,
			'capability_type' => 'post',
			'taxonomies' => $taxonomies,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'hierarchical'       => true,
			'supports'           => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
//			'menu_icon' => EMPRESS_ASSETS . '/melkemomtaz/favicon.png'
		];
		register_post_type($key, $args);
		flush_rewrite_rules();
	}
}

