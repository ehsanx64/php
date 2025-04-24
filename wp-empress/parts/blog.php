<?php
use empress\General;
use empress\Post;
?>

<div class="col s12">
    <article class="post-entry card">
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
                        $attId = empress\Helper\Post::getPostByGuid($catImage);
                        if (!$attId) {
                            printf('<img class="post-placehoder" src="%s" />',
                                get_template_directory_uri() . '/images/placeholder.jpg');
                        } else {
                            echo wp_get_attachment_image($attId, 'thumbnail');
                        }
                    }
                }

                $attachment = get_posts([
                    'p' => get_post_thumbnail_id(),
                    'post_type' => 'attachment'
                ]);

                if (!empty($attachment)) {
                    $thumbnailTitle = $attachment[0]->post_title;
                } else {
//                    var_dump($attachment);

                }
                ?>
            </a>
        </div>

        <div class="card-text">
            <div class="card-content">
                <div class="category animated fadeIn fast">
                    <?php the_category(); ?>
                </div>

				<div class="post-stats">
					<div class="post-views">
						<?php //displayPostViews(); ?>
					</div>
				</div>

				<div class="clearfix"></div>

                <div class="card-title animated fadeIn fast delay-200ms">
                    <h2 class="post-title animated fadeIn"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>

                <div class="post-info animated fadeIn fast delay-300ms" style="margin-bottom: 1em;">
                    <div class="the-author">
                        <b><?php et('By'); ?>:&nbsp;</b><?php et(get_the_author()); ?>
                    </div>
                    <div class="the-date">
                        <b><?php et('Last Update'); ?>:&nbsp;</b><?php echo empress\Helper\Post::getDisplayPostModifiedDate(); ?>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <?php if (has_excerpt()): ?>
                <div class="post-excerpt animated fadeIn fast delay-400ms" style="text-align: justify;">
                    <p><?php if (is_single()) the_content(); else the_excerpt(); ?></p>
                </div>
                <?php endif; ?>
            </div>
<!--            <div class="card-action">-->
<!--                <div class="pull-left read-more">-->
<!--                    <a href="--><?php //the_permalink(); ?><!--">--><?php //_e('Read more', 'empress'); ?><!--</a>-->
<!--                </div>-->
<!---->
<!--                <div class="clearfix"></div>-->
<!--            </div>-->

            <div class="clearfix"></div>
        </div>

        <?php if (is_single()) {
            comments_template();
        } ?>
        <?php /*
 <a href="<?php echo get_the_post_thumbnail_url(); ?>" data-rel="prettyPhoto" <?php echo isset($thumbnailTitle) ? 'title="' . $thumbnailTitle . '"' : ''; ?>>
						<i class="fa fa-search"></i>
					</a>
					<a href="<?php the_permalink(); ?>">
						<i class="fa fa-file-text"></i>
					</a>
 	*/ ?>

        <div class="clearfix"></div>
    </article>

</div>
