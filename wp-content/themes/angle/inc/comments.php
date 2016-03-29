<?php

/*
 * Get Comments Post
 */
function rst_comments( $post_id ){
	$args = array(
		'post_id' 			=> $post_id,
		'parent'			=> 0
	);
	$rst_comments = get_comments($args);
	if( sizeof($rst_comments) ) {
?>
	<ol class="commentlist">
		<?php
			foreach( $rst_comments as $key=>$rst_comment ) { 
				global $comment;
				$comment = $rst_comment;
		?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $key%2 ? 'thread-event' : 'thread-old' ); ?>>
		  <table class="comment-container wow fadeIn">
			<tr>
			  <td class="comment-avatar">
				<?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
			  </td>
			  <td class="comment-data">
				<div class="comment-header">
				  <span class="comment-author">
				    <?php if( !empty($comment->comment_author_url) ) { ?>
					<a href="<?php echo ($comment->comment_author_url) ?>">
						<?php echo force_balance_tags($comment->comment_author) ?>
					</a>
					<?php } else { ?>
						<?php echo force_balance_tags($comment->comment_author) ?>
					<?php } ?>
				  </span>
				  <span class="comment-infor">
					  <span class="comment-date">
						<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'rst' ), get_comment_date('dS F Y',$comment->comment_ID), get_comment_time() ) ?> - </span>
					</span>
				</div>
				<div class="comment-body">
				  <?php comment_text(); ?>
				</div>
				
				<?php 
					$max_depth = get_option('thread_comments_depth');
					//add max_depth to the array and give it the value from above and set the depth to 1
					$default = array(
						'add_below'  => 'comment',
						'respond_id' => 'respond',
						'reply_text' => __('Reply','rst'),
						'login_text' => __('Log in to Reply','rst'),
						'depth'      => 1,
						'before'     => '',
						'after'      => '',
						'max_depth'  => $max_depth
						);
					comment_reply_link($default, $comment->comment_ID, $post_id);
				?>
				
			  </td>
			</tr>
		  </table>
		  <?php rst_get_child_commments( $post_id, $comment->comment_ID ) ?>
		</li>
		<?php } ?>
	</ol>
<?php
	}
}


/*
 * Get Comments Child
 */
function rst_get_child_commments($post_id,$comment_id) {
	$args = array(
		'post_id' 			=> $post_id,
		'parent'			=> $comment_id
	);
	$rst_comments = get_comments($args);
	if( sizeof($rst_comments) ) {
		foreach( $rst_comments as $key=>$rst_comment ){
			global $comment;
			$comment = $rst_comment;
?>
	  <ul class="children">
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $key%2 ? 'thread-event' : 'thread-old' ); ?>>
		  <table class="comment-container wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
			<tbody><tr>
			  <td class="comment-avatar">
				<?php echo get_avatar( $comment->comment_author_email, 70 ); ?>
			  </td>
			  <td class="comment-data">
				<div class="comment-header">
				  <span class="comment-author">
				    <?php if( !empty($comment->comment_author_url) ) { ?>
					<a href="<?php echo esc_url($comment->comment_author_url) ?>">
						<?php echo force_balance_tags($comment->comment_author) ?>
					</a>
					<?php } else { ?>
						<?php echo force_balance_tags($comment->comment_author) ?>
					<?php } ?>
				  </span>
				  <span class="comment-infor">
						<span class="comment-date">
						<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'rst' ), get_comment_date('dS F Y',$comment->comment_ID), get_comment_time() ) ?></span>
					</span>
				</div>
				<div class="comment-body">
				  <?php comment_text(); ?>
				</div>
						
				<?php 
					$max_depth = get_option('thread_comments_depth');
					//add max_depth to the array and give it the value from above and set the depth to 1
					$default = array(
						'add_below'  => 'comment',
						'respond_id' => 'respond',
						'reply_text' => __('Reply','rst'),
						'login_text' => __('Log in to Reply','rst'),
						'depth'      => 1,
						'before'     => '',
						'after'      => '',
						'max_depth'  => $max_depth
						);
					comment_reply_link($default, $comment->comment_ID, $post_id);
				?>
				
			  </td>
			</tr>
		  </tbody></table>
		  <?php rst_get_child_commments($post_id,$comment->comment_ID) ?>
		</li>
	  </ul>
<?php
		}
	}
}