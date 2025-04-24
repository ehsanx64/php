<?php get_header(); ?>
<section id="post-list" class="col s12 l9">
	<div class="row">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
				<?php get_template_part('parts/blog'); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
