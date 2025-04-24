<?php
namespace empress\Theme;


class Comment {
	/**
	 * Make comment field (textarea) the last field in comment form
	 */
	public static function makeCommentFieldTheLastField() {
		add_filter('comment_form_fields', function ($fields) {
			$commentField = $fields['comment'];
			unset($fields['comment']);
			$fields['comment'] = $commentField;
			return $fields;
		});
	}

	/**
	 * Insert (render) HTML code before comment fields
	 *
	 * @param $htmlCode string HTML code to insert before fields
	 */
	public static function prependToCommentFields($htmlCode) {
		add_action('comment_form_before_fields', function () use ($htmlCode) {
			echo $htmlCode;
		});
	}

	/**
	 * Insert (render) HTML code after comment fields
	 *
	 * @param $htmlCode string HTML code to insert after fields
	 */
	public static function appendToCommentFields($htmlCode) {
		add_action('comment_form_after_fields', function() use ($htmlCode) {
			echo $htmlCode;
		});
	}

	/**
	 * Wrap comment fields in a div with a string of classes
	 *
	 * @param $classes string List of classes for div's class attribute
	 */
	public static function wrapCommentFieldsInDivWithClass($classes) {
		self::prependToCommentFields('<div class="' . $classes . '">');
		self::appendToCommentFields('</div>');
	}

	public static function filter_getCommentFormFields($fields) {
		$field = '<div class="col-md-4 col-sm-12 comment-field">
			<div class="form-field">
				<i class="fa %s"></i>
				<input type="%s" name="%s" placeholder="%s" required />
			</div>
		</div>';

		$fields['author'] = sprintf($field, 'fa-user', 'text', 'author', __('Enter your name', 'empress'));
		$fields['email'] = sprintf($field, 'fa-envelope-o', 'email', 'email', __('Enter your email', 'empress'));
		$fields['url'] = sprintf($field, 'fa-globe', 'url', 'url', __('Enter your website', 'empress'));
		return $fields;
	}

	public static function filter_getCommentFormFieldsForMaterialize($fields) {
		$field = '<div class="comment-field">
    <div class="input-field">
		<i class="material-icons prefix">%s</i>
        <input type="%s" name="%s" id="%s" required />
        <label for="%s">%s</label>
    </div>
</div>';
		$fields['author'] = sprintf($field, 'person', 'text', 'author', 'author', 'author', __('Your name', 'empress'));
		$fields['email'] = sprintf($field, 'email', 'email', 'email', 'email', 'email', __('Your Email', 'empress'));
		$fields['url'] = sprintf($field, 'language', 'url', 'url', 'url', 'url', __('Your Website', 'empress'));
		return $fields;
	}

	public static function getCommentFormArgs() {
		return [
			'title_reply' => __('Leave a Comment', 'empress'),
			'class_form' => 'data-form',
			'class_submit' => 'btn btn-dark',
			'submit_field' => '<div class="row"><div class="col-md-12 col-sm-12">%1$s %2$s</div></div>',
			'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="fa fa-paper-plane"></i>&nbsp;%4$s</button>',
			'submit_class' => 'btn btn-dark',
			'comment_field' => '<div class="row comment-content">
									<div class="col-xs-12 comment-field">
										<div class="form-field">
											<i class="fa fa-pencil-square-o"></i>
											<textarea name="comment" rows="8" placeholder="' . __('Enter your comment', 'empress') . '" required=""></textarea>
										</div>
									</div>
								</div>'
		];
	}

	public static function getCommentFormArgsForMaterialize() {
		return [
			'title_reply' => __('Leave a Comment', 'empress'),
			'class_form' => 'data-form',
			'class_submit' => 'waves-effect waves-light btn',
			'submit_field' => '<div class="row"><div class="">%1$s %2$s</div></div>',
			'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><i class="fa fa-paper-plane"></i>&nbsp;%4$s</button>',
			'submit_class' => 'waves-effect waves-light btn',
			'comment_field' => '<div class="comment-content">
									<div class="comment-field">
										<div class="input-field">
											<i class="material-icons prefix">account_circle</i>
											<textarea class="materialize-textarea" name="comment" rows="8" required=""></textarea>
											<label for="comment">' . __('Your comment', 'empress') . '</label>
										</div>
									</div>
								</div>'
		];
	}
}