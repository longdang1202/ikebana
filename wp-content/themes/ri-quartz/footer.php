<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */
?>

<?php
$page_layout = get_theme_mod('rit_page_layout', 'full');
if(!is_404()) {
    if (get_post_meta(get_the_ID(), 'rit_page_width', true) != '' && get_post_meta(get_the_ID(), 'rit_page_width', true) != 'use-default') {
        $page_layout = get_post_meta(get_the_ID(), 'rit_page_width', true);
    }
}
?>

</div><!-- .site-content -->
</div><!-- .site-container -->
</div><!-- .site -->
<?php if ($page_layout == 'boxed') { ?>
</div>
<?php } ?>
<?php
$rit_disible_mr_footer = $rit_logofooter_image = $rit_footer_options = '';
if (!is_404()) {
    $rit_disible_mr_footer = get_post_meta(get_the_ID(), 'rit_disible_mr_footer', true);
    $rit_logofooter_image = get_post_meta(get_the_ID(), 'rit_logofooter_image', true);
    $rit_footer_options = get_post_meta(get_the_ID(), 'rit_footer_options', true);
}
$footer_select = get_theme_mod('rit_default_footer', '1');
$footer_logo = get_theme_mod('rit_footer_logo', '');
if ($rit_logofooter_image) {
    $footer_logo = wp_get_attachment_url($rit_logofooter_image, 'full');
}
if ($rit_footer_options != 'use-default' && $rit_footer_options != '') {
    $footer_select = $rit_footer_options;
}
$class_footer = 'footer-' . esc_attr($footer_select);
if ($rit_disible_mr_footer) {
    $class_footer .= ' no-margin-content';
}
?>
<footer id="colophon" class="site-footer <?php echo esc_attr($class_footer); ?>">
        <div id="back-to-top"><i class="clever-icon-up"></i></div>
        <?php
        if (get_theme_mod('rit_default_footer', '1') != 'none') {
            get_template_part('included/templates/footer/footer', $footer_select);
        }
        ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>



