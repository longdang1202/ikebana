<?php
/*  ----------------------------------------------------------------------------
    the attachment template
*/

get_header(); ?>

	<!--- Content -->
	<section id="content">
		<div class="container">
			
			<div class="row" data-sticky_parent="">
			
				<div class="col-sm-12">
				
				<?php while ( have_posts() ) : the_post();  
				
						if ( wp_attachment_is_image( $post->id ) ) {
							$td_att_image = wp_get_attachment_image_src( $post->id, 'full');

							if (!empty($td_att_image[0])) {
								$td_att_url = $td_att_image[0];
							}

							if (empty($td_att_image[0])) {
								$td_att_image[0] = ''; //init the variable to not have problems
							}


							?>
							<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img class="td-attachment-page-image" src="<?php echo esc_url($td_att_image[0]);?>" alt="<?php echo esc_html($post->post_title) ?>" /></a>

							<div class="rst-wrap-content td-attachment-page-content">
								<?php the_content(); ?>
							</div>
							<?php
						}
					
					endwhile; // end of the loop. 
				?>

				</div><!-- Main Content -->
				
				
			</div>
			
		</div><!-- .container -->
	</section><!-- #content -->

<?php get_footer(); ?>
