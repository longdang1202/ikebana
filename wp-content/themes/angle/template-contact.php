<?php
/**
 * The template for displaying all single posts.
 *
 * @package rst
 */

 /* Template Name: Contact Page */ 
get_header(); ?>

	<!--- Content -->
	<div id="content">
		<div class="container">
			
			<div class="row" data-sticky_parent="">
			
				<?php
					$template_style = rs::getField('rst_template_style') ? rs::getField('rst_template_style') : 1;
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
			
				<div class="<?php echo sanitize_html_class($class) ?>">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page-contact' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

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
