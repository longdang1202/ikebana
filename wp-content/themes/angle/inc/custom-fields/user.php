<?php
global $RS;

// User Setting
$RS->metabox(array(
	'name' => 'rst_user_setting',
	'title' => 'User Meta',
	'rules' => array(
		'user_role' => 'all',
	),
	'controls' => array(
		array(
			'name' => 'rst_user_job',
			'label'=> 'Job',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_facebook',
			'label'=> 'Facebook',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_twitter',
			'label'=> 'Twitter',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_google',
			'label'=> 'Google Plus',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_pinterest',
			'label'=> 'Pinterest',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_linkedin',
			'label'=> 'Linkedin',
			'type' => 'text'
		),
		array(
			'name' => 'rst_user_tumblr',
			'label'=> 'Tumblr',
			'type' => 'text'
		)
	)
));