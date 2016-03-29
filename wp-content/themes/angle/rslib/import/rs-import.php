<?php
if( !function_exists( 'tf_load_custom_code_style' ) ){
	function rs_import_callback() 
	{
		global $wpdb; 
		$theme = $_REQUEST['theme'];
		if( isset( $theme ) ) $theme = 'default';
		
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

		// Load Importer API
		require_once ABSPATH . 'wp-admin/includes/import.php';
		
		require get_template_directory() . "/rslib/import/import-widget.php";

		if ( ! class_exists( 'WP_Importer' ) ) {
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			if ( file_exists( $class_wp_importer ) )
			{
				require $class_wp_importer;
			}
			
		}

		if ( ! class_exists( 'WP_Import' ) ) {
			$class_wp_importer = get_template_directory() ."/rslib/import/wordpress-importer.php";
			if ( file_exists( $class_wp_importer ) )
				require $class_wp_importer;
			
		}


		if ( class_exists( 'WP_Import' ) ) 
		{ 
			$import_filepath = get_template_directory() ."/rslib/import/data/news-$theme.xml" ; // Get the xml file from directory 
			
			require get_template_directory() . "/rslib/import/data/rs-import-options-$theme.php";
			
			
			$wp_import = new rs_import();
			$wp_import->fetch_attachments = true;
			$wp_import->import($import_filepath);

			$wp_import->import_themeoption();
			
			$file_widget = get_template_directory() ."/rslib/import/data/news-$theme-widgets.wie" ;
			wie_process_import_file( $file_widget );
			
		}
		die(); // this is required to return a proper result
	}}
function admin_import_scripts() {
    wp_register_script( 'rs-import', get_template_directory_uri() . '/rslib/import/import.js', false, '1.0.0' );
    wp_enqueue_script( 'rs-import' );
}
function rs_export_callback() 
{
	include_once('SimpleXMLReader.php');
	$export = SimpleXMLElement('<rs-options/>'); 
	$groups = array();
	$controls = array();
	
	foreach(rs::$options as $tab){
		if($tab['controls']){
			$groups[$tab['name']] = $tab['controls'];
		}
		foreach($tab['subtabs'] as $subtab){
			if($subtab['controls']){
				$groups[$subtab['name']] = $subtab['controls'];
			}
		}
	}
	
	foreach($groups as $group){
		foreach($group as $control){
			$options = $track = $xml->addChild('options');
			$track->addChild('name', $control['name']);
			$track->addChild('value', rs::getOption($control['name']));
			
		}
	}
	Header('Content-type: text/xml');
	print($xml->asXML());
}
add_action( 'admin_enqueue_scripts', 'admin_import_scripts' );
add_action( 'wp_ajax_rs_import', 'rs_import_callback' );
add_action( 'wp_ajax_rs_export', 'rs_export_callback' );
