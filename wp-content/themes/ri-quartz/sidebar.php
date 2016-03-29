<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */

$sidebar_left = get_theme_mod('rit_default_left_sidebar', 'Sidebar Widget');

?>

<?php if ( is_active_sidebar( $sidebar_left ) ) : ?>
    <div id="widget-area" class="widget-area" role="complementary">
        <?php dynamic_sidebar( $sidebar_left ); ?>
    </div><!-- .widget-area -->
<?php endif; ?>
