<?php
    $logo_url = $logo_meta = $logo_sticky = $logo_retina = '';
    $logo_sticky = get_theme_mod('rit_logo_sticky', '');
    $logo_retina = get_theme_mod('rit_logo_retina');
    if(!is_404()){
        $logo_meta = get_post_meta(get_the_ID(), 'rit_logo_image', true);
    }
    if($logo_meta){
        $logo_url = $logo_retina = wp_get_attachment_url($logo_meta, 'full');
    } else {
        $logo_url = get_theme_mod('rit_logo', '');
    }

?>

<?php if ( is_front_page() && is_home() ) { ?>
    <?php if(!$logo_url) { ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
        $description = get_bloginfo( 'description' );
        if ( $description) { ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
        <?php } ?>
    <?php } else { ?>
        <h1 class="site-logo" id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                <img class="logo-sticky" src="<?php echo esc_url($logo_sticky); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
        </h1>
        <?php if(get_theme_mod('rit_logo_retina')) { ?>
            <h1 class="site-logo" id="logo-retina"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo_retina); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
        <?php } ?>
    <?php }} else { ?>
    <?php if(!get_theme_mod('rit_logo')) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
        $description = get_bloginfo( 'description' );
        if ( $description) { ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
        <?php } ?>
    <?php } else { ?>
        <p class="site-logo" id="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                <img class="logo-sticky" src="<?php echo esc_url($logo_sticky); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
        </p>
        <?php if(get_theme_mod('rit_logo_retina')) { ?>
            <p class="site-logo" id="logo-retina"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo_retina); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></p>
        <?php } ?>
    <?php }} ?>
<?php
