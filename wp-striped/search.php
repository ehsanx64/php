<?php
/**
 * The template for displaying search results pages.
 *
 * @package annina
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="content-annina-title annDouble">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'annina' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div><!-- .content-annina -->
			</header><!-- .page-header -->
			
			<?php /* Start the Loop */ global $i; $i = 0; ?>
			<div class="annina" id="mainAnnina">
			<div class="grid-sizer"></div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
				$i++;
				?>

			<?php endwhile; ?>
			</div><!-- #mainAnnina -->

			<?php annina_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
