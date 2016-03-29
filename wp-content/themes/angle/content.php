<?php
/**
 * @package rst
 */
?>

<?php
	global $rst_blog;
	$class = 'col-mb-6 col-sm-4 col-md-4 col-lg-3';
	if( isset($rst_blog['type']) && $rst_blog['type'] == 'large' ) {
		$class = 'col-sm-12';
	}
	if( isset($rst_blog['type']) && isset($rst_blog['column']) && ( $rst_blog['type'] == 'grid' || $rst_blog['type'] == 'box' ) ) {
		$column = absint( 12/$rst_blog['column'] );
		$column_mobie = ($column+1) <= 6 ? $column+1 : 12;
		$column_ip = ($column == 6) ? 12 : 6;
		$class = 'col-mb-'. $column_ip .' col-sm-'. $column_mobie .' col-md-'. $column_mobie .' col-lg-'.$column;
	}
	
	$size_thumb = 'large';
	if( $rst_blog['type'] == 'box' ) {
		$size_thumb = 'thumbnail';
	}
?>

<article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article" <?php post_class( $class.' rst-post-item wow slideUp animated'); ?>>
	<?php 
		if ( has_post_thumbnail() ) {
	?>
	<div class="rst-thumnnail">
		<?php
			$is_gallery = get_post_format() == 'gallery' && rs::getField('rst_gallery');
			$is_video = get_post_format() == 'video' && rs::getField('rst_video_embed');
			$is_audio = get_post_format() == 'audio' && rs::getField('rst_audio_iframe');
			$class = '';
			
			if( $is_gallery ) {
				$link = '#gallery'. esc_html(get_the_ID());
				$class = 'fancybox-gallery';
			}
			elseif( $is_video ) {
				$type = rs::getField('rst_video_type');
				$embed = rs::getField('rst_video_embed');
				$class = 'fancybox-media';
				
				if( isset($type) && $type == 'youtube' ){
					$link = 'http://www.youtube.com/embed/'. esc_html($embed);
				} else {
					$link = 'http://player.vimeo.com/video/'. esc_html($embed);
				}
			}
			elseif( $is_audio ) {
				$audio = rs::getField('rst_audio_iframe');
				preg_match('/src="([^"]+)"/', $audio, $match);
				$link = $match[1];
				$class = 'fancybox fancybox.iframe';
			}
			else {
				$link = get_the_permalink();
			}
		?>
		<a  class="<?php echo esc_attr($class) ?>" href="<?php echo esc_attr($link) ?>">
			<?php the_post_thumbnail($size_thumb); ?>
			<span class="rst-format-icon"><span class="fa overlay-icon hvr-ripple-out"></span></span>
		</a>
		<div class="rst-categories">
			<?php the_category( ', ' ); ?>
		</div>
		<?php if( $is_gallery ) { ?>
		<div style="display:none">
			<div id="gallery<?php echo esc_html(get_the_ID()) ?>">
				<ul class="bxslider">
					<?php foreach( rs::getField('rst_gallery') as $gallery ) { ?>
					<li><img src="<?php echo rst_get_attachment_image_src($gallery,'large') ?>" alt="" /></li>
					<?php } ?>
				</ul> 
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<div class="rst-inner-post-item">
		<h3 class="entry-title" itemscope itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="meta-info">
			<time datetime="<?php echo mysql2date('Y-m-d', $post->post_date) ?>" class="entry-date updated" itemprop="dateCreated"><?php echo mysql2date('dS F Y', $post->post_date) ?></time>
			<meta content="UserComments:0" itemprop="interactionCount">
		</div>
		<div class="rst-post-excerpt">
			<?php echo get_excerpt_by_id($post,isset($rst_blog['excerpt_length']) ? absint($rst_blog['excerpt_length']) : 30 ); ?>
		</div>
		
		<a href="<?php the_permalink(); ?>" class="rst-readmore"><?php rst_the_translate('Continue reading','translation_continue_reading') ?> ...</a>
	</div>
</article>