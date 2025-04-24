<?php
//echo 'general';

//add_action('init', function () {
//	empress()->main->setCommentWalker(new \empress\mod\materialize\CommentWalker);
//	new \empress\mod\materialize\empress_md_slider();
//
//});
add_action('widgets_init', function() {
	register_widget(new \empress\mod\general\BlogSearch());
	register_widget(new \empress\mod\general\RecentPosts());
	register_widget(new \empress\mod\general\TagList());
});
