<?php

// Attributes Gallery
$attributes_gallery = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Gallery Column', 'ri-quartz'),
        'param_name' => 'gallery_column',
        'value' => array(
            esc_html__('default', 'ri-quartz') => 'default',
            esc_html__('2 Columns', 'ri-quartz') => '2',
            esc_html__('3 Columns', 'ri-quartz') => '3',
            esc_html__('4 Columns', 'ri-quartz') => '4'
        ),
        'std' => 'default',
        'description' => esc_html__('Gallery Column', 'ri-quartz')
    ),
);

// VC add custom params
if(function_exists('vc_add_params')){
    vc_add_params('vc_gallery', $attributes_gallery);
}