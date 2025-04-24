<?php
namespace empress\mod\general;

class TagList extends \WP_Widget {
	private $widgetName = 'Empress - Tag List';

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, $this->widgetName);
	}

	function widget( $args, $instance ) {
		$tags = get_tags();

		if ($tags == false || empty($tags)) {
			return;
		}

		$title = isset($instance['title']) ? $instance['title'] : __('Tags', 'empress');
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];

		echo '<ul class="nav-default tags-cloud clearfix">';
		foreach ($tags as $tag) {
			echo '<li><a href="' . get_tag_link($tag->term_id) . '">'
				. $tag->name . '</a></li>';
		}
		echo '</ul>';

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Tags', 'empress' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title', 'empress' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
	<?php
	}
}
