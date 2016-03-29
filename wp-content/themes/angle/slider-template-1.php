<div id="slider-template-1">
	<div class="slider-home-1">
		<?php 
			if( is_array(rs::getField('rst_home_slider_post')) ) {
				foreach( rs::getField('rst_home_slider_post') as $slider ) {
					$post_slider = get_post($slider['post']);
					if( get_post_thumbnail_id($post_slider->ID) ) {
		?>
		<div class="slide">
			<a href="<?php echo get_the_permalink($post_slider->ID) ?>">
				<img src="<?php echo bfi_thumb(wp_get_attachment_url(get_post_thumbnail_id($post_slider->ID)),array('width' => 930,'height'=> 620)) ?>" alt="">
			</a>
			<div class="rst-captions">
				<div class="rst-date"><span><?php echo mysql2date('dS F Y', $post_slider->post_date) ?></span></div>
				<div class="rst-title">
					<h3 class="empty-title">
						<a href="<?php echo get_the_permalink($post_slider->ID) ?>"><?php echo get_the_title($post_slider->ID) ?></a>
					</h3>
				</div>
			</div>
		</div>
		<?php
					}
				}
			} 
		?>
	</div>
</div>