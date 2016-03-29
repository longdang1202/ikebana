<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$data_column_details = get_theme_mod('rit_woo_column_details', '3');
if(isset($_GET['column_details'])){
	$data_column_details = $_GET['column_details'];
}

$woocommerce_loop['columns'] = $data_column_details;

if ( $products->have_posts() ) : ?>

	<div class="upsells products">
		<h3 class="rit-element-title rit-title-recent"><span><?php echo esc_html(__( 'You may also like&hellip;', 'ri-quartz' )); ?></span></h3>
		<div class="rit-element-slider">
		<?php
			global $slider_details;
			$slider_details = 1;
		?>
		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
		</div>
	</div>

<?php endif;

wp_reset_postdata();
