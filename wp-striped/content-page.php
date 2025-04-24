<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ex64wp-html5up-striped
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="">
	
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('annina-normal-post');
			echo '</div>';
		}
	?>
	
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages(array(
			   'before' => '<div class="page-links"><i class="fa fa-files-o spaceRight"></i>' . __( 'Pages:', 'fa_IR' ),
			   'after'  => '</div>',
			   'link_before'      => '<span>',
			   'link_after'       => '</span>',
			));
			?>
		</div>

		<span style="display:none" class="updated"><?php the_time(get_option('date_format')); ?></span>

		<div style="display:none" class="vcard author">
			<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo esc_html( get_the_author() ); ?>
			</a>
		</div>

		<footer class="entry-footer smallPart">
			<?php edit_post_link( __( 'Edit', 'fa_IR' ), '<span class="edit-link"><i class="fa fa-wrench spaceRight"></i>', '</span>' ); ?>
		</footer>

	</div>
</article>
