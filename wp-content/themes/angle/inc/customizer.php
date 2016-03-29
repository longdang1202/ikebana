<?php
/**
 * rst Theme Customizer
 *
 * @package rst
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rst_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'background_color' )->default = '#f8f8f8';
	
	$wp_customize->add_section( 'rst_section_header' , array(
		'title'      => 'Header',
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'header_color' , array(
		'default' => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Header Color', 'mytheme' ),
		'section'    => 'rst_section_header',
		'settings'   => 'header_color',
	) ) );
	
}
add_action( 'customize_register', 'rst_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rst_customize_preview_js() {
	wp_enqueue_script( 'rst_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rst_customize_preview_js' );
