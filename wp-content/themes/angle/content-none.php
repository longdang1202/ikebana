<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rst
 */
?>

<section class="no-results not-found rst-wrap-content rst-post-content">
	
	<h1 class="page-title empty-title"><span><?php _e( 'Nothing Found', 'rst' ); ?></span></h1>
	
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rst' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rst' ); ?></p>

		<?php else : ?>
		
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rst' ); ?></p>
			
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
