<?php
function ub_upload_image( $url ) {
	$timeout_seconds = 30;
	$temp_file = download_url( $url, $timeout_seconds );
	$ext = rs::getExtension($url);
	if (!is_wp_error( $temp_file )) {
		$file = array(
			'name' => basename($url), 
			'type' => wp_ext2type($ext),
			'tmp_name' => $temp_file,
			'error' => 0,
			'size' => filesize($temp_file),
		);

		$id = media_handle_sideload( $file, 0 );

		if (is_wp_error($id )) {
			$result = json_encode(array(
				'error' => true,
				'message' => $id->get_error_message()
			));
		} else {
			$result = json_encode(wp_prepare_attachment_for_js($id));
		}
	}
	else{
		$result = json_encode(array(
			'error' => true,
			'message' => $temp_file->get_error_message()
		));
	}
	return $result;
}

function ub_save_post_format(){
	global $post;

	if( is_object($post) && isset($_POST['rst_video_embed']) ) :
		$format = get_post_format( $post->ID );
		$id = $_POST['rst_video_embed'];
		
		if( $format == 'video' && !get_post_thumbnail_id($post->ID) ){
			if( $_POST['rst_video_type'] == 'youtube' && $id ){
				$maxres = 'http://img.youtube.com/vi/' . $id . '/maxresdefault.jpg';
				$response = wp_remote_head( $maxres );
				if ( !is_wp_error( $response ) && $response['response']['code'] == '200' ) {
					$result = $maxres;
				} else {
					$result = 'http://img.youtube.com/vi/' . $id . '/0.jpg';
				}
			}
			if( $_POST['rst_video_type'] == 'vimeo' && $id ){
				$get_content = @file_get_contents("http://vimeo.com/api/v2/video/".$id.".php");
				if( $get_content ){
					$hash = unserialize($get_content);
					$result = $hash[0]["thumbnail_large"];
				}
			}
			if( $result ){
				$content = json_decode(ub_upload_image( $result ),true);
				$thumbnail_id = $content['id'];
				update_post_meta( $post->ID, '_thumbnail_id', $thumbnail_id, 'true');
			}
		}
		
		if( $_POST['rst_video_type'] == 'youtube' && $id ){
			$url = 'http://www.youtube.com/oembed?url=http%3A//www.youtube.com/watch?v%3D'.$id.'&format=json';
			$json = file_get_contents($url);
			if($json) {
				$object = json_decode($json);
				update_post_meta( $post->ID, 'rs-rst_video_width', $object->width, 'true');
				update_post_meta( $post->ID, 'rs-rst_video_height', $object->height, 'true');
			}
		}
		if( $_POST['rst_video_type'] == 'vimeo' && $id ){
			$url = 'http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/'.$id.'&format=json';
			$json = file_get_contents($url);
			if($json) {
				$object = json_decode($json);
				update_post_meta( $post->ID, 'rs-rst_video_width', $object->width, 'true');
				update_post_meta( $post->ID, 'rs-rst_video_height', $object->height, 'true');
			}
		}
	endif;
}

add_action('save_post', 'ub_save_post_format');


add_filter('admin_post_thumbnail_html', 'ub_custom_post_thumbnail_meta_box',10, 2);
function ub_custom_post_thumbnail_meta_box( $html ) { 
	return $html . '<div class="ub_loading">Working... <img src="'. home_url( 'wp-admin/images/loading.gif') .'" alt="" /></div>
<a href="javascript:;" class="ub_auto_get_featured ub_post_format_video">Auto get featured image</a>';
}



add_action('wp_ajax_ub_auto_get_featured', 'ub_auto_get_featured_action');
add_action('wp_ajax_nopriv_ub_auto_get_featured', 'ub_auto_get_featured_action');


function ub_auto_get_featured_action() {
	global $post;
	$post_id =  $_POST['post_id'];
	
	$current_post = get_post($post_id);
	$content = 0;
	if( $current_post->post_type == 'post' ){
		// $format = get_post_format( $current_post->ID );
		$format = $_POST['post_format'];
		if( $format == 'video' ){
			// $id = rs::getField('rst_video_embed',$post_id);
			$id = $_POST['video_embed'];
			$result = '';
			// $video_type = rs::getField('rst_video_type',$post_id);
			$video_type = $_POST['video_type'];
			if( $video_type == 'youtube' && $id ){
				$maxres = 'http://img.youtube.com/vi/' . $id . '/maxresdefault.jpg';
				$response = wp_remote_head( $maxres );
				if ( !is_wp_error( $response ) && $response['response']['code'] == '200' ) {
					$result = $maxres;
				} else {
					$result = 'http://img.youtube.com/vi/' . $id . '/0.jpg';
				}
				$url = 'http://www.youtube.com/oembed?url=http%3A//www.youtube.com/watch?v%3D'.$id.'&format=json';
				
				if( $json = @file_get_contents($url) ) {
					$object = json_decode($json);
					update_post_meta( $post_id, 'rs-rst_video_width', $object->width, 'true');
					update_post_meta( $post_id, 'rs-rst_video_height', $object->height, 'true');
				}
			}
			if( $video_type == 'vimeo' && $id ){
				$get_content = @file_get_contents("http://vimeo.com/api/v2/video/".$id.".php");
				if( $get_content ){
					$hash = unserialize($get_content);
					$result = $hash[0]["thumbnail_large"];
				}
				$url = 'http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/'.$id.'&format=json';
				$json = file_get_contents($url);
				if($json) {
					$object = json_decode($json);
					update_post_meta( $post_id, 'rs-rst_video_width', $object->width, 'true');
					update_post_meta( $post_id, 'rs-rst_video_height', $object->height, 'true');
				}
			}
			
			if( $result != '' ){
				$content_result = json_decode(ub_upload_image( $result ),true);
				
				if( !isset($content_result['error']) ) {
					$thumbnail_id = $content_result['id'];
					update_post_meta( $post_id, '_thumbnail_id', $thumbnail_id);
					$content = _wp_post_thumbnail_html( $thumbnail_id, $post_id );
				}
			}
		}
	}
	echo force_balance_tags($content);
	exit;
}



add_action('admin_head', 'ub_get_featured_scripts');
function ub_get_featured_scripts() {
	?>
<style type="text/css">
.ub_loading { display:none }
</style>
<script type="text/javascript">
	jQuery(document).ready(function($){
		check_post_format_video();
		$('input[name="post_format"]').change(function(){
			check_post_format_video();
		});
	
		$(document).on('click','.ub_auto_get_featured',function(){
			$('.ub_loading').show();
			var $this = $(this);
			$.ajax({
				type : 'POST',
				data : {
				   'action' : 'ub_auto_get_featured',
				   'video_type' : $('#rst_video_type').val(),
				   'video_embed' : $('#rst_video_embed').val(),
				   'post_format' : $('input[name="post_format"]:checked').val(),
				   'post_id' :  $('#post_ID').val()
				},
				url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
				success : function (result){
					$('.ub_loading').hide();
					if( result != '0' )
						$('#postimagediv .inside').html(result);
				}
			});

		});
	});
	function check_post_format_video() {
		if( jQuery('input[name="post_format"]:checked').val() == 'video' )
			jQuery('.ub_post_format_video').show();
		else 
			jQuery('.ub_post_format_video').hide();
	}
</script>
	<?php	
}
