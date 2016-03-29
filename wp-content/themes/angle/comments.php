<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Ublog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area rst-comment-box rst-wrap-content wow fadeIn animated">
	<div class="rst-remove"><?php wp_list_comments();paginate_comments_links();next_comments_link(); ?></div>
	<?php // You can start editing here -- including this comment! ?>
	<h3 class="widget-title"><span><?php comments_number('COMMENT (0)', 'COMMENT (1)', 'COMMENTS (%)');?></span></h3>
	<?php rst_comments(get_the_ID()); ?>
	
</div><!-- #comments -->
<?php endif; ?>

<div class="rst-comment-form rst-wrap-content wow fadeIn">
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$args = array(
			'id_form' => 'commentForm',
			'fields' => apply_filters(
				'comment_form_default_fields', array(
					'author' => '<div class="form-group wow fadeIn">
									<input id="author" name="author" placeholder="Name: (*)" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
								</div> ',
					'email' => '<div class="form-group wow fadeIn">
									<input id="email" name="email" placeholder="Email: (*)" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
								</div>',
					'url' => '<div class="form-group wow fadeIn">
								  <input id="url" name="url" placeholder="Website:" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
								</div>'
				)
			),
			'comment_field' => '<div class="form-group">
									<textarea id="comment" name="comment" placeholder="Comment:" cols="45" rows="8" aria-required="true"></textarea>
								</div>',
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'title_reply' => rst_get_translate('<span>Leave a Reply</span>','leave_a_comment'),
			'label_submit' => rst_get_translate('Post comment','sent_comment')
		);
	  ?>
	<?php comment_form($args, get_the_ID()); ?>
</div>
