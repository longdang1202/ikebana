<?php
global $RS;

// Page Setting
$RS->metabox(array(
	'name' => 'page_setting',
	'title' => 'Page Setting',
	'rules' => array(
		'post_type' => 'page',
		'page_template:not' => 'template-home.php'
	),
	'controls' => array(
		array(
			'name' => 'rst_show_title',
			'label'=> 'Show Title',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'name' => 'rst_sub_title',
			'label'=> 'Sub Title',
			'type' => 'text'
		),
		array(
			'name' => 'rst_is_show_thumbnail',
			'label'=> 'Show Thumbnail',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'name' => 'rst_is_show_share',
			'label'=> 'Show Share',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		), 
		array(
			'name' => 'rst_is_show_author',
			'label'=> 'Show Author Box',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'label' => 'Page Column Style',
			'type' => 'radio',
			'name' => 'rst_template_style',
			'description'	=> 'Choose your page column style to show on your page.',
			'items' => array(
				'0'	=> 'Default',
				'1' => 'Full Width',
				'2' => 'Sidebar Left',
				'3' => 'Sidebar Right'
			),
			'default_value' => '0'
		)
	)
));

// Post Setting
$RS->metabox(array(
	'name' => 'post_setting',
	'title' => 'Post Setting',
	'rules' => array(
		'post_type' => 'post',
	),
	'controls' => array(
		array(
			'name' => 'rst_show_title',
			'label'=> 'Show Title',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'name' => 'rst_sub_title',
			'label'=> 'Sub Title',
			'type' => 'text'
		),
		array(
			'name' => 'rst_is_show_thumbnail',
			'label'=> 'Show Thumbnail',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'name' => 'rst_show_infor',
			'label'=> 'Show Information',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'name' => 'rst_show_recent_post',
			'label'=> 'Show Recent Post',
			'type' => 'switch',
			'style' => 'default',
			'default_value' => true
		),
		array(
			'label' => 'Post Column Style',
			'type' => 'radio',
			'name' => 'rst_template_style',
			'description'	=> 'Choose your page column style to show on your page.',
			'items' => array( 
				'0'	=> 'Default',
				'1' => 'Full Width', 
				'2' => 'Sidebar Left', 
				'3' => 'Sidebar Right'
			),
			'default_value' => '0'
		)
	)
));

//Get All Shortcode CTF7
$aray_ctf7 = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
$ctf7 = array(''=>'Select Contact Form');
if( $cf7Forms = get_posts( $aray_ctf7 ) ){
	foreach($cf7Forms as $cf7Form){
		$ctf7[$cf7Form->ID] = '[contact-form-7 id="'.$cf7Form->ID.'" title="'.($cf7Form->post_title).'"]';
	}
}


// Post Contact
$RS->metabox(array(
	'name' => 'page_contact_setting',
	'title' => 'Page Contact',
	'rules' => array(
		'page_template' => 'template-contact.php',
	),
	'controls' => array(
		array(
			'name' => 'rst_title_form',
			'label'=> 'Title Form',
			'type' => 'text'
		),
		array(
			'name' => 'rst_shortcode_form',
			'label'=> 'Shortcode Contact Form 7',
			'type' => 'select',
			'items'	=> $ctf7
		),
		array(
			'name' => 'rst_address',
			'label'=> 'Address',
			'type' => 'text',
			'description' => 'Go to http://www.latlong.net and put the name of a place, city, state, or address, or click the location on the map to get lat long coordinates<br>eg:<b>10.731688,122.5505356</b>'
		),
		array(
			'name' => 'rst_map_zoom',
			'label'=> 'Zoom Map',
			'type' => 'text',
			'description' => ''
		),
		array(
			'name' => 'rst_map_height',
			'label'=> 'Height Map (px)',
			'type' => 'text',
			'description' => ''
		)
	)
));

// Post Home
$RS->metabox(array(
	'name' => 'header_home_setting',
	'title' => 'Header Option',
	'rules' => array(
		'page_template' => 'template-home.php',
	),
	'controls' => array(
		array(
			'name' => 'rst_header_home',
			'label'=> 'Template',
			'type' => 'radio',
			'items'	=> array(
				'1' => 'Default',
				'2' => 'Slider'
			),
			'default_value' => '1'
		),
		array(
			'name' => 'rst_header_home_content',
			'label'=> 'Slider Show',
			'min_rows'	=> 0,
			'type' => 'repeater',
			'layout' => 'row',
			'controls' => array(
				array(
					'name' => 'image',
					'label' => 'Image',
					'type'  => 'image',
				),
				array(
					'name' => 'title',
					'label' => 'Title',
					'type'  => 'text',
				),
				array(
					'name' => 'content',
					'label' => 'Content',
					'type'  => 'textarea',
				)
			),
			'conditional_logic' => array( 'rst_header_home' => '2' )
		)
	)
));

$RS->metabox(array(
	'name' => 'page_home_setting',
	'title' => 'Featured Posts',
	'rules' => array(
		'page_template' => 'template-home.php',
	),
	'controls' => array(
		array(
			'name' => 'rst_home_slider',
			'label'=> 'Template',
			'type' => 'radio',
			'items'	=> array(
				'1' => 'Template 1',
				'2' => 'Template 2'
			),
			'default_value' => '1'
		),
		array(
			'name' => 'rst_home_slider_post',
			'label'=> 'Select Posts',
			'min_rows'	=> 0,
			'type' => 'repeater',
			'controls' => array(
				array(
					'name' => 'post',
					'label' => 'Post',
					'type'  => 'postlist',
				)
			)
		)
	)
));