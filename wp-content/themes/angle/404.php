<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package rst
 */

get_header(); ?>

	<!--- Content -->
	<section id="content">
		<div class="container">
			
			<article itemtype="http://schema.org/Article" class="rst-wrap-content rst-post-content error404">
				<h1 class="empty-title"><?php echo get_theme_mod('title_404') ? get_theme_mod('title_404') : '404' ?></h1>
				<h2><?php echo get_theme_mod('subtitle_404') ? get_theme_mod('subtitle_404') : 'Page not found' ?></h2>
				<?php echo apply_filters('the_content', get_theme_mod('content_404')) ?>
				<a class="rst-back-home" href="<?php echo esc_url(home_url()) ?>"><span><?php rst_the_translate('Go to Home Page','translation_go_to_home') ?></span></a>
			</article>
			
		</div><!-- .container -->
	</section><!-- #content -->

<?php get_footer(); ?>
