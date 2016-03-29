<?php
/**
 * @package rst
 */
?>

<?php 
	$is_show_thumbnail = rs::getField('rst_is_show_thumbnail');
	if( !isset($is_show_thumbnail) || $is_show_thumbnail ) :
		get_template_part( 'thumbnail', get_post_format() );
	endif;
?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class('rst-wrap-content rst-post-content'); ?>>
	
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
	
	<time itemprop="dateCreated" datetime="2013-05-02T12:42:23+00:00" class="rst-post-date"><?php echo mysql2date('dS F Y', $post->post_date) ?></time>
	<meta content="UserComments:0" itemprop="interactionCount">
	<div class="rst-main-content">
		<?php the_content() ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( '<span>Pages:</span>', 'rst' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<div class="rst-single-footer">
		<div class="row">
			<div class="col-sm-6">
				<div class="rst-category">
					<?php the_category( ' ' ); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<?php 
					if( rs::getField('rst_is_show_share') ) :
						get_template_part( 'content', 'share' );
					endif;
				?>
			</div>
		</div>
	</div>
	
</article><!-- #post-## -->

<?php
	$is_show_author = rs::getField('rst_is_show_author');
	if( !isset($is_show_author) || $is_show_author ) :
		get_template_part( 'content', 'author' );
	endif;
?>

<?php
	$is_show_recent_post = rs::getField('rst_show_recent_post');
	if( !isset($is_show_recent_post) || $is_show_recent_post ) :
		get_template_part( 'content', 'recent-posts' );
	endif;
?>
