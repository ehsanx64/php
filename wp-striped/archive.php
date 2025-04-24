<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package annina
 */
/*
get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="content-annina-title annDouble">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							printf( __( 'Category: %s', 'annina' ), '<span>' . single_cat_title( '', false ) . '</span>' );

						elseif ( is_tag() ) :
							printf( __( 'Tag: %s', 'annina' ), '<span>' . single_tag_title( '', false ) . '</span>' );

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'annina' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'annina' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'annina' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'annina' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'annina' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'annina' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'annina' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'annina' );

						else :
							_e( 'Archives', 'annina' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
				</div><!-- .content-annina -->
			</header><!-- .page-header -->
			
			<?php /* Start the Loop */ /* global $i; $i = 0; ?>
			<div class="annina" id="mainAnnina">
			<div class="grid-sizer"></div>
			<?php /* Start the Loop */ /*?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
                /*
					get_template_part( 'content', get_post_format() );
					$i++;
				?>

			<?php endwhile; ?>
			</div><!-- #mainAnnina -->

			<?php //annina_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); */ ?>
<?php get_header(); ?>
<?php
$imgdir = get_template_directory_uri() . '/images/';
?>

<!-- Content -->
<div id="content">
    <div class="inner">
        <!-- Post -->
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('content', get_post_format());
        }
        ?>

        <?php /*
        <!-- Pagination -->
        <div class="pagination">
            <!--<a href="#" class="button previous">Previous Page</a>-->
            <div class="pages">
                <a href="#" class="active">۱</a>
                <a href="#">۲</a>
                <a href="#">۳</a>
                <a href="#">۴</a>
                <span>&hellip;</span>
                <a href="#">۲۱</a>
            </div>
            <a href="#" class="button next">صفحه‌ی بعدی</a>
        </div>
        */ ?>

    </div>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>