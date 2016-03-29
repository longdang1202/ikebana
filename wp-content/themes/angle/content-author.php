<?php
	$user_info = get_userdata(get_the_author_meta( 'ID' ));
	$size_author = 104;
?>
<div class="rst-author-box rst-wrap-content wow fadeIn animated">
	<div class="rst-author-head">
		<div class="rst-author-img">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), $size_author ); ?>
			</a>
		</div>
		<div class="rst-author-info">
			<h4 class="empty-title"><span>
				<?php echo (is_object($user_info) && !empty($user_info->display_name)) ? esc_html($user_info->display_name) : '' ?>
			</span></h4>
			<?php if( get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ) ) { ?>
			<div class="rst-author-info">
				<div class="rst-author-about">
					<?php echo apply_filters('the_content', get_the_author_meta( 'description', get_the_author_meta( 'ID' ) )); ?>
				</div>
			</div>
			<?php } ?>
			<div class="rst-author-link">
			
				<?php if( rs::getField('rst_user_twitter','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-twitter" target="_blank" href="<?php echo rs::getField('rst_user_twitter','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-twitter"></i></a>
				<?php } ?>
				
				<?php if( rs::getField('rst_user_facebook','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-facebook" target="_blank" href="<?php echo rs::getField('rst_user_facebook','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-facebook"></i></a>
				<?php } ?>
				
				<?php if( rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-google-plus" target="_blank" href="<?php echo rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-google-plus"></i></a>
				<?php } ?>
				
				<?php if( rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-pinterest" target="_blank" href="<?php echo rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-pinterest"></i></a>
				<?php } ?>
				
				<?php if( rs::getField('rst_user_linkedin','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-linkedin" target="_blank" href="<?php echo rs::getField('rst_user_linkedin','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-linkedin"></i></a>
				<?php } ?>
				
				<?php if( rs::getField('rst_user_tumblr','user_'.get_the_author_meta( 'ID' )) ) { ?>
				<a class="rst-icon-tumblr" target="_blank" href="<?php echo rs::getField('rst_user_tumblr','user_'.get_the_author_meta( 'ID' )) ?>"><i class="fa fa-tumblr"></i></a>
				<?php } ?>
				
			</div>
		</div>
	</div>
</div>