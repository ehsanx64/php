<?php
namespace empress\mod\materialize;

class CategoryList extends \WP_Widget {
	private $widgetName = 'Empress - Category List';

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, $this->widgetName);
	}

	function getTabs($category) {
		$ip = $category->term_id;
		$r = sprintf('<ul class="tabs">'
			. '<li class="tab col s4"><a class="active" href="#' . $ip . '-category-list-tab-latest-posts">Latest Posts</a></li>'
			. '<li class="tab col s4"><a href="#' . $ip . '-category-list-tab-top-posts">Top Posts</a></li>'
			. '<li class="tab col s4"><a href="#' . $ip . '-category-list-tab-favorite-posts">Favorite Posts</a></li>'

			. '</ul>'
			. '<div id="' . $ip . '-category-list-tab-latest-posts" class="col s12">%s</div>'
			. '<div id="' . $ip . '-category-list-tab-top-posts" class="col s12">%s</div>'
			. '<div id="' . $ip . '-category-list-tab-favorite-posts" class="col s12">%s</div>'
		, 'Latest posts', 'Shit', 'yes'

		);
		return $r;
	}

	function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : __('Categories', 'empress');
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];
		echo '<div>';
//		echo '<ul class="collapsible">';
		echo '<ul class="collection empress-category-list">';
		foreach (get_categories() as $category) {
			printf('<li class="collection-item""><a href="%s">'
				// For collapsible header
				//. '<div class="collapsible-header"><div>'
				// For collection item
				//. '<div class="collection-item">' //. '<div>'
					. '<span>%s</span>'
					. '<span class="new badge" data-badge-caption="%s">'
						. '%s'
					. '</span>'
				//. '</div>' //. '</div>'
				// For collapsible only
				//. '<div class="collapsible-body">'
				//	. '%s'
				//. '</div>'
				. '</a></li>',
				get_term_link($category->term_id),
				$category->name,
				__('Post'),
				\Empress\General::isPersian() ? \ehsanx64\phplib\Persian\Numeral::toPersian($category->count) : $category->count,
				sprintf('<div><a href="%s">All</a>%s</div>', get_term_link($category->term_id), $this->getTabs($category))
			);
		}
		echo '</ul>';
//		echo '</ul>';
		echo '</div>';
		?>
			<style type="text/css" rel="stylesheet">
				ul.collection.empress-category-list {
					border: none;
				}

				ul.collection.empress-category-list .collection-item {
					padding: 10px 0px;
				}
			</style>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Categories', 'empress' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title', 'empress' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
	<?php
	}
}
