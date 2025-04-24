<?php
namespace empress\mod\general;

class RecentPosts extends \WP_Widget {
	private $widgetName = 'Empress - Recent Posts';

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, $this->widgetName);
	}

	function widget( $args, $instance ) {
		$recentPosts = get_posts();
		if ($recentPosts == false || empty($recentPosts)) {
			return;
		}

		$title = isset($instance['title']) ? $instance['title'] : __('Recent Posts', 'empress');
		echo $args['before_widget'];
		echo $args['before_title'] . $title . $args['after_title'];


		echo '<ul>';
		foreach ($recentPosts as $thePost) {
			echo '<li><a href="' . get_permalink($thePost) . '">'
				. $thePost->post_title . '<span><i class="fa fa-calendar"></i>' . get_the_date('j M Y - H:m') . '</span></a></li>';
		}
		echo '</ul>';

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', 'empress' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title', 'empress' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
	<?php
	}
}
