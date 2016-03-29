<!-- .Vertical Menu -->
<?php
    $rit_vertical_title = get_theme_mod('rit_vertical_title', 'CATEGORIES');
    $rit_vertical_show = get_theme_mod('rit_vertical_show', 'hover');
    $location = 'vertical';
    if(!is_404()){
        if(get_post_meta(get_the_ID(),'rit_vertical_menu_mode', true) != 'use-default' && get_post_meta(get_the_ID(),'rit_vertical_menu_mode', true) != ''){
            $rit_vertical_show = get_post_meta(get_the_ID(),'rit_vertical_menu_mode', true);
        }
        if(get_post_meta(get_the_ID(),'rit_vertical_menu_location', true) != 'use-default' && get_post_meta(get_the_ID(),'rit_vertical_menu_location', true) != ''){
            $location = get_post_meta(get_the_ID(),'rit_vertical_menu_location', true);
        }
    }
    if(isset($atts)){
        if($atts['title'] != ''){
            $rit_vertical_title = $atts['title'];
        }
        if($atts['show_mode'] != ''){
            $rit_vertical_show = $atts['show_mode'];
        }
        if($atts['location'] != ''){
            $location = $atts['location'];
        }
    }
?>
<div id="vertical-menu" class="hidden-xs vertical-menu <?php echo esc_attr($rit_vertical_show); ?>">
    <div class="vertical-menu-title">
        <span><i class="clever-icon-menu-1"></i><?php echo esc_html($rit_vertical_title); ?></span>
    </div>
    <div class="vertical-menu-content">
        <?php
        if (class_exists('RIT_Walker_Nav_Menu')) {
            wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => $location, 'walker' => new RIT_Walker_Nav_Menu()));
        } else {
            wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => $location));
        }
        ?>
    </div>
</div>