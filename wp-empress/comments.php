<?php if (post_password_required()) {
	return;
} ?>

<?php if (have_comments()): global $wp_query; ?>
	<div class="col s12 stats">
		<?=sprintf("<b>Comment count:</b>&nbsp;%s", number_format_i18n(get_comments_number()));?>
	</div>
	<div class="col s12 list">
		<ul class="comment-list">
			<?php
			wp_list_comments([
				'walker' => new \empress\mod\materialize\CommentWalker(),
				'style' => 'ol',
				'short_ping' => true,
				'type' => 'comment',
                'avatar_size' => 65
			]);
			?>
		</ul><!-- .comment-list -->
	</div>
<?php endif; ?>
