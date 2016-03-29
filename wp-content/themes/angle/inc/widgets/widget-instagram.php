<?php
class rst_instagram_widget extends WP_Widget {
	
	function rst_instagram_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-instagram', 'description' => 'A widget that show instagram' );

		/* Create the widget. */
		$this->WP_Widget( 'rst-instagram-widget', 'Laza - Instagram', $widget_ops);	
	}
	 
	function widget($args, $instance) {
		$html = '';
		$html .= $args['before_widget'];
		if( !empty($instance['title']) ) {
			$html .= $args['before_title'];
				$html .= $instance['title'];
			$html .= $args['after_title'];
		}
		$html .= '<div class="widget-wrap">';
			$html .= '<ul class="list-inline insta-photos row">';
				
				$userID = $instance['user_id'];
				$access_token = $instance['access_token'];
				$count = $instance['count'];
				
				$url = 'https://api.instagram.com/v1/users/'.$userID.'/media/recent/?access_token='.$access_token;
				$content = @file_get_contents($url);
				if( $content ) {
					$json = json_decode($content, true);
					if( is_array($json['data']) ){
						$i = 0; 
						foreach ($json['data'] as $vm): 
							if($count == $i){ break;}
							$i++;
							$img = $vm['images']['low_resolution']['url'];
							$link = $vm["link"];
							$html .= '<li class="col-xs-4"><a target="_blank" href="'. $link .'">';
								$html .= '<img class="img-responsive" alt="" src="'. $img .'" />';
							$html .= '</a></li>';
						endforeach;
					}
				}
				
				
			$html .= '</ul>';
		$html .= '</div>';
		
		
		echo force_balance_tags($html);
	}
 
	function update($new_instance, $old_instance) {
		return $new_instance;		
	}
 
	function form($instance) {
		?><br/>
		<label>Title:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo isset($instance['title']) ? esc_attr($instance['title']) : ''; ?>" style="width:100%" /></label>
		<br /><br />
		<label>User ID:<input type="text" id="<?php echo esc_attr($this->get_field_id( 'user_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'user_id' )); ?>" value="<?php echo isset($instance['user_id']) ? esc_attr($instance['user_id']) : ''; ?>" style="width:100%" /></label>
		<br /><br />
		<label>Access token:<input type="text" id="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token' )); ?>" value="<?php echo isset($instance['access_token']) ? esc_attr($instance['access_token']) : ''; ?>" style="width:100%" /></label>
		<i>Go to <a target="_blank" href="https://instagram.com/oauth/authorize/?client_id=467ede5a6b9b48ae8e03f4e2582aeeb3&redirect_uri=http://instafeedjs.com&response_type=token"><u>website</u></a> and login instagram account to get userID and Access Token</i>
		<br /><br />
		<label>Number Photo:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" value="<?php echo isset($instance['count']) ? esc_attr($instance['count']) : ''; ?>" style="width:100%" /></label>
		
		<?php	
	}

}

add_action( 'widgets_init', 'create_instagram_widget' );

function create_instagram_widget(){
	return register_widget("rst_instagram_widget");
}