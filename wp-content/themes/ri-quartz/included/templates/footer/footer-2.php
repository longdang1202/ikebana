<div class="footer-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 footer-left border-right">
                <div class="clearfix">
                    <?php dynamic_sidebar('footer-1-2'); ?>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 footer-right">
                <div class="footer-right-top clearfix">
                    <?php dynamic_sidebar('newsletter-footer'); ?>
                </div>
                <div class="footer-right-bottom clearfix">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <?php dynamic_sidebar('footer-2-2'); ?>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <?php dynamic_sidebar('footer-3-2'); ?>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <?php dynamic_sidebar('footer-4-2'); ?>
                        </div>
                    </div>
                </div>
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
                    <?php dynamic_sidebar('footer-bottom-2'); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- .site-info -->

