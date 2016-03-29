<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */

get_header();

$sidebar = $class_main = $class_content = $class_sidebar = '';
if (get_post_meta(get_the_ID(), 'rit_sidebar_options', true) == 'use-default') {
    $sidebar = get_theme_mod('rit_default_sidebar', 'right-sidebar');
} else {
    $sidebar = get_post_meta(get_the_ID(), 'rit_sidebar_options', true);
}
$class_content = $sidebar;

if ($sidebar == 'no-sidebar') {
    $class_main = 'col-sm-12 col-md-12';
} elseif ($sidebar == 'left-sidebar' || $sidebar == 'right-sidebar') {
    $class_main = 'col-sm-9 col-md-9';
} elseif ($sidebar == 'both-sidebar') {
    $class_main = 'col-sm-6 col-md-6';
} else {
    $class_main = 'col-sm-12 col-md-12';
}


?>


<div id="primary" class="content-area row <?php echo esc_attr($class_content); ?>">
    <?php if ($sidebar == 'left-sidebar' || $sidebar == 'both-sidebar') { ?>
        <div id="sidebar-left" class="col-sm-3 col-md-3">
            <?php get_sidebar(); ?>
        </div>
    <?php } ?>
    <div id="main" class="site-main <?php echo esc_attr($class_main); ?>">
        <?php
        // Start the loop.
        while (have_posts()) : the_post();

            // Include the page content template.
            get_template_part('content', 'page');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

            // End the loop.
        endwhile;
        ?>
    </div>
    <?php if ($sidebar == 'right-sidebar' || $sidebar == 'both-sidebar') { ?>
        <div id="sidebar-right" class="col-sm-3 col-md-3">
            <?php get_sidebar('right'); ?>
        </div>
    <?php } ?>
</div><!-- .content-area -->

<?php get_footer(); ?>
