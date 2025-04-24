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

        <?php
        /*
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
        */
        ?>

    </div>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>
