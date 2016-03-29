<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', esc_html(__( 'Product Description', 'ri-quartz' )) );

?>

<?php the_content(); ?>
