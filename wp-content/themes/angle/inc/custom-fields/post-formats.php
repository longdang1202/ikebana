<?php
global $RS;

// Video Setting
$RS->metabox(array(
	'name' => 'rst_video_setting',
	'title' => 'Video Setting',
	'rules' => array(
		'post_format' => 'video',
	),
	'controls' => array(
		array(
			'name' => 'rst_video_type',
			'label'=> 'Video Type',
			'type' => 'select',
			'items' => array('youtube' => 'Youtube', 'vimeo' => 'Vimeo' )
		),
		array(
			'name' => 'rst_video_embed',
			'label'=> 'Embed Code',
			'description' => 'Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br>This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br><strong>Of course you can also insert your Audio Embedd Code!</strong><br><br><strong>Notice:</strong> The Preview Image will be the Image set as Featured Image..',
			'type' => 'textarea'
		)
	)
));

// Gallery Setting
$RS->metabox(array(
	'name' => 'rst_gallery_setting',
	'title' => 'Gallery Setting',
	'rules' => array(
		'post_format' => 'gallery',
	),
	'controls' => array(
		array(
			'name' => 'rst_gallery',
			'type' => 'gallery',
			'label'=> 'Blog Post Images ',
			'description' => 'Upload up to 20 images for a slideshow - or only one to display a single image. <br><br><strong>Notice:</strong> The Preview Image will be the Image set as Featured Image.'
		)
	)
));

// Audio Setting
$RS->metabox(array(
	'name' => 'rst_audio_setting',
	'title' => 'Audio Setting',
	'rules' => array(
		'post_format' => 'audio',
	),
	'controls' => array(
		array(
			'name' => 'rst_audio_iframe',
			'type' => 'textarea',
			'label'=> 'Audio iframe',
			'description' => 'Enter your Audio iframe.'
		)
	)
));

// Link Setting
$RS->metabox(array(
	'name' => 'rst_link_setting',
	'title' => 'Link Setting',
	'rules' => array(
		'post_format' => 'link',
	),
	'controls' => array(
		array(
			'name' => 'rst_link_title',
			'type' => 'text',
			'label'=> 'Link Title',
			'description' => 'Enter your title link here.'
		),
		array(
			'name' => 'rst_link_url',
			'type' => 'text',
			'label'=> 'Link Url',
			'description' => 'Enter your URL here.'
		)
	)
));

// Quote Setting
$RS->metabox(array(
	'name' => 'rst_quote_setting',
	'title' => 'Quote Setting',
	'rules' => array(
		'post_format' => 'quote',
	),
	'controls' => array(
		array(
			'name' => 'rst_quote',
			'type' => 'textarea',
			'label'=> 'Quote',
			'description' => 'Enter Quote here.'
		),
		array(
			'name' => 'rst_quotesource',
			'type' => 'text',
			'label'=> 'Quote Author/Source Link',
			'description' => 'Enter the Quote Source or Quote Author.'
		)
	)
));