<?php
$tags = get_the_tags();

if ($tags == false || empty($tags)) {
	return;
}
?>
<!-- Post Tags -->
<div class="post-tags">
	<h4 class="text-bold">TAGS:</h4>
	<ul class="nav-default tags-cloud clearfix">
		<?php foreach ($tags as $tag): ?>
			<li><a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
<!-- Post Tags End -->
