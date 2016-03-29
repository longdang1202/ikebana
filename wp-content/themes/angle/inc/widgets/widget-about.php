<?php
class rst_about_widget extends WP_Widget {
	
	function rst_about_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_about', 'description' => 'A widget that show about' );

		/* Create the widget. */
		$this->WP_Widget( 'rst-about-widget', 'Laza - About', $widget_ops);	
	}
	 
	function widget($args, $instance) {
		$html = '';
		$html .= $args['before_widget'];
		if( !empty($instance['title']) ) {
			$html .= $args['before_title'];
				$html .= $instance['title'];
			$html .= $args['after_title'];
		}
		if( $instance['avatar'] ){
			$html .= '<div class="rst-avatar-about"><img src="'. rst_get_attachment_image_src($instance['avatar'],'full') .'" width="95" height="95" alt="" /></div>';
		}
		$html .= $instance['description'];
		$html .= $args['after_widget'];
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
		<label>Avatar (95x95):</label>
		<?php
			rs::upload(
				array(
					'name' => $this->get_field_name( 'avatar' ), 
					'type' => 'image',
					'value' => isset($instance['avatar']) ? esc_attr($instance['avatar']) : ''
				)
			);
		?>
		<br /><br />
		<label>Description:
		<textarea id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" cols="30" rows="6" style="width:100%"><?php echo isset($instance['description']) ? esc_attr($instance['description']) : ''; ?></textarea></label>
		
		<?php	
	}
	
}

add_action( 'widgets_init', 'create_about_widget' );

function create_about_widget(){
	return register_widget("rst_about_widget");
}