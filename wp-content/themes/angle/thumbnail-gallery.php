<div class="rst-thumbnail">
	<?php if( rs::getField('rst_gallery') ) { ?>
	<ul class="bxslider">
		<?php foreach( rs::getField('rst_gallery') as $gallery ) { ?>
		<li><img src="<?php echo esc_url(rst_get_attachment_image_src( $gallery, 'large' )) ?>" alt="" /></li>
		<?php } ?>
	</ul>
	<?php } else { 
		the_post_thumbnail();
	} ?>
</div>