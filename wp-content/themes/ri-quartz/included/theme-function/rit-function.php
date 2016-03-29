<?php
/**
 * Created by PhpStorm.
 * User: chinhbeo
 * Date: 5/14/15
 * Time: 9:29 AM
 */

/* VARIABLE DEFINITIONS ================================================== */
if (!defined('RIT_TEMPLATE_PATH')) {
    define('RIT_TEMPLATE_PATH', get_template_directory());
}
if (!defined('RIT_INCLUDES_PATH')) {
    define('RIT_INCLUDES_PATH', RIT_TEMPLATE_PATH . '/included');
}
if (!defined('RIT_LOCAL_PATH')) {
    define('RIT_LOCAL_PATH', get_template_directory_uri());
}

/**
 * Include the TGM_Plugin_Activation class.
 */

require get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ri_quartz_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if (!function_exists('ri_quartz_register_required_plugins')) {
    function ri_quartz_register_required_plugins()
    {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // This is an example of how to include a plugin pre-packaged with a theme.
            array(
                'name' => 'RIT Core', // The plugin name.
                'slug' => 'rit-core', // The plugin slug (typically the folder name).
                'source' => get_stylesheet_directory() . '/lib/plugin/rit-core.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '2.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Revolution Slider', // The plugin name.
                'slug' => 'revolution-slider', // The plugin slug (typically the folder name).
                'source' => get_stylesheet_directory() . '/lib/plugin/revslider.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Visual Composer', // The plugin name.
                'slug' => 'visual-composer', // The plugin slug (typically the folder name).
                'source' => get_stylesheet_directory() . '/lib/plugin/js_composer.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Mega Menu', // The plugin name.
                'slug' => 'megamenu', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Breadcrumb NavXT', // The plugin name.
                'slug' => 'breadcrumb-navxt', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Contact Form 7', // The plugin name.
                'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Meta Box', // The plugin name.
                'slug' => 'meta-box', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'Woocommerce', // The plugin name.
                'slug' => 'woocommerce', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'YITH WooCommerce Ajax Product Filter', // The plugin name.
                'slug' => 'yith-woocommerce-ajax-navigation', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'YITH WooCommerce Compare', // The plugin name.
                'slug' => 'yith-woocommerce-compare', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'YITH WooCommerce Quick View', // The plugin name.
                'slug' => 'yith-woocommerce-quick-view', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'YITH WooCommerce Wishlist', // The plugin name.
                'slug' => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name' => 'YITH WooCommerce Zoom Magnifier', // The plugin name.
                'slug' => 'yith-woocommerce-zoom-magnifier', // The plugin slug (typically the folder name).
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         *
         * Some of the strings are wrapped in a sprintf(), so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to pre-packaged plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug' => 'themes.php',            // Parent menu slug.
            'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message' => '',                      // Message to output right before the plugins table.
            'strings' => array(
                'page_title' => esc_html(__('Install Required Plugins', 'ri-quartz')),
                'menu_title' => esc_html(__('Install Plugins', 'ri-quartz')),
                'installing' => esc_html(__('Installing Plugin: %s', 'ri-quartz')), // %s = plugin name.
                'oops' => esc_html(__('Something went wrong with the plugin API.', 'ri-quartz')),
                'notice_can_install_required' => _n_noop(
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_can_install_recommended' => _n_noop(
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_cannot_install' => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update' => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update_maybe' => _n_noop(
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_cannot_update' => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_can_activate_required' => _n_noop(
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'notice_cannot_activate' => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                    'ri-quartz'
                ), // %1$s = plugin name(s).
                'install_link' => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'ri-quartz'
                ),
                'update_link' => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'ri-quartz'
                ),
                'activate_link' => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'ri-quartz'
                ),
                'return' => esc_html(__('Return to Required Plugins Installer', 'ri-quartz')),
                'plugin_activated' => esc_html(__('Plugin activated successfully.', 'ri-quartz')),
                'activated_successfully' => esc_html(__('The following plugin was activated successfully:', 'ri-quartz')),
                'plugin_already_active' => esc_html(__('No action taken. Plugin %1$s was already active.', 'ri-quartz')),  // %1$s = plugin name(s).
                'plugin_needs_higher_version' => esc_html(__('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'ri-quartz')),  // %1$s = plugin name(s).
                'complete' => esc_html(__('All plugins installed and activated successfully. %1$s', 'ri-quartz')), // %s = dashboard link.
                'contact_admin' => esc_html(__('Please contact the administrator of this site for help.', 'ri-quartz')),

                'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            )
        );

        tgmpa($plugins, $config);

    }
}
// Function For RIT Theme
require get_template_directory() . '/included/customize/customize-style.php';

// Author Link Social
if (!function_exists('ri_quartz_social_author')) {
    function ri_quartz_social_author($contactmethods)
    {

        $contactmethods['twitter'] = 'Twitter Username';
        $contactmethods['facebook'] = 'Facebook Username';
        $contactmethods['google'] = 'Google Plus Username';
        $contactmethods['tumblr'] = 'Tumblr Username';
        $contactmethods['instagram'] = 'Instagram Username';
        $contactmethods['pinterest'] = 'Pinterest Username';

        return $contactmethods;
    }

    add_filter('user_contactmethods', 'ri_quartz_social_author', 10, 1);
}

// Customize
require get_template_directory() . '/included/customize/customize.php';

// AQ Resize
require get_template_directory() . '/included/resize-image/aq_resizer.php';

// Custom Params VC
if(function_exists('vc_add_params')){
    require get_template_directory() . '/vc_templates/custom_param.php';
}

// Substring
if (!function_exists('ri_quartz_substring')) {
    function ri_quartz_substring($string, $number, $sub = '')
    {
        if (strlen($string) <= $number) {
            return $string;
        } else {
            $new_string = substr($string, 0, $number);
            return $new_string . $sub;
        }
    }
}

// Sub String Content
if (!function_exists('ri_quartz_content')) {
    function ri_quartz_content($limit)
    {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content) >= $limit) {
            array_pop($content);
            $content = implode(" ", $content) . '...';
        } else {
            $content = implode(" ", $content) . '';
        }
        $content = preg_replace('/\[.+\]/', '', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}

// Sub String excerpt
if (!function_exists('ri_quartz_excerpt')) {
    function ri_quartz_excerpt($limit)
    {
        $content = explode(' ', get_the_excerpt(), $limit);
        if (count($content) >= $limit) {
            array_pop($content);
            $content = implode(" ", $content) . '...';
        } else {
            $content = implode(" ", $content) . '';
        }
        $content = preg_replace('/\[.+\]/', '', $content);
        $content = apply_filters('the_excerpt', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}

// List Sidebar
if (!function_exists('ri_quartz_sidebar')) {
    function ri_quartz_sidebar()
    {
        global $wp_registered_sidebars;

        $sidebar_options = array();

        foreach ($wp_registered_sidebars as $sidebar) {
            $sidebar_options[$sidebar['id']] = $sidebar['name'];
        }

        return $sidebar_options;
    }
}

// Merge google font
if(!function_exists('ri_quartz_merge_google_font')){
    function ri_quartz_merge_google_font($font_array){
        $fonts = array();

        foreach($font_array as $font){

            if(!isset($fonts[ $font['family'] ])){

                $fonts[$font['family']] = $font;

            }else{
                $fonts[$font['family']]['variants'] = array_merge($fonts[$font['family']]['variants'], $font['variants']);
                $fonts[$font['family']]['subsets'] = array_merge($fonts[$font['family']]['subsets'], $font['subsets']);
            }
        }
        return $fonts;
    }
}

// Get link google font
if(!function_exists('ri_quartz_create_google_font_url')){
    function ri_quartz_create_google_font_url($font_array){

        if(count($font_array) > 0 ){

            $font_array = ri_quartz_merge_google_font($font_array);

            $base_url = '';
            $font_familys = array();
            $subsets = array();

            foreach ($font_array as $font) {
                if(isset($font['family'])){
                    $font_familys[] = str_replace(' ', '+', $font['family']) . ':' . implode(',', array_unique($font['variants']));
                    $subsets = array_merge($subsets, array_unique($font['subsets']));
                }
            }
            if(count($font_familys) > 0){
                $base_url .= implode('|', $font_familys);
            }
            if(count($subsets) > 0){
                $base_url .= '&subset=' . implode(',', $subsets);
            }
            if($base_url != ''){
                return '//fonts.googleapis.com/css?family=' . $base_url;
            }
        }
        return null;
    }
}

// Category
if (!function_exists('ri_quartz_get_category')) {
    function ri_quartz_get_category($separator)
    {
        $first_time = 1;
        foreach ((get_the_category()) as $category) {
            if ($first_time == 1) {
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . sprintf(esc_html(__("View all posts in %s", "ri-quartz")), $category->name) . '" ' . '>' . esc_html($category->name) . '</a>';
                $first_time = 0;
            } else {
                echo esc_html($separator) . '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . sprintf(esc_html(__("View all posts in %s", "ri-quartz")), $category->name) . '" ' . '>' . esc_html($category->name) . '</a>';
            }
        }
    }
}

// Random ID
if(!function_exists('ri_quartz_random_ID')){
    function ri_quartz_random_ID(){
        return uniqid();
    }
}

// Conver Color
if(!function_exists('ri_quartz_hex2rgba')){
    /* Convert hexdec color string to rgb(a) string */

    function ri_quartz_hex2rgba($hex) {

        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
}

// Detech Link Video
if(!function_exists('ri_quartz_detech_video')){
    function ri_quartz_detech_video($url) {
        if (strpos($url, 'youtube') > 0 || strpos($url, 'youtu') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        }
        return '';
    }
}

// Get Comment
if(!function_exists('ri_quartz_post_pass')){
    function ri_quartz_post_pass(){
        global $post;
        return $post->post_password;
    }
}

// Get Comment
if(!function_exists('ri_quartz_comment_status')){
    function ri_quartz_comment_status(){
        global $post;
        return $post->comment_status;
    }
}


// -------------------- Register Sidebar --------------------- //
if(!function_exists('ri_quartz_widgets_innit')){
    add_action( 'widgets_init', 'ri_quartz_widgets_innit' );
    function ri_quartz_widgets_innit(){
        register_sidebar(array(
            'name' => 'Sidebar Widget',
            'id' => 'sidebar-widget',
            'description' => esc_html__('Widget show on sidebar', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Header Top',
            'id' => 'header-top',
            'description' => esc_html__('Widget show on header top', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Header Primary',
            'id' => 'header-primary',
            'description' => esc_html__('Widget show on header primary', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Header Primary 2',
            'id' => 'header-primary-2',
            'description' => esc_html__('Widget show only header 4', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Header Primary 3',
            'id' => 'header-primary-3',
            'description' => esc_html__('Widget show only header 5', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Footer 1',
            'id' => 'footer-1',
            'description' => esc_html__('Widget show on footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget first %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Footer 2',
            'id' => 'footer-2',
            'description' => esc_html__('Widget show on footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Footer 3',
            'id' => 'footer-3',
            'description' => esc_html__('Widget show on footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Footer 4',
            'id' => 'footer-4',
            'description' => esc_html__('Widget show on footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer 1 (layout 2)',
            'id' => 'footer-1-2',
            'description' => esc_html__('Widget footer 1 (Only for footer layout 2)', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer 2 (layout 2)',
            'id' => 'footer-2-2',
            'description' => esc_html__('Widget footer 2 (Only for footer layout 2)', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer 3 (layout 2)',
            'id' => 'footer-3-2',
            'description' => esc_html__('Widget footer 3 (Only for footer layout 2)', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer 4 (layout 2)',
            'id' => 'footer-4-2',
            'description' => esc_html__('Widget footer 4 (Only for footer layout 4)', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer Bottom',
            'id' => 'footer-bottom',
            'description' => esc_html__('Widget Bottom Footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer Bottom (layout 2)',
            'id' => 'footer-bottom-2',
            'description' => esc_html__('Widget Bottom Footer (Only for footer layout 2)', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Newsletter Footer',
            'id' => 'newsletter-footer',
            'description' => esc_html__('Widget Newsletter Footer', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'RIT Woocommerce Widget',
            'id' => 'woocommerce-widget',
            'description' => esc_html__('Woocommerce Widget', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'RIT Woocommerce Widget Right',
            'id' => 'woocommerce-widget-right',
            'description' => esc_html__('Woocommerce Widget Right', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => 'Product Details',
            'id' => 'product-details',
            'description' => esc_html__('Widget show on Product Details', 'ri-quartz'),
            'before_widget' => '<div id="%1$s" class="widget last %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
    }
}

// Woocommerce Function
if(class_exists('WooCommerce')) {
    // Remove Breadcrumb
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    add_action( 'woocommerce_cart_bottom', 'woocommerce_cross_sell_display' );
    add_action( 'woocommerce_single_product_summary', 'ri_quartz_next_prev_product', 6 );
    add_action('woocommerce_checkout_nav', 'ri_quartz_checkout_nav', 0);

    // Checkout Nav
    if(!function_exists('ri_quartz_checkout_nav')){
        function ri_quartz_checkout_nav(){
            echo '<div class="rit-checkout-breadcrumb"><h1><span class="title-cart">'. esc_html__('Shopping Cart', 'ri-quartz') .'</span><span class="clever-icon-next"></span><span class="title-checkout">'. esc_html__('Checkout details', 'ri-quartz') .'</span><span class="clever-icon-next"></span><span class="title-thankyou">'. esc_html__('Order Complete', 'ri-quartz') .'</span></h1></div>';
        }
    }

    // Next / Prev Product
    if(!function_exists('ri_quartz_next_prev_product')){
        function ri_quartz_get_html_next_prev_product($id_product){
            $product = wc_get_product( $id_product );
            $product_object = wc_get_product($id_product);
            echo '<div class="rit-preview-product hidden-xs">';
            echo '<div class="rit-preview-image"><a href="'.esc_url(get_permalink($id_product)).'">'. $product->get_image() .'</a></div>';
            echo '<div class="rit-preview-details"><h3><a href="'.esc_url(get_permalink($id_product)).'">'. esc_html(get_the_title($id_product)) .'</a></h3><span class="rit-preview-price">'. $product_object->get_price_html() .'</span></div>';
            echo '</div>';
        }
        function ri_quartz_next_prev_product(){
            $prev_post = get_previous_post(true, '', 'product_cat');
            $next_post = get_next_post(true, '', 'product_cat');
            echo '<div class="rit-next-prev-product">';
            if (!empty( $prev_post )) :
                echo '<div class="prev-post">';
                echo '<a href="'.esc_url(get_permalink( $prev_post->ID )).'"><i class="clever-icon-arrow-left-regular"></i></a>';
                echo ri_quartz_get_html_next_prev_product($prev_post->ID);
                echo '</div>';
            endif;
            if (!empty( $next_post )) :
                echo '<div class="next-post">';
                echo '<a href="'.esc_url(get_permalink( $next_post->ID )).'"><i class="clever-icon-arrow-right-regular"></i></a>';
                echo ri_quartz_get_html_next_prev_product($next_post->ID);
                echo '</div>';

            endif;
            echo '</div>';
        }
    }

    // Product Item Text
    if (!function_exists('ri_quartz_product_items_text')) {
        function ri_quartz_product_items_text($count)
        {

            $product_item_text = "";

            if ($count > 1) {
                $product_item_text = str_replace('%', number_format_i18n($count), esc_html(__('% items', 'ri-quartz')));
            } elseif ($count == 0) {
                $product_item_text = esc_html(__('0 items', 'ri-quartz'));
            } else {
                $product_item_text = esc_html(__('1 item', 'ri-quartz'));
            }

            return $product_item_text;
        }
    }

    // Product Wishlist Button
    if (!function_exists('ri_quartz_wishlist_button')) {
        function ri_quartz_wishlist_button($text = false)
        {

            global $product, $yith_wcwl;

            if (class_exists('YITH_WCWL_UI')) {

                $product_type = $product->product_type;

                //Check Wishlist version
                if (version_compare(get_option('yith_wcwl_version'), "2.0") >= 0) {
                    $url = YITH_WCWL()->get_wishlist_url();
                    $default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists(array('is_default' => true)) : false;

                    if (!empty($default_wishlists)) {
                        $default_wishlist = $default_wishlists[0]['ID'];
                    } else {
                        $default_wishlist = false;
                    }

                    $exists = YITH_WCWL()->is_product_in_wishlist($product->id, $default_wishlist);
                } else {
                    $url = $yith_wcwl->get_wishlist_url();
                    $exists = $yith_wcwl->is_product_in_wishlist($product->id);
                }

                $classes = get_option('yith_wcwl_use_button') == 'yes' ? 'add_to_wishlist single_add_to_wishlist button alt' : 'add_to_wishlist';

                $html = '<div class="yith-wcwl-add-to-wishlist">';
                $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row

                $html .= $exists ? ' hide" style="display:none;"' : ' show"';

                if($text == true){
                    $html .= '><a class="product-action-item ' . esc_attr($classes) . '" href="' . htmlspecialchars($yith_wcwl->get_addtowishlist_url()) . '" data-product-id="' . esc_attr($product->id) . '" data-product-type="' . esc_attr($product_type) . '"><i class="fa fa-heart-o"></i></a>';
                    $html .= '<a class="text-action-item" href="' . htmlspecialchars($yith_wcwl->get_addtowishlist_url()) . '" data-product-id="' . esc_attr($product->id) . '" data-product-type="' . esc_attr($product_type) . '">'. esc_html__('Add To Wishlist', 'ri-quartz') .'</a>';
                } else {
                    $html .= '><a data-toggle="tooltip" data-placement="top" title="'. esc_html__('Add Wishlist', 'ri-quartz') .'" class="product-action-item ' . esc_attr($classes) . '" href="' . htmlspecialchars($yith_wcwl->get_addtowishlist_url()) . '" data-product-id="' . esc_attr($product->id) . '" data-product-type="' . esc_attr($product_type) . '"><i class="fa fa-heart-o"></i></a>';
                }
                $html .= '</div>';

                $html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><span class="feedback">' . esc_html(__('Product added to wishlist.', 'ri-quartz')) . '</span> <a class="product-action-item" href="' . esc_url($url) . '"><i class="fa fa-check"></i></a></div>';
                $html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ($exists ? 'show' : 'hide') . '" style="display:' . ($exists ? 'block' : 'none') . '"><a class="product-action-item" href="' . esc_url($url) . '"><i class="fa fa-check"></i></a></div>';
                $html .= '<div style="clear:both"></div><div class="yith-wcwl-wishlistaddresponse"></div>';

                $html .= '</div>';

                return $html;

            }

        }
    }

    // Product Quick View Button
    if(class_exists('YITH_WCQV')){
        if (!function_exists('ri_quartz_add_quick_view_button')) {
            function ri_quartz_add_quick_view_button()
            {
                global $product;
                $label = esc_html(get_option('yith-wcqv-button-label'));
                echo '<a data-toggle="tooltip" data-placement="top" title="'. esc_html__('Quick View', 'ri-quartz') .'" id="rit-quickview-button-' . esc_attr(ri_quartz_random_ID()) . '" href="#" class="yith-wcqv-button product-action-item hidden-sm hidden-xs" data-product_id="' . esc_attr($product->id) . '"><i class="clever-icon-quickview-1"></i><span>'. esc_html__('Quick View', 'ri-quartz') .'</span></a>';
            }
        }
        remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_images', 20 );
        add_action( 'yith_wcqv_product_image', 'ri_quartz__product_images_quickview', 20 );
        if ( ! function_exists( 'ri_quartz__product_images_quickview' ) ) {

            /**
             * Output the product image before the single product summary.
             *
             * @subpackage	Product
             */
            function ri_quartz__product_images_quickview() {
                wc_get_template( 'single-product/product-image-quickview.php' );
            }
        }
    }

    // Product Compare
    if (class_exists('YITH_Woocompare')) {
        function ri_quartz_add_compare($text = false)
        {
            global $product;
            $action_add = 'yith-woocompare-add-product';
            $url_args = array(
                'action' => $action_add,
                'id' => $product->id
            );

            $html = '';
            $html .= '<div class="yith-compare">';
            if($text == true){
                $html .= '<a id="rit-add-compare-' . ri_quartz_random_ID() . '" href="' . esc_url(wp_nonce_url(add_query_arg($url_args), $action_add)) . '" class="compare product-action-item" data-product_id="' . esc_attr($product->id) . '"><i class="fa fa-exchange"></i></a>';
                $html .= '<a id="rit-add-compare-' . ri_quartz_random_ID() . '" href="' . esc_url(wp_nonce_url(add_query_arg($url_args), $action_add)) . '" class="text-action-item" data-product_id="' . esc_attr($product->id) . '">'. esc_html__('Add To Compare', 'ri-quartz') .'</a>';
            } else {
                $html .= '<a data-toggle="tooltip" data-placement="top" title="'. esc_html__('Add Compare', 'ri-quartz') .'" id="rit-add-compare-' . ri_quartz_random_ID() . '" href="' . esc_url(wp_nonce_url(add_query_arg($url_args), $action_add)) . '" class="compare product-action-item" data-product_id="' . esc_attr($product->id) . '"><i class="fa fa-exchange"></i></a>';
            }
            $html .= '</div>';
            return $html;
        }
    }

    // Get Product Category
    if (!function_exists('rit_quartz_get_product_cat')) {
        function rit_quartz_get_product_cat()
        {
            $args = array(
                'hide_empty' => true,
            );
            $html = '<select class="hidden-xs rit-search-category" name="product_cat">';
            $html .= '<option value="">All Categories</option>';
            $product_categories = get_terms('product_cat', $args);
            foreach ($product_categories as $product_c) {
                $html .= '<option value="' . esc_attr($product_c->slug) . '">' . esc_attr($product_c->name) . '</option>';
            }
            $html .= '</select>';
            $html .= '<input type="hidden" value="product" name="post_type">';
            return $html;
        }
    }

    // Top Link
    if (!function_exists('ri_quartz_top_link')) {
        function ri_quartz_top_link()
        {
            global $yith_wcwl, $woocommerce;
            $html = $url = $logout_url = '';
            $html .= '<div class="rit-top-link"><ul><li class="text border-right border-left">';
            if (version_compare(get_option('yith_wcwl_version'), "2.0") >= 0) {
                $url = YITH_WCWL()->get_wishlist_url();
            } else {
                $url = $yith_wcwl->get_wishlist_url();
            }
            $html .= '<a href="' . esc_url($url) . '"><i class="fa fa-heart-o"></i>' . esc_html(__('Wishlist', 'ri-quartz')) . '</a>';
            $html .= '</li><li class="text border-right">';
            $html .= '<a href="' . esc_url($woocommerce->cart->get_checkout_url()) . '"><i class="fa fa-check-square-o"></i>' . esc_html(__('Checkout', 'ri-quartz')) . '</a>';
            $html .= '</li><li class="text border-right">';
            $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
            if ( $myaccount_page_id ) {
                $logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) );
                if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
                    $logout_url = str_replace( 'http:', 'https:', $logout_url );
            }
            if ( is_user_logged_in() ) {
                $html .= '<a href="'. esc_url(get_permalink( $myaccount_page_id )) .'" title="'. esc_html__('My Account','ri-quartz') .'"><i class="fa fa-user"></i>'. esc_html__('My Account','ri-quartz') .'</a>';
                $html .= '</li><li class="text border-right">';
                $html .= '<a href="'. esc_url($logout_url) .'" title="'. esc_html__('Logout','ri-quartz') .'"><i class="fa fa-unlock-alt"></i>'. esc_html__('Logout','ri-quartz') .'</a>';
                $html .= '</li>';
            } else {
                $html .= '<a href="'. esc_url(get_permalink( $myaccount_page_id )) .'" title="'. esc_html__('Login / Register','ri-quartz') .'"><i class="fa fa-lock"></i>'. esc_html__('Login / Register','ri-quartz') .'</a></li>';
            }
            $html .= '</ul></div>';
            return $html;
        }
    }
}

// Body Class
// Add specific CSS class by filter
add_filter( 'body_class', 'ri_quartz_body_class' );
function ri_quartz_body_class( $classes ) {
    $classes[] = '';
    $page_layout = get_theme_mod('rit_page_layout', 'full');
    if(!is_404()) {
        if (get_post_meta(get_the_ID(), 'rit_page_width', true) != '' && get_post_meta(get_the_ID(), 'rit_page_width', true) != 'use-default') {
            $page_layout = get_post_meta(get_the_ID(), 'rit_page_width', true);
        }
    }
    if ($page_layout == 'boxed') {
        $classes[] = 'body-boxed';
    }
    if(get_post_meta(get_the_ID(), 'rit_custom_class_page', true) != ''){
        $classes[] = get_post_meta(get_the_ID(), 'rit_custom_class_page', true);
    }
    // return the $classes array
    return $classes;
}

// Remove Script Version
function ri_quartz_remove_script_version( $src ){
    if( strpos($src, $_SERVER['SERVER_NAME']) != false ){
        $parts = explode( '?', $src );
        return $parts[0];
    }else{
        return $src;
    }
}
add_filter( 'script_loader_src', 'ri_quartz_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'ri_quartz_remove_script_version', 15, 1 );

$args = array(
    'default-image' => ''
);
add_theme_support("custom-header", $args);
add_theme_support("custom-background", $args);

// Add Edit Style
if(!function_exists('ri_quartz_add_editor_styles')){

    function ri_quartz_add_editor_styles() {
        add_editor_style( 'css/editor-style.css' );
    }
    add_action( 'admin_init', 'ri_quartz_add_editor_styles' );
}

// Woocommerce Support
add_action( 'after_setup_theme', 'ri_quartz_woocommerce_support' );
function ri_quartz_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}