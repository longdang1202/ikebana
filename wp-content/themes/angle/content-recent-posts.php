<div itemtype="http://schema.org/WPSideBar" itemscope="itemscope" class="rst-recent-post-box rst-wrap-content wow fadeIn animated">
	<h3 class="widget-title"><span>Other posts</span></h3>
	<div class="row rst-rencent-posts">
		<?php 
			//for use in the loop, list 3 post titles related to first tag on current post
			$tags = wp_get_post_tags(get_the_ID());
			if ( $tags || wp_get_post_categories(get_the_ID()) ) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array(get_the_ID()),
					'category__in' => wp_get_post_categories(get_the_ID()),
					'posts_per_page'=> 3
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
		?>
		<div itemtype="http://schema.org/Article" itemscope="" class="col-sm-4 rst-post">
			<?php if( get_post_thumbnail_id($post->ID) ) { ?>
			<div class="rst-thumbnail">
				<a href="<?php the_permalink() ?>"><img src="<?php echo esc_url(rst_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' )) ?>" alt="" /></a>
			</div>
			<?php } ?>
			<h3 class="entry-title" itemprop="name"><a itemprop="url" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
			<div class="rst-information">
				<time itemprop="dateCreated" datetime="2013-05-02T12:42:23+00:00" class="rst-post-date"><?php echo mysql2date('dS F Y', $post->post_date) ?></time><meta content="UserComments:0" itemprop="interactionCount">
			</div>
		</div>
		<?php
				endwhile;
				}
				wp_reset_query();
			}
		?>
	</div>
</div>