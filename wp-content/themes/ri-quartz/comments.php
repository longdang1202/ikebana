<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
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

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'ri-quartz' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>


		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 56,
			) );
			?>
		</ol><!-- .comment-list -->
		<?php next_comments_link(); ?>
		<?php previous_comments_link(); ?>

	<?php endif; // have_comments() ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php echo esc_html(__( 'Comments are closed.', 'ri-quartz' )); ?></p>
	<?php endif; ?>

	<?php if ( 'open' == ri_quartz_comment_status() ) : ?>
		<div id="respond-wrap">
			<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields =  array(
				'author' => '<p class="comment-form-author"><span class="contact-label">'. esc_html(__('Your Name', 'ri-quartz')) .'<span class="accent-color">*</span></span><span class="comment-name"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></span></p>',
				'email' => '<p class="comment-form-email"><span class="contact-label">'. esc_html(__('Your Email', 'ri-quartz')) .'<span class="accent-color">*</span></span><span class="comment-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></span></p>',
				'url' => '<p class="comment-form-url"><span class="contact-label">'. esc_html(__('Website', 'ri-quartz')) .'<span class="accent-color">*</span></span><span class="comment-website"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></span></p>'
			);
			$comments_args = array(
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title pb0">',
				'title_reply_after'    => '</h5>',
				'logged_in_as'		   => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'ri-quartz' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ) ) . '</p>',
				'comment_field'		   => '<p class="comment-form-comment"><span class="contact-label">'. esc_html(__('Your comment', 'ri-quartz')) .'<span class="accent-color">*</span></span><span class="comment-message"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></span></p>',
				'must_log_in'		   => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ri-quartz' ), wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ) ) . '</p>',
			);
			?>

			<?php comment_form($comments_args); ?>
		</div>
	<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
</div><!-- #comments -->