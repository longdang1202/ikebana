<?php
class rst_gallery_widget extends WP_Widget {
	
	function rst_gallery_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_gallery', 'description' => 'A widget that show gallery' );

		/* Create the widget. */
		$this->WP_Widget( 'rst-gallery-widget', 'Laza - Gallery', $widget_ops);	
	}
	 
	function widget($args, $instance) {
		$html = '';
		$html .= $args['before_widget'];
		if( !empty($instance['title']) ) {
			$html .= $args['before_title'];
				$html .= $instance['title'];
			$html .= $args['after_title'];
		}
		if( $instance['gallery'] ){
			$html .= '<ul class="rst-widget-gallery row">';
			$rstkey =  uniqid();
			foreach( $instance['gallery'] as $gallery ) {
				$html .= '<li class="col-xs-4 rst-photo">';
					$html .= '<a class="fancybox-gallery" title="sdadsdsa" rel="gallery_'. $rstkey .'" href="'. rst_get_attachment_image_src($gallery,'full') .'">';
						$html .= '<img alt="" src="'. rst_get_attachment_image_src($gallery,'small') .'">';
					$html .= '</a>';
				$html .= '</li>';
			}
			$html .= '</ul>';
		}
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
		<label>Gallery:</label>
		<?php
			rs::gallery(
				array(
					'name' => $this->get_field_name( 'gallery' ),
					'value' => isset($instance['gallery']) ? $instance['gallery'] : ''
				)
			);
		rs::ajaxTrigger();
	}
	
}

add_action( 'widgets_init', 'create_gallery_widget' );

function create_gallery_widget(){
	return register_widget("rst_gallery_widget");
}