
<div class="rst-thumbnail">
	<?php
		$src 	= rs::getField('rst_audio_iframe',get_the_ID());
		if( !empty($src) ) { 
			echo force_balance_tags($src);
		} else { 
			the_post_thumbnail();
		} 
	?>
</div>
