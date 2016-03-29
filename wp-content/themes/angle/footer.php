<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rst
 */
?>

	<!--- Footer -->
		<footer>
			<div class="container">
				<?php $is_hide_social = get_theme_mod('footer_hide_social'); ?>
				<?php if( !$is_hide_social ) { ?>
				<nav class="rst-social">
					<?php if( get_theme_mod('social_facebook') ) { ?>
					<a target="_blank" class="rst-icon-facebook" href="<?php echo esc_url(get_theme_mod('social_facebook')) ?>"><i class="fa fa-facebook"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_google') ) { ?>
					<a target="_blank" class="rst-icon-google-plus" href="<?php echo esc_url(get_theme_mod('social_google')) ?>"><i class="fa fa-google-plus"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_twitter') ) { ?>
					<a target="_blank" class="rst-icon-twitter" href="<?php echo esc_url(get_theme_mod('social_twitter')) ?>"><i class="fa fa-twitter"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_tumblr') ) { ?>
					<a target="_blank" class="rst-icon-tumblr" href="<?php echo esc_url(get_theme_mod('social_tumblr')) ?>"><i class="fa fa-tumblr"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_instagram') ) { ?>
					<a target="_blank" class="rst-icon-instagram" href="<?php echo esc_url(get_theme_mod('social_instagram')) ?>"><i class="fa fa-instagram"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_youtube') ) { ?>
					<a target="_blank" class="rst-icon-youtube" href="<?php echo esc_url(get_theme_mod('social_youtube')) ?>"><i class="fa fa-youtube"></i></a>
					<?php } ?>
					<?php if( get_theme_mod('social_linkedin') ) { ?>
					<a target="_blank" class="rst-icon-linkedin" href="<?php echo esc_url(get_theme_mod('social_linkedin')) ?>"><i class="fa fa-linkedin"></i></a>
					<?php } ?>
					<a target="_blank" class="rst-icon-rss" href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i></a>
				</nav>
				<?php } ?>
				<div class="rst-copyright">
					<?php echo get_theme_mod('footer_copyright') ?>
				</div>
			</div>
		</footer><!--- End Footer -->
		
	</div><!--- End Wrapper -->

<?php wp_footer(); ?>

</body>
</html>
