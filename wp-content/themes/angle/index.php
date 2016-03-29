<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rst
 */

get_header(); ?>

	<!--- Content -->
	<div id="content">
		<div class="container">
		
			<?php 
				$template = get_theme_mod('rst_index_template') ? get_theme_mod('rst_index_template') : 'large';
			?>
			<div class="row<?php echo ( get_theme_mod('rst_index_pagenavi') == 2 ? ' rst-wrap-ajax' : '' ); ?>" data-sticky_parent="">
			
			<?php
				global $wp_query;
				$template_style = get_theme_mod('rst_index_layout') ? get_theme_mod('rst_index_layout') : 1;
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
				$post_per_page = get_theme_mod('rst_index_numberpost') ? get_theme_mod('rst_index_numberpost') : 10;
				$args = array(
					'posts_per_page' => $post_per_page,
					'paged' 			=> max( get_query_var( 'paged' ), get_query_var( 'page' ))
				);
				$args = array_merge( $wp_query->query_vars, $args );
				$the_query = new WP_Query( $args );
				$wp_query = $the_query;
			?>
			
			<?php
				global $rst_blog;
				$column = get_theme_mod('rst_index_column') ? get_theme_mod('rst_index_column') : 4;
				$rst_blog = array(
					'type' 				=> $template ? $template : 'large',
					'column' 			=> $column,
					'excerpt_length'	=> get_theme_mod('rst_index_excerpt_length') ? get_theme_mod('rst_index_excerpt_length') : 50
				);
			?>
			
			<?php 
				if( get_theme_mod('rst_index_pagenavi') == 2 ) {
					$rstkey =  uniqid();
					global $rst_pagenavi;
					$rst_pagenavi = array(
						'key' 		=> 'rst_'.$rstkey,
						'max-paged'	=> ceil(( $the_query->found_posts - $post_per_page ) / $column)
					);
			?>
			<script type="text/javascript">
				var rst_<?php echo esc_html($rstkey) ?> = new rst_blocks();
				rst_<?php echo esc_html($rstkey) ?>.atts = '<?php echo json_encode($rst_blog) ?>';
				rst_<?php echo esc_html($rstkey) ?>.url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
			</script>
			<?php } ?>
	
		
			<div class="<?php echo sanitize_html_class($class) ?>">
				
				<?php /* Start the Loop */ ?>
					<?php if ( $the_query->have_posts() ) : ?>
			
				<div class="row <?php echo ( get_theme_mod('rst_index_pagenavi') == 2 ? 'rst-inner-ajax' : '' ); ?> rst-<?php echo sanitize_html_class($template) ?> column-<?php echo sanitize_html_class($column) ?>">
					
					
					
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
					if( get_theme_mod('rst_index_pagenavi') == 1 ) {
						rst_the_posts_navigation(); 
					}
					elseif( get_theme_mod('rst_index_pagenavi') == 2 ) {
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
	</div><!-- #content -->

<?php get_footer(); ?>
