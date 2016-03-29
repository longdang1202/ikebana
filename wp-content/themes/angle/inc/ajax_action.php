<?php
add_action('wp_ajax_rst_ajax_block', 'rst_ajax_block_action');
add_action('wp_ajax_nopriv_rst_ajax_block', 'rst_ajax_block_action');

function rst_ajax_block_action() {
	global $wp_query;
	$atts = $_POST['atts'];
	$paged = $_POST['paged'];
	$atts = str_replace('\"', '"', $atts);
	$rst_agrs = json_decode($atts,true);
	
	global $rst_blog;
	$rst_blog = $rst_agrs;
	$args = array(
		'posts_per_page' 	=> $rst_agrs['column'],
		'offset'			=> 10 + $rst_agrs['column']*($paged-2)
	);
	$args = array_merge( $wp_query->query_vars, $args );
	$the_query = new WP_Query( $args );
	
	if ( $the_query->have_posts() ) :
		while ($the_query->have_posts() ) : $the_query->the_post();
			echo rst_get_template_part('content');
		endwhile;
	endif;
	
	exit;
}

