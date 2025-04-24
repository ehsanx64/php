<?php
$_dateMd = explode(' ', get_the_date());
$_theDate = array();
$_theDate['day'] = $_dateMd[0];
$_theDate['month'] = $_dateMd[1];
$_theDate['year'] = $_dateMd[2];
?>

<article class="box post post-excerpt">
    <header>
        <h2>
			<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
    </header>

    <div class="info">
        <span class="date">
            <span class="month"><?php echo $_theDate['month']; ?></span>
            <span class="day"><?php echo $_theDate['day']; ?></span>
            <span class="year"><?php echo $_theDate['year']; ?></span>
        </span>

        <ul class="stats">
            <li>
                <a href="#" class="icon fa-comment">
                    <?php echo get_comments_number(); ?>
                </a>
            </li>
            <li><a href="#" class="icon fa-heart">۳۲</a></li>
        </ul>
    </div>

	<?php
		// Display post thumbnail if there is one
		$postThumb = get_the_post_thumbnail();
		if (!empty($postThumb)) { ?>
			<a href="<?php echo get_permalink(); ?>" class="image featured">
				<?php echo get_the_post_thumbnail(); ?>
			</a>
		<?php }

		// Display post excerpt if exists
		$postExcerpt = get_the_excerpt();

		if (!empty($postExcerpt)) {
			?><p><?php the_excerpt(); ?></p><?php
		}
	?>
</article>

<hr>
