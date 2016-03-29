<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rst
 */

get_header(); ?>

	<!--- Content -->
	<section id="content">
		<div class="container">
		
			<?php 
				$template = get_theme_mod('rst_cat_template') ? get_theme_mod('rst_cat_template') : 'large';
			?>
			<div class="row<?php echo ( get_theme_mod('rst_cat_pagenavi') == 2 ? ' rst-wrap-ajax' : '' ); ?>" data-sticky_parent="">
			
			<?php
				
				$template_style = get_theme_mod('rst_cat_layout') ? get_theme_mod('rst_cat_layout') : 1;
				$class = 'col-sm-12';
				if( $template_style == 2 || $template_style == 3 )
					$class = 'col-sm-8';
				if( $template_style == 2 ) {
			?>
				<div class="col-sm-4" data-sticky_column="">
					<div id="sidebar" class="sidebar-left">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				</div><!-- #sidebar -->
			<?php
				}
			?>
			
			<?php
				global $wp_query;
				$post_per_page = get_theme_mod('rst_cat_numberpost') ? get_theme_mod('rst_cat_numberpost') : 10;
				
				$args = array(
					'posts_per_page' 	=> absint($post_per_page),
					'paged' 			=> max( get_query_var( 'paged' ), get_query_var( 'page' ))
				);
				$args = array_merge( $wp_query->query_vars, $args );
				$the_query = new WP_Query( $args );
				$wp_query = $the_query;
			?>
		
			<?php
				global $rst_blog;
				$column = get_theme_mod('rst_cat_column') ? get_theme_mod('rst_cat_column') : 4;
				$rst_blog = array(
					'type' 				=> $template ? $template : 'large',
					'column' 			=> $column,
					'excerpt_length'	=> get_theme_mod('rst_cat_excerpt_length') ? get_theme_mod('rst_cat_excerpt_length') : 50
				);
			?>  
			
			<?php 
				if( get_theme_mod('rst_cat_pagenavi') == 2 ) {
					$rstkey =  uniqid();
					global $rst_pagenavi;
					$rst_pagenavi = array(
						'key' 		=> 'rst_'.$rstkey,
						'max-paged'	=> round(( $the_query->found_posts - $post_per_page ) / (int)$column) + 1
					);
					
			?>
			<script type="text/javascript">
				var rst_<?php echo esc_html($rstkey) ?> = new rst_blocks();
				rst_<?php echo esc_html($rstkey) ?>.atts = '<?php echo json_encode($rst_blog) ?>';
				rst_<?php echo esc_html($rstkey) ?>.url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
			</script>
			<?php } ?>
			
			<div class="<?php echo sanitize_html_class($class) ?>">
				<?php if( is_author() ) { ?>
				<div class="rst-wrap-content rst-author-box">
					<div class="rst-author-head">
						<div class="rst-author-img">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?></a>
						</div>
						<div class="rst-author-info">
							<?php $user_info = get_userdata(get_the_author_meta( 'ID' )); ?>
							<h1 class="empty-title"><span><?php echo (is_object($user_info) && !empty($user_info->display_name)) ? esc_html($user_info->display_name) : '' ?></span></h1>
							<div class="rst-author-info">
								<div class="rst-author-about">
									<?php if( rs::getField('rst_user_job','user_'.get_the_author_meta( 'ID' )) ) { ?>
									<p>- <?php echo rs::getField('rst_user_job','user_'.get_the_author_meta( 'ID' )) ?></p>
									<?php } ?>
									<p>- Email: <?php echo get_the_author_meta( 'user_email' ) ?></p>
									<p>- Writed <?php echo count_user_posts(get_the_author_meta( 'ID' )) ?> posts</p>
								</div>
								<?php echo apply_filters('the_content', get_the_author_meta( 'description', get_the_author_meta( 'ID' ) )); ?>
							</div>
							<div class="rst-author-link">
								<?php if( rs::getField('rst_user_twitter','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a href="<?php echo esc_url(rs::getField('rst_user_twitter','user_'.get_the_author_meta( 'ID' ))) ?>" target="_blank" class="rst-icon-twitter"><i class="fa fa-twitter"></i></a>
								<?php } ?>
								<?php if( rs::getField('rst_user_facebook','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a href="<?php echo esc_url(rs::getField('rst_user_facebook','user_'.get_the_author_meta( 'ID' ))) ?>" target="_blank" class="rst-icon-facebook"><i class="fa fa-facebook"></i></a>
								<?php } ?>
								<?php if( rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a href="<?php echo esc_url(rs::getField('rst_user_google','user_'.get_the_author_meta( 'ID' ))) ?>" target="_blank" class="rst-icon-google-plus"><i class="fa fa-google-plus"></i></a>
								<?php } ?>
								<?php if( rs::getField('rst_user_pinterest','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a href="<?php echo esc_url(rs::getField('rst_user_pinterest','user_'.get_the_author_meta( 'ID' ))) ?>" target="_blank" class="rst-icon-pinterest"><i class="fa fa-pinterest"></i></a>
								<?php } ?>
								<?php if( rs::getField('rst_user_linkedin','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a href="<?php echo esc_url(rs::getField('rst_user_linkedin','user_'.get_the_author_meta( 'ID' ))) ?>" target="_blank" class="rst-icon-linkedin"><i class="fa fa-linkedin"></i></a>
								<?php } ?>
								<?php if( rs::getField('rst_user_tumblr','user_'.get_the_author_meta( 'ID' )) ) { ?>
								<a class="rst-icon-tumblr" href="<?php echo esc_url(rs::getField('rst_user_tumblr','user_'.get_the_author_meta( 'ID' ))) ?>"><i class="fa fa-tumblr"></i></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } else { ?>
				<div class="rst-wrap-content rst-archive-head">
					<?php
						echo rst_get_the_archive_title( '<h1 class="empty-title"><span>', '</span></h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</div><!-- .page-header -->
				<?php } ?>
				
				<?php /* Start the Loop */ ?>
				<?php if ( $the_query->have_posts() ) : ?>
				
				<div class="row <?php echo ( get_theme_mod('rst_cat_pagenavi') == 2 ? 'rst-inner-ajax' : '' ); ?> rst-<?php echo sanitize_html_class($template) ?> column-<?php echo sanitize_html_class($column) ?>">
					
					<?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>
					
					
				</div>
				
				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>
				
				<?php 
					if( get_theme_mod('rst_cat_pagenavi') == 1 ) {
						rst_the_posts_navigation(); 
					}
					elseif( get_theme_mod('rst_cat_pagenavi') == 2 ) {
						rst_the_posts_navigation_ajax(); 
					}
				?>
				
			</div><!-- Main Content -->

			<?php
				if( $template_style == 3 ) {
			?>
				<div class="col-sm-4" data-sticky_column="">
					<div id="sidebar" class="sidebar-right">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				</div><!-- #sidebar -->
			<?php
				}
			?>
			
			</div>
			
		</div><!-- .container -->
	</section><!-- #content -->

<?php get_footer(); ?>