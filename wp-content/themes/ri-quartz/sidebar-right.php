<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */

$sidebar_right = get_theme_mod('rit_default_right_sidebar', 'Sidebar Widget');

?>

<?php if ( is_active_sidebar( $sidebar_right ) ) : ?>
    <div id="widget-area" class="widget-area" role="complementary">
        <?php dynamic_sidebar( $sidebar_right ); ?>
    </div><!-- .widget-area -->
<?php endif; ?>
