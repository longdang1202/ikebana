<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php ri_quartz_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="'. esc_html__('bookmark', 'ri-quartz') .'">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( 'post' == get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php ri_quartz_entry_meta(); ?>
			<?php edit_post_link( esc_html(__( 'Edit', 'ri-quartz' )), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php edit_post_link( esc_html(__( 'Edit', 'ri-quartz' )), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

	<?php endif; ?>

</article><!-- #post-## -->
