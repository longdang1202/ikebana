<div class="container">
    <div class="header-inner row">
        <?php get_template_part('included/templates/canvas-menu'); ?>
        <div class="site-branding col-sm-3 col-md-3">
            <?php get_template_part('included/templates/logo'); ?>
        </div>
        <div class="header-right col-sm-6 col-md-6 hidden-xs">
            <div class="header-action al-center clearfix">
                <?php if(is_active_sidebar('Header Primary 3')){
                    dynamic_sidebar('Header Primary 3');
                } ?>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <?php get_template_part('included/templates/woocommerce/cart', ''); ?>
        </div>
    </div>
</div>
<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '<div id="sticker">';
} ?>
<div class="rit-header-bottom hidden-xs">
    <div class="container">
        <?php get_template_part('included/templates/search', ''); ?>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <?php get_template_part('rit-core/shortcode-vertical', 'menu'); ?>
            </div>
            <!-- .site-branding -->
            <div id="main-navigation" class="horizontal-menu hidden-xs col-sm-6 col-md-6 pl0">
                <?php
                if (class_exists('RIT_Walker_Nav_Menu')) {
                    wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary', 'walker' => new RIT_Walker_Nav_Menu()));
                } else {
                    wp_nav_menu(array('container_class' => 'main-menu', 'theme_location' => 'primary'));
                }
                ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="pull-right">
                    <span class="search-click"><i class="clever-icon-search-4"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '</div>';
} ?>
