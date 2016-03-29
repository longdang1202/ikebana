<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package rst
 */
?>

<?php 
	$is_show_thumbnail = rs::getField('rst_is_show_thumbnail');
	if( !isset($is_show_thumbnail) || $is_show_thumbnail ) :
		get_template_part( 'thumbnail' );
	endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('rst-wrap-content rst-post-content'); ?>>
	
	<?php 
		$is_show_title = rs::getField('rst_show_title');
		if( !isset($is_show_title) || $is_show_title ) :
			if( rs::getField('rst_sub_title') == '' ) {
				the_title( '<h1 class="empty-title"><span>', '</span></h1>' ); 
			}
			else {
				echo '<h1 class="empty-title">'. rs::getField('rst_sub_title') .'<span></h1>';
			}
		endif;
	?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( '<span>Pages:</span>', 'rst' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php
		if( rs::getField('rst_is_show_share') ) :
			get_template_part( 'content', 'share' );
		endif;
	?>
	
	<?php edit_post_link( __( 'Edit', 'rst' ), '<span class="edit-link">', '</span>' ); ?>
	
</article><!-- #post-## -->

<?php
	$is_show_author = rs::getField('rst_is_show_author');
	if( !isset($is_show_author) || $is_show_author ) :
		get_template_part( 'content', 'author' );
	endif;
?>