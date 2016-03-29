<?php

function rst_customizer_css() {
    ?>
    <style type="text/css" id="customize-css">
	<?php
		foreach( rs::$customize as $tab ) {
			if( $tab['controls'] ) {
				foreach( $tab['controls'] as $key=>$control ) {
					if( isset($control['css'])) {
						echo str_replace( '$value', get_theme_mod( $control['name'] ), $control['css'] );
					}
				}
			}
		}
	?>
    </style>
    <?php
}
add_action( 'wp_head', 'rst_customizer_css' );