<?php
	$width 	= rs::getField('rst_video_width',get_the_ID()) ? rs::getField('rst_video_width',get_the_ID()) : 800;
	$height = rs::getField('rst_video_height',get_the_ID()) ? rs::getField('rst_video_height',get_the_ID()): 320;
	$type 	= rs::getField('rst_video_type',get_the_ID());
	$embed 	= rs::getField('rst_video_embed',get_the_ID());
?>
<?php if( !empty($embed) && !empty($type) ) { ?>
<div class="rst-thumbnail">
	<?php
		$src = '';
		if( $type == 'youtube' ) {
			$src = 'http://www.youtube.com/embed/'.$embed;
		}
		else {
			$src = 'http://player.vimeo.com/video/'.$embed;
		}
	?>
	<iframe style="border: 0 none;" src="<?php echo esc_url($src) ?>" width="<?php echo absint($width) ?>" height="<?php echo absint($height) ?>" allowfullscreen="allowfullscreen"></iframe>
</div>
<?php
	} else { 
		get_template_part( 'thumbnail' );
	} 
?>