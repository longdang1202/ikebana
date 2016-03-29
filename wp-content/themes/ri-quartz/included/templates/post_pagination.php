<div class="post-pagination row">

	<?php
	$pagination_portfolio = get_post_type( get_the_ID() );
	if($pagination_portfolio == 'portfolio'){
		$prev_post = get_previous_post(true, '', 'portfolio_category');
		$next_post = get_next_post(true, '', 'portfolio_category');
	} else {
		$prev_post = get_previous_post();
		$next_post = get_next_post();
	}
	?>
	
	<?php if (!empty( $prev_post )) : ?>
		<div class="prev-post col-sm-6 col-md-6">
			<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"></a>
		</div>
	<?php endif; ?>

	<?php if (!empty( $next_post )) : ?>
		<div class="next-post pull-right col-sm-6 col-md-6">
			<a class="pull-right" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"></a>
		</div>
	<?php endif; ?>
		
</div>