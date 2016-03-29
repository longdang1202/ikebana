<?php
/**
 * rst functions and definitions
 *
 * @package rst
 */


if ( ! function_exists( 'rst_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rst_setup() {
	
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}
	
	/**
	 * rsLib.
	 */
	include(get_template_directory().'/rslib/rslib.php');
	
	include(get_template_directory().'/inc/custom-featured-image.php');
	include(get_template_directory().'/inc/ajax_action.php');
	
	// BFI
	get_template_part('extras/BFI_Thumb');
	
	/**
	 * Widget.
	 */
	include(get_template_directory().'/inc/widgets/widget-about.php');
	include(get_template_directory().'/inc/widgets/widget-social-network.php');
	include(get_template_directory().'/inc/widgets/widget-recent-post.php');
	include(get_template_directory().'/inc/widgets/widget-gallery.php');
	include(get_template_directory().'/inc/widgets/widget-instagram.php');
	
	/**
	 * Plugins.
	 */
	require get_template_directory() . '/inc/plugins/setup-plugins.php';
	
	function rst_init() {
		
		/**
		 * Custom Field.
		 */
		include(get_template_directory().'/inc/custom-fields/page-template.php');
		include(get_template_directory().'/inc/custom-fields/post-formats.php');
		include(get_template_directory().'/inc/custom-fields/user.php');
		
		/**
		 * Customizer.
		 */
		include(get_template_directory().'/inc/add-customizer.php');
		
	}
	add_action('init','rst_init', 6);
	
	/**
	 * Add Size.
	 */
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'small', '82', '82', true );
	}
	
	/**
	 * Image Size.
	 */
	if ( function_exists( 'add_image_size' ) ) { 
		update_option('large_size_w', 1170);
		update_option('large_size_h', 585);
		update_option('thumbnail_size_w', 231);
		update_option('thumbnail_size_h', 164);
		update_option('medium_size_w', 668);
		update_option('medium_size_h', 216);
	}

	
	//** Add image sizes to Media Selection */
	add_filter('image_size_names_choose', 'rst_display_image_size_names_muploader', 11, 1);
	function rst_display_image_size_names_muploader( $sizes ) {
		$new_sizes = array();
		$added_sizes = get_intermediate_image_sizes();
		// $added_sizes is an indexed array, therefore need to convert it
		// to associative array, using $value for $key and $value
		foreach( $added_sizes as $key => $value) {
		$new_sizes[$value] = $value;
		}
		// This preserves the labels in $sizes, and merges the two arrays
		$new_sizes = array_merge( $new_sizes, $sizes );
		return $new_sizes;

	}

	
	/**
	 * Custom Comment.
	 */
	include(get_template_directory().'/inc/comments.php');
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rst' ),
	) );
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rst, use a find and replace
	 * to change 'rst' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rst', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'audio', 'gallery'
	) );

	
	/**
	 * Register widget area.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	function rst_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'rst' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}
	add_action( 'widgets_init', 'rst_widgets_init' );

	/**
	 * Enqueue scripts and styles.
	 */
	function rst_scripts() {
		
		
		wp_enqueue_style( 'css-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style( 'css-bootstrap-jasny', get_template_directory_uri() . '/css/jasny-bootstrap.min.css' );
		wp_enqueue_style( 'css-font-awesome', get_template_directory_uri() . '/font-awesome-4.2.0/css/font-awesome.css' );
		wp_enqueue_style( 'css-effect', get_template_directory_uri() . '/css/effect2.css' );
		wp_enqueue_style( 'css-animate', get_template_directory_uri() . '/css/animate.css' );
		wp_enqueue_style( 'css-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css' );
		wp_enqueue_style( 'css-bxslider', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.css' );
		wp_enqueue_style( 'css-rs', get_template_directory_uri() . '/css/rs-wp-v1.2.css' );
		wp_enqueue_style( 'css-main', get_template_directory_uri() . '/css/main.css' );
		wp_enqueue_style( 'css-responsive', get_template_directory_uri() . '/css/responsive.css' );
		
		wp_enqueue_style( 'rst-style', get_stylesheet_uri() );

		wp_enqueue_script( 'jquery' );
		
		wp_enqueue_script( 'js-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '', true );
		wp_enqueue_script( 'js-isotope', get_template_directory_uri() . '/js/isotope.js', 'jquery', '', true );
		wp_enqueue_script( 'js-wow', get_template_directory_uri() . '/js/wow.min.js', 'jquery', '', true );
		wp_enqueue_script( 'js-sticky', get_template_directory_uri() . '/js/jquery.sticky-kit.js', 'jquery', '', true );
		wp_enqueue_script( 'js-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.js', 'jquery', '', true );
		wp_enqueue_script( 'js-fancybox-media', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js', 'jquery', '', true );
		wp_enqueue_script( 'js-bxslider', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.min.js', 'jquery', '', true );
		wp_enqueue_script( 'js-easing', get_template_directory_uri() . '/js/bxslider/jquery.easing.1.3.js', 'jquery', '', true );
		wp_enqueue_script( 'js-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '', true );
		
		if( get_theme_mod('hide_loading') != true ) {
			wp_enqueue_script( 'js-loading-modernizr', get_template_directory_uri() . '/js/loading/modernizr.custom.js', 'jquery', '', true );
			wp_enqueue_script( 'js-loading-classie', get_template_directory_uri() . '/js/loading/classie.js', 'jquery', '', true );
			wp_enqueue_script( 'js-loading-pathLoader', get_template_directory_uri() . '/js/loading/pathLoader.js', 'jquery', '', true );
			wp_enqueue_script( 'js-loading-main', get_template_directory_uri() . '/js/loading/main.js', 'jquery', '', true );
		}
		
		if( is_page_template('template-contact.php') ) {
			wp_enqueue_script( 'js-google-map', get_template_directory_uri() . '/js/maps.googleapis.js', 'jquery', '', true ); 
		}
		
		wp_enqueue_script( 'js-main', get_template_directory_uri() . '/js/main.js', 'jquery', '', true );
		
		wp_enqueue_script( 'rst-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

		wp_enqueue_script( 'rst-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'rst_scripts' );

	function rst_fonts() {
		wp_register_style('googleFonts-Quicksand', 'http://fonts.googleapis.com/css?family=Quicksand:400,700');
		wp_enqueue_style( 'googleFonts-Quicksand');
	}
    
    add_action('wp_print_styles', 'rst_fonts');
	
	function rst_backend_enqueue() {
		wp_enqueue_style( 'my_custom_script', esc_url( get_template_directory_uri() ) .'/inc/css/style-backend.css' );
	}
	add_action( 'admin_enqueue_scripts', 'rst_backend_enqueue', 10000 );
	
	function rst_jquery_block() {
		?>
		<script type='text/javascript'>
			function rst_blocks() {
				this.atts = '';
				this.url = '';
			}
		</script>
		<?php
	}
	add_action('wp_head', 'rst_jquery_block', 10);
	
	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() . '/inc/template-tags.php';

	/**
	 * Custom functions that act independently of the theme templates.
	 */
	require get_template_directory() . '/inc/extras.php';


	/**
	 * Load Jetpack compatibility file.
	 */
	require get_template_directory() . '/inc/jetpack.php';

	/* Translate */
	function rst_the_translate($text,$options_text) {
		$options_text = get_theme_mod($options_text);
		if($options_text) $text = $options_text;
		echo sanitize_text_field($text);
	}
	
	function rst_get_translate($text,$options_text) {
		$options_text = get_theme_mod($options_text);
		if($options_text) $text = $options_text;
		return sanitize_text_field($text);
	}
	
	function rst_get_my_widgets() {
		$sidebar_options = array(
			'0' => 'Select Sidebar'
		);
		foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
			$sidebar_options[$sidebar['id']] = $sidebar['name'];
		}
		return $sidebar_options;
	}

	add_action('init','rst_get_my_widgets');
	
	
	function rst_get_attachment_image_src( $attributes_id, $size ){
		$attributes = wp_get_attachment_image_src( $attributes_id, $size );
		return $attributes[0];
	}
	
	function get_excerpt_by_id($post, $length = 10, $tags = '<a><em><strong>', $extra = '...') {
		if(is_int($post)) {
			$post = get_post($post);
		} elseif(!is_object($post)) {
			return false;
		}
		setup_postdata($post);

		$the_excerpt = apply_filters( 'get_the_excerpt', $post->post_excerpt );
		
		$the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
		
		$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
		$excerpt_waste = array_pop($the_excerpt);
		$the_excerpt = implode($the_excerpt);
		if( $the_excerpt != '' )
		$the_excerpt .= $extra;
		wp_reset_postdata();
		return apply_filters('the_content', $the_excerpt);
		
	}
	
	function rst_get_template_part( $slug, $name="" ) {
		ob_start();
		get_template_part( $slug, $name );
		return ob_get_clean();
	}
	
	function rst_get_the_archive_title($before="",$after="") {
		if ( is_category() ) {
			$title = rst_get_translate('Category','translation_category') .': '. single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = rst_get_translate('Browsing Tag','browsing_tag') .': '. single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = rst_get_translate('Author','translation_author') .': '. single_tag_title( '', false );
		} elseif ( is_year() ) {
			$title = rst_get_translate('Yearly Archives','yearly_archives').': '. get_the_date( 'Y');
		} elseif ( is_month() ) {
			$title = rst_get_translate('Monthly Archives','monthly_archives').': '. get_the_date( 'F Y');
		} elseif ( is_day() ) {
			$title = rst_get_translate('Daily Archives','daily_archives').': '. get_the_date( 'F j, Y');
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = 'Asides';
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = 'Galleries';
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = 'Images';
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = 'Videos';
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = 'Quotes';
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = 'Links';
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = 'Statuses';
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = 'Audio';
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = 'Chats';
			}
		} elseif ( is_post_type_archive() ) {
			$title = rst_get_translate('Archives','translation_archives') .': ' . post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = $tax->labels->singular_name. ': '. single_term_title( '', false );
		} else {
			$title = rst_get_translate('Archives','translation_archives');
		}
	 
		/**
		 * Filter the archive title.
		 *
		 * @since 4.1.0
		 *
		 * @param string $title Archive title to be displayed.
		 */
		return apply_filters( 'get_the_archive_title', $before.$title.$after );
	}
	
	add_filter( 'request', 'alter_the_query' );
	function alter_the_query( $request ) {
		if( isset($request['cat']) && !(is_admin()) ){
			$request['posts_per_page'] = 1;
		}
		return $request;
	}

	
}
endif; // rst_setup
add_action( 'after_setup_theme', 'rst_setup' );

