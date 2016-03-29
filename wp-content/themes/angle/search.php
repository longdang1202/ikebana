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
	<div id="content">
		<div class="container">
		
			<?php 
				$template = get_theme_mod('rst_search_template') ? get_theme_mod('rst_search_template') : 'large';
			?>
			<div class="row<?php echo ( get_theme_mod('rst_search_pagenavi') == 2 ? ' rst-wrap-ajax' : '' ); ?>" data-sticky_parent="">
			
			<?php
				
				$template_style = get_theme_mod('rst_search_layout') ? get_theme_mod('rst_search_layout') : 1;
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
				$post_per_page = get_theme_mod('rst_search_numberpost') ? get_theme_mod('rst_search_numberpost') : 10;
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
				$column = get_theme_mod('rst_search_column') ? get_theme_mod('rst_search_column') : 4;
				$rst_blog = array(
					'type' 				=> $template ? $template : 'large',
					'column' 			=> $column,
					'excerpt_length'	=> get_theme_mod('rst_search_excerpt_length') ? get_theme_mod('rst_search_excerpt_length') : 50
				);
			?>
			
			<?php 
				if( get_theme_mod('rst_search_pagenavi') == 2 ) {
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
				
				<div class="rst-wrap-content rst-search-head">
					<h1 class="empty-title"><span><?php rst_the_translate('Search resuilt for','translation_search_resuilt') ?> : <?php the_search_query(); ?></span></h1>
					<form action="<?php echo esc_url(home_url()) ?>" class="search-form" method="get" role="search">
						<label>
							<span class="screen-reader-text"><?php rst_the_translate('Search for','translation_search_for') ?>:</span>
							<input type="search" title="<?php rst_the_translate('Search for','translation_search_for') ?>:" name="s" value="" placeholder="Enter key word" class="search-field">
						</label>
						<input type="submit" value="<?php rst_the_translate('Search','translation_search') ?>" class="search-submit">
					</form>
					<div><?php rst_the_translate('If you\'re not happy with the results, please do another search','translation_search_not_happy') ?></div>
				</div> 
				
				<?php /* Start the Loop */ ?>
					<?php if ( $the_query->have_posts() ) : ?>
					
				<div class="row <?php echo ( get_theme_mod('rst_search_pagenavi') == 2 ? 'rst-inner-ajax' : '' ); ?> rst-<?php echo sanitize_html_class($template) ?> column-<?php echo sanitize_html_class($column) ?>">
					
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
					if( get_theme_mod('rst_search_pagenavi') == 1 ) {
						rst_the_posts_navigation(); 
					}
					elseif( get_theme_mod('rst_search_pagenavi') == 2 ) {
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