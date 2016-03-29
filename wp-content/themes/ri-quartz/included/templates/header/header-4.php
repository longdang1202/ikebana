<div class="container">
    <div class="menu-mobile visible-xs"></div>
    <div class="header-inner row">
        <?php get_template_part('included/templates/canvas-menu'); ?>
        <div class="site-branding col-sm-3 col-md-3">
            <?php get_template_part('included/templates/logo'); ?>
        </div>
        <div class="col-sm-6 col-md-6 hidden-xs">
            <?php get_template_part('included/templates/search', ''); ?>
        </div>
        <div class="col-sm-3 col-md-3">
            <?php get_template_part('included/templates/woocommerce/cart', ''); ?>
        </div>
    </div>
</div>
<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '<div id="sticker">';
} ?>
<div class="container">
    <div class="rit-header-bottom">
        <div class="row">
            <div class="col-sm-3 col-md-3 hidden-xs">
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
            <div class="col-sm-3 col-md-3 hidden-xs">
                <div class="header-action pull-right">
                    <?php if(is_active_sidebar('Header Primary 2')){
                        dynamic_sidebar('Header Primary 2');
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (get_theme_mod('rit_enable_sticky_header', '1')) {
    echo '</div>';
} ?>