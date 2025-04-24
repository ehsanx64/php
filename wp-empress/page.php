<?php get_header(); ?>
<?php get_sidebar(); ?>

	<section id="post-content" class="col s12 l9">
		<div class="row">
			<div class="col s12">

				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<?php get_template_part('parts/blog-single'); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php //get_template_part('parts/global-header'); ?>
		<?php /*the_posts_pagination([
	'next_text' => false,
	'prev_text' => false
]);*/ ?>
	</section>

<?php get_footer(); ?>
