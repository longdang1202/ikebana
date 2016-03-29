<?php

//Making Custom Control
require RS_LIB_PATH . '/customize/controls/radio-image/radio-image.php';

//Render Tab
foreach( rs::$customize as $tab ) {
	
	$wp_customize->add_section( $tab['name'] , array(
		'title'      => $tab['title'],
		'description'=> isset($tab['description']) ? $tab['description'] : '',
		'priority'   => $tab['priority']
	) );
	
	if( $tab['controls'] ) {
		foreach( $tab['controls'] as $key=>$control ) {
			
			$wp_customize->add_setting( $control['name'] , array(
				'default' => isset($control['default_value']) ? $control['default_value'] : '',
				'sanitize_callback' => 'rst_sanitizeLayout'
			) );
			
			$args_type = array();
			
			$args_type['text'] = 'WP_Customize_Control';
			$args_type['checkbox'] = 'WP_Customize_Control';
			$args_type['radio'] = 'WP_Customize_Control';
			$args_type['select'] = 'WP_Customize_Control';
			$args_type['dropdown-pages'] = 'WP_Customize_Control';
			$args_type['textarea'] = 'WP_Customize_Control';
			$args_type['color'] = 'WP_Customize_Color_Control';
			$args_type['upload'] = 'WP_Customize_Upload_Control';
			$args_type['image'] = 'WP_Customize_Image_Control';
			$args_type['radio-image'] = 'WP_Customize_Radio_Image_Control';
			
			$label = array(
				'label'        	=> isset($control['label']) ? $control['label'] : '',
				'section'    	=> $tab['name'],
				'settings'   	=> $control['name'],
				'description'   => isset($control['description']) ? $control['description'] : '',
				'priority'	 	=> $key,
			);
			if(
				$control['type'] == 'text' || 
				$control['type'] == 'checkbox' || 
				$control['type'] == 'radio' || 
				$control['type'] == 'select' ||
				$control['type'] == 'dropdown-pages' ||
				$control['type'] == 'textarea'
			) {
				$label['type'] = $control['type'];
			}
			
			if( isset( $control['items'] ) ) {
				$label['choices'] = $control['items'];
			}
			
			$wp_customize->add_control(
				new $args_type[$control['type']](
					$wp_customize, 'settings-'.$control['name'], $label
				)
			);
			
		}
	}
}

function rst_sanitizeLayout($value) {
	return $value;
}
?>