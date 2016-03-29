<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( 10 );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => 10,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );
$data_column_details = get_theme_mod('rit_woo_column_details', '3');
if(isset($_GET['column_details'])){
	$data_column_details = $_GET['column_details'];
}

$woocommerce_loop['columns'] = $data_column_details;

if ( $products->have_posts() ) : ?>

	<div class="related products">
		<h3 class="rit-element-title rit-title-recent"><span><?php echo esc_html(__( 'Related Products', 'ri-quartz' )); ?></span></h3>
		<div class="rit-element-slider">
		<?php
			global $slider_details, $related_check;
			$slider_details = 1;
			$related_check = 1;
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
