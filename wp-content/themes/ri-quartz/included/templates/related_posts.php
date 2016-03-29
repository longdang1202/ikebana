<?php

$categories = get_the_category(get_the_ID());

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args = array(
		'post_type' => 'post',
		'post__not_in' => array(get_the_ID()),
		'showposts' => 3
	);


	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related"><div class="post-box"><h5 class="post-box-title"><span><?php echo esc_html(__('You Might Also Like', 'ri-quartz')); ?></span></h5></div>
        <div class="row">
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<div class="item-related col-sm-4 col-md-4">
					<?php if (has_post_thumbnail()) { ?>
					<a href="<?php echo esc_url(get_permalink()); ?>"><?php wp_kses(the_post_thumbnail('medium'),array('img'=>array('class'=>array(),'width'=>array(),'height'=>array(),'alt'=>array(),'src'=>array()))); ?></a>
					<?php } else { ?>
					<a href="<?php echo esc_url(the_permalink()) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.jpg'); ?>" alt="<?php echo esc_html__('Image Placeholder', 'ri-quartz'); ?>" /></a>
					<?php } ?>
					
					<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
					<span class="date"><?php the_time( get_option('date_format') ); ?></span>
					
				</div>
		<?php
		}
		echo '</div></div>';
	}

wp_reset_postdata();

?>