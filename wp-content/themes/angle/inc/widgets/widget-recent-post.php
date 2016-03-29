<?php
class rst_recent_post_widget extends WP_Widget {
	
	function rst_recent_post_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_recent_post', 'description' => 'A widget that show recent posts' );

		/* Create the widget. */
		$this->WP_Widget( 'rst-recent-posts-widget', 'Laza - Recent Posts', $widget_ops);	
	}
	 
	function widget($args, $instance) {
		$html = '';
		$html .= $args['before_widget'];
		if( !empty($instance['title']) ) {
			$html .= $args['before_title'];
				$html .= $instance['title'];
			$html .= $args['after_title'];
		}
		$html .= '<ul>';
		
		if( absint($instance['number_posts']) > 0 ) {
			$lastposts = get_posts( array( 'posts_per_page' => absint($instance['number_posts']) ) );
			if( sizeof($lastposts) > 0 ) {
				foreach( $lastposts as $item ) {
				$html .= '<li itemscope="" itemtype="http://schema.org/Article">';
					if( get_post_thumbnail_id($item->ID) ) {
					$html .= '<div class="rst-thumbnail">';
						$html .= '<a href="'. get_the_permalink($item->ID) .'"><img src="'. rst_get_attachment_image_src(get_post_thumbnail_id($item->ID),'small') .'" alt=""></a>';
					$html .= '</div>';
					}
					$html .= '<div class="rst-post-info">';
						$html .= '<h4><a href="'. get_the_permalink($item->ID) .'">'. $item->post_title .'</a></h4>';
						$html .= '<time class="rst-post-date" datetime="'. mysql2date('Y-m-d', $item->post_date) .'" itemprop="dateCreated">'. mysql2date('dS F Y', $item->post_date) .'</time><meta itemprop="interactionCount" content="UserComments:0">';
					$html .= '</div>';
				$html .= '</li>';
				}
			}
				
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
		<label>Title:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo isset($instance['title']) ? esc_attr($instance['title']) : ''; ?>" style="width:100%" /></label>
		<br /><br />
		<label>Number of posts to show:
		<input type="text" id="<?php echo esc_attr($this->get_field_id( 'number_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_posts' )); ?>" value="<?php echo isset($instance['number_posts']) ? esc_attr($instance['number_posts']) : '3'; ?>" size="3" /></label>
		
		<?php	
	}
	
}

add_action( 'widgets_init', 'create_recent_posts_widget' );

function create_recent_posts_widget(){
	return register_widget("rst_recent_post_widget");
}