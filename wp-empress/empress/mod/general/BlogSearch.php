<?php
namespace empress\mod\general;

class BlogSearch extends \WP_Widget {
	private $widgetName = 'Empress - Blog Search';

	function __construct() {
		// Instantiate the parent object
		parent::__construct(false, $this->widgetName);
	}

	function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : __('Search', 'empress');
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];

		?>
		<form method="get" role="search" action="<?php echo home_url(); ?>">
			<input name="search" type="text" placeholder="<?php _e('Keywords to search...', 'empress'); ?>">
			<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
		</form>
		<?php

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Search', 'empress' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title', 'empress' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
	<?php
	}
}
