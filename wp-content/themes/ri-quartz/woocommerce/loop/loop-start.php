<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php
    global $slider_details, $related_check;
    $slider_class = $data_column = '';
    if($slider_details == 1){
        $data_column_details = get_theme_mod('rit_woo_column_details', '3');
        if($related_check == 1){
            $data_column_details = get_theme_mod('rit_woo_column_related', '4');
        }
        if(isset($_GET['column_details'])){
            $data_column_details = $_GET['column_details'];
        }
        $slider_class = 'rit-owl-carousel';
        $data_column .= ' data-control=yes data-pager=no data-mobile=1 data-tablet=2 data-smalldes=3 data-number='.esc_attr($data_column_details).'';
    }
?>
<ul class="products row <?php echo esc_attr($slider_class); ?>"<?php echo esc_attr($data_column); ?>>