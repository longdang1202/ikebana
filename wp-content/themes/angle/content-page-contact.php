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
				echo '<h1 class="empty-title"><span>'. rs::getField('rst_sub_title') .'</span></h1>';
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

<article class="post rst-wrap-content rst-post-content" itemscope="" itemtype="http://schema.org/Article">
	<div class="row">
		<?php
			if( rs::getField('rst_template_style') == '1' ) {
				$class = 'col-sm-6';
			}
			else {
				$class = 'col-sm-12';
			}
		?>
		<div class="<?php echo sanitize_html_class($class) ?>">
			<h3 class="widget-title"><span><?php echo do_shortcode(rs::getField('rst_title_form')) ?></span></h3>
			<?php $cf7Form = get_post(rs::getField('rst_shortcode_form')); ?>
			<?php echo do_shortcode( '[contact-form-7 id="'.$cf7Form->ID.'" title="'.($cf7Form->post_title).'"]' ) ?>
		</div>
		<div class="<?php echo sanitize_html_class($class) ?>">
			<div id="map-canvas" data-height="<?php echo rs::getField('rst_map_height') ?>" data-center="<?php echo rs::getField('rst_address') ?>" data-zoom="<?php echo rs::getField('rst_map_zoom') ?>" class="rst-contact-maps"> </div>
		</div>

	</div>
</article>

<?php
	$is_show_author = rs::getField('rst_is_show_author');
	if( !isset($is_show_author) || $is_show_author ) :
		get_template_part( 'content', 'author' );
	endif;
?>