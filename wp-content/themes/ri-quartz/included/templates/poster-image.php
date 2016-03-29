<?php
$rit_disible_title = $rit_custom_title = $rit_sub_title = $rit_title_position = $rit_poster_image = $style = '';
if(!is_404()){
    $rit_poster_image = get_post_meta(get_the_ID(), 'rit_poster_image', true);
    $rit_custom_title = get_post_meta(get_the_ID(), 'rit_custom_title', true);
    $rit_disible_title = get_post_meta(get_the_ID(), 'rit_disible_title', true);
    $rit_sub_title = get_post_meta(get_the_ID(), 'rit_sub_title', true);
    $rit_title_position = get_post_meta(get_the_ID(), 'rit_title_position', true);
}
?>

<?php if($rit_poster_image != '' && $rit_poster_image != 0) {
    if($rit_poster_image){
        $style = wp_get_attachment_url($rit_poster_image);
    }
    ?>
    <div class="rit-cover-wrap title-<?php echo ($rit_title_position != '') ? $rit_title_position : 'center'; ?>" <?php echo ($rit_poster_image) ? 'style="background-image: url('. esc_url($style) .')"' : ''; ?>>
        <?php if(!$rit_disible_title) { ?>
            <div class="container">
                <div class="rit-cover-title al-center">
                    <?php if($rit_custom_title) {
                        echo '<h2 class="h1">'. esc_html($rit_custom_title) .'</h2>';
                    } else {
                        echo '<h2 class="h1">'. esc_html(get_the_title(get_the_ID())) .'</h2>';
                    } ?>
                    <?php if($rit_title_position == 'left') {
                        echo do_shortcode('[rit_divider class="bg-accent" margin="15px 0 17px 0" width="50" height="3"]');
                    } ?>
                    <?php if($rit_sub_title) {
                        echo '<span class="rit-sub-title">'. esc_html($rit_sub_title) .'</span>';
                    } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>