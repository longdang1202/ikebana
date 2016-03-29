<div class="canvas-menu visible-xs">
    <div class="canvas-menu-inner">
        <span class="clever-icon-menu-1 icon-menu"></span>
        <div class="canvas-main">
            <span class="icon-close clever-icon-close"></span>
            <?php get_template_part('included/templates/search', ''); ?>
            <div class="mobile-menu-content">
                <?php
                if (class_exists('RIT_Walker_Nav_Menu')) {
                    wp_nav_menu(array('container_class' => 'mobile-menu', 'theme_location' => 'mobile', 'walker' => new RIT_Walker_Nav_Menu()));
                } else {
                    wp_nav_menu(array('container_class' => 'mobile-menu', 'theme_location' => 'mobile'));
                }
                ?>
                <?php if(class_exists('WooCommerce')) {
                    echo wp_kses(ri_quartz_top_link(), array('div'=>array('class'=>array()), 'a'=>array('href'=>array(),'title'=>array()),'i'=>array('class'=>array()),'ul'=>array('class'=>array()),'li'=>array('class'=>array())));
                } ?>
            </div>
        </div>
    </div>
</div>