<?php
class rst_social_widget extends WP_Widget {
	
	function rst_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_social', 'description' => 'A widget that show social network' );

		/* Create the widget. */
		$this->WP_Widget( 'rst-social-widget', 'Laza - Social Network', $widget_ops);	
	}
	 
	function widget($args, $instance) {
		$html = '';
		$protocol = is_ssl() ? 'https' : 'http';
		$html .= $args['before_widget'];
		if( !empty($instance['title']) ) {
			$html .= $args['before_title'];
				$html .= $instance['title'];
			$html .= $args['after_title'];
		}
		if( !empty($instance['description']) )
			$html .= apply_filters('the_content', $instance['description']);
		$html .= '<ul class="row">';
			if( isset($instance['twitter']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['twitter']) .'" class="rst-icon-twitter"><i class="fa fa-twitter"></i>Twitter</a></li>';
			}
			if( isset($instance['facebook']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['facebook']) .'" class="rst-icon-facebook"><i class="fa fa-facebook"></i>Facebook</a></li>';
			}
			if( isset($instance['google']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['google']) .'" class="rst-icon-google-plus"><i class="fa fa-google-plus"></i>Google Plus</a></li>';
			}
			if( isset($instance['instagram']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['instagram']) .'" class="rst-icon-instagram"><i class="fa fa-instagram"></i>Instagram</a></li>';
			}
			if( isset($instance['youtube']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['youtube']) .'" class="rst-icon-youtube"><i class="fa fa-youtube-play"></i>Youtube</a></li>';
			}
			if( isset($instance['soundcloud']) ) {
				$html .= '<li class="col-sm-4 col-mb-4 col-ip-6">
				<a target="_blank" href="'. esc_url($instance['soundcloud']) .'" class="rst-icon-soundcloud"><i class="fa fa-soundcloud"></i>Sound clound</a></li>';
			}
			
		$html .= '</ul>';
		$html .= $args['after_widget'];
		echo force_balance_tags($html);
	}
 
	function update($new_instance, $old_instance) {
		return $new_instance;		
	}
 
	function form($instance) {
		?><br/>
		<label>Widget Title:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo isset($instance['title']) ? esc_attr($instance['title']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Twitter:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" value="<?php echo isset($instance['twitter']) ? esc_attr($instance['twitter']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Facebook:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" value="<?php echo isset($instance['facebook']) ? esc_attr($instance['facebook']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Google+:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'google' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google' )); ?>" value="<?php echo isset($instance['google']) ? esc_attr($instance['google']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Instagram:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" value="<?php echo isset($instance['instagram']) ? esc_attr($instance['instagram']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Youtube:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" value="<?php echo isset($instance['youtube']) ? esc_attr($instance['youtube']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<label>Soundcloud:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud' )); ?>" value="<?php echo isset($instance['soundcloud']) ? esc_attr($instance['soundcloud']) : ''; ?>" style="width:100%"/></label>
		<br/><br/>
		<?php	
	}
	
}

add_action( 'widgets_init', 'create_social_widget' );

function create_social_widget(){
	return register_widget("rst_social_widget");
}