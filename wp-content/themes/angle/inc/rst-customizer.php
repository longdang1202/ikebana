<?php
function rst_customize_register_control( $wp_customize ) {
	
	$wp_customize->add_section( 'rst_section_logic' , array(
		'title'      => 'Visible Section Name',
		'priority'   => 90,
	) );
}
add_action( 'customize_register', 'rst_customize_register_control' );