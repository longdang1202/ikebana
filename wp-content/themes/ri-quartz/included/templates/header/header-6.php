<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '<div id="sticker">';
} ?>
<div class="container">
    <div class="header-inner">
        <div class="row">
            <div class="hidden-xs"><?php get_template_part('included/templates/search', ''); ?></div>
            <?php get_template_part('included/templates/canvas-menu'); ?>
            <div class="site-branding col-sm-3 col-md-3">
                <?php get_template_part('included/templates/logo'); ?>
            </div>
            <div class="col-sm-8 col-md-8">
                <div id="main-navigation" class="horizontal-menu hidden-xs pull-right">
                    <?php
                    if (class_exists('RIT_Walker_Nav_Menu')) {
                        wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary', 'walker' => new RIT_Walker_Nav_Menu()));
                    } else {
                        wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary'));
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-1 col-md-1 pl0">
                <div class="header-action clearfix">
                    <div class="pull-right">
                        <span class="search-click hidden-xs"><i class="clever-icon-search-4"></i></span>
                        <?php get_template_part('included/templates/woocommerce/cart', ''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '</div>';
} ?>
