<div class="footer-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?php dynamic_sidebar('footer-4'); ?>
            </div>
        </div>
    </div>
</div>
<div class="coppy-right" id="coppy-right">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <?php if (get_theme_mod('rit_copyright_text')) {
                    echo '<p class="mb0">' . wp_kses(get_theme_mod('rit_copyright_text'), array('p' => array('class' => array()), 'a' => array('class' => array(), 'href' => array()), 'i' => array('class' => array()))) . '</p>';
                } else {
                    echo '<p class="mb0">'. esc_html__('2015 Made with River Theme. All rights reserved.', 'ri-quartz') .'</p>';
                } ?>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="footer-bottom">
                    <?php dynamic_sidebar('footer-bottom'); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- .site-info -->