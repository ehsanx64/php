<?php

use empress\General;
use empress\Helper\Post;

?>

<article class="post-entry card z-depth-2">
    <div class="card-image">
        <a href="<?php the_permalink(); ?>">
			<?php
			$imageSize = 'thumbnail';
			if (is_single()) {
				$imageSize = 'medium';
			}

			if (has_post_thumbnail()) {
				the_post_thumbnail($imageSize, ['class' => 'responsive-img']);
			} else {
				// Check if post category has an image
				$cats = get_the_category();
				if (!empty($cats)) {
					$cat = $cats[0];
					$catImage = get_option('z_taxonomy_image' . $cat->term_id, false);
					if (!$catImage) {
						printf(
							'<div style="background-image: url(%s);" class="post-image"></div>', get_template_directory_uri() . '/images/placeholder.jpg'
						);
					} else {
						//						printf('<img class="post-placehoder" src="%s" />', $catImage);
						printf('<div style="background-image: url(%s);" class="post-image"></div>', $catImage);
					}
				}
			}

			$attachment = get_posts(
				[
					'p' => get_post_thumbnail_id(),
					'post_type' => 'attachment'
				]
			);

			if (!empty($attachment)) {
				$thumbnailTitle = $attachment[0]->post_title;
			}
			?>
        </a>
    </div>

    <div class="card-content">
        <div class="category">
			<?php the_category(); ?>
        </div>

        <div class="post-stats">
            <div class="post-views">
				<?php //displayPostViews(); ?>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="card-title">
            <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
        </div>

        <div class="post-info" style="margin-bottom: 1em;">
            <div class="the-author">
                <b><?php et('By'); ?>:&nbsp;</b><?php et(get_the_author()); ?>
            </div>
            <div class="the-date">
                <b><?php et('Last Update'); ?>
                    :&nbsp;</b><?php echo Post::getDisplayPostModifiedDate(); ?>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="post-content" style="text-align: justify;">
            <p><?php if (is_single()) {
					the_content();
				} else {
					the_excerpt();
				} ?></p>
        </div>

        <div class="post-comments">
            <div class="container-fluid">
                <?php
				if (is_single()) {
					if (comments_open()):
						comments_template();
					endif;
				}
				?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

	<?php /*
 <a href="<?php echo get_the_post_thumbnail_url(); ?>" data-rel="prettyPhoto" <?php echo isset($thumbnailTitle) ? 'title="' . $thumbnailTitle . '"' : ''; ?>>
						<i class="fa fa-search"></i>
					</a>
					<a href="<?php the_permalink(); ?>">
						<i class="fa fa-file-text"></i>
					</a>
 	*/ ?>
</article>

