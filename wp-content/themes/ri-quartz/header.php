<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (get_theme_mod('rit_enable_responsive', '1')) { ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <?php if(function_exists( 'wp_site_icon' )) {
        wp_site_icon();
    } else { ?>
        <?php if (get_theme_mod('rit_favicon')) : ?>
            <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('rit_favicon')); ?>"/>
        <?php endif; ?>
    <?php } ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<?php
$custom_class_page = $class_header = $rit_breadcrumbs_layout = '';
$header_select = get_theme_mod('rit_default_header', '2');
$header_top = get_theme_mod('rit_enable_header_top', '0');
$header_bottom = get_theme_mod('rit_enable_header_bottom', '1');
$page_layout = get_theme_mod('rit_page_layout', 'full');
$header_style = $header_border = 'default';
$header_position = 'relative';
// Get metabox field
if(!is_404()) {
    if(get_post_meta(get_the_ID(), 'rit_page_width', true) != '' && get_post_meta(get_the_ID(), 'rit_page_width', true) != 'use-default'){
        $page_layout = get_post_meta(get_the_ID(), 'rit_page_width', true);
    }
    if(get_post_meta(get_the_ID(), 'rit_enable_header_top', true) != ''){
        $header_top = get_post_meta(get_the_ID(), 'rit_enable_header_top', true);
    }
    $rit_custom_class_page = get_post_meta(get_the_ID(), 'rit_custom_class_page', true);
    $rit_header_options = get_post_meta(get_the_ID(), 'rit_header_options', true);
    $rit_disible_mr_header = get_post_meta(get_the_ID(), 'rit_disible_mr_header', true);
    $rit_disible_breadcrumb = get_post_meta(get_the_ID(), 'rit_disible_breadcrumb', true);
    $rit_poster_image = get_post_meta(get_the_ID(), 'rit_poster_image', true);
    $rit_breadcrumbs_layout = get_post_meta(get_the_ID(), 'rit_breadcrumbs_layout', true);
    if(get_post_meta(get_the_ID(), 'rit_header_position', true) != '' && get_post_meta(get_the_ID(), 'rit_header_position', true) != 'use-default'){
        $header_position = get_post_meta(get_the_ID(), 'rit_header_position', true);
    }
    // Check header default or custom
    if ($rit_header_options != 'use-default' && $rit_header_options != '') {
        $header_select = $rit_header_options;
    }
}
// Custom class content
$class_content = 'sidebar-no-padding';
if(get_post_meta(get_the_ID(), 'rit_sidebar_padding', true) == 1){
    $class_content = 'sidebar-has-padding';
}
// Custom class header
$class_header .= ' header-' . esc_attr($header_select) . ' position-' . $header_position;
?>
<body <?php body_class(); ?>>
<?php if ($page_layout == 'boxed') { ?>
<div class="container container-page-boxed">
    <?php } ?>
    <div id="page" class="wrapper">
        <!-- Canvas Overlay -->
        <div class="canvas-overlay"></div>
        <!-- Header -->
        <header id="masthead" class="site-header clearfix <?php echo esc_attr($class_header); ?>">
            <!-- Header Top -->
            <?php if($header_top) { get_template_part('included/templates/header/header', 'top'); } ?>
            <?php get_template_part('included/templates/header/header', $header_select); ?>
        </header>
        <!-- Header Bottom -->
        <?php if($header_bottom) { get_template_part('included/templates/header/header', 'bottom'); } ?>
        <!-- Poster Image -->
        <?php get_template_part('included/templates/poster', 'image'); ?>
        <!-- Breadcrumbs Overlay -->
        <?php if(isset($rit_disible_breadcrumb) && !$rit_disible_breadcrumb){ ?>
        <div class="breadcrumbs layout-<?php echo ($rit_breadcrumbs_layout != '') ? $rit_breadcrumbs_layout : 'large'; ?>" xmlns:v="http://rdf.data-vocabulary.org/#">
            <div class="container">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
        <?php } ?>
        <!-- Content -->
        <?php
        if (isset($rit_disible_mr_header) && $rit_disible_mr_header) {
            $class_content .= ' no-margin-content';
        }
        ?>

        <div id="content" class="clearfix site-content <?php echo esc_attr($class_content); ?>">
            <div class="container">