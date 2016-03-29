<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<?php
	$rit_woo_layout_details = get_theme_mod('rit_woo_layout_details', 'left-sidebar');
	if(isset($_GET['layout_details'])){
		$rit_woo_layout_details = $_GET['layout_details'];
	}
	$class_layout_details = 'col-sm-9 col-md-9';
	if($rit_woo_layout_details == 'both-sidebar'){
		$class_layout_details = 'col-sm-6 col-md-6';
	} elseif ($rit_woo_layout_details == 'no-sidebar'){
		$class_layout_details = 'col-sm-12 col-md-12';
	}
?>

<div itemscope itemtype="<?php echo esc_url(woocommerce_get_product_schema()); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if($rit_woo_layout_details == 'left-sidebar' || $rit_woo_layout_details == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3">
				<div class="sidebar-details sidebar-details-left">
					<?php dynamic_sidebar('Product Details') ?>
				</div>
			</div>
		<?php } ?>
		<div class="<?php echo esc_attr($class_layout_details); ?>">
			<div class="rit-product-details">
				<div class="rit-product-details-top">
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="product-details-image">
								<?php
								/**
								 * woocommerce_before_single_product_summary hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
								?>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="summary entry-summary">
								<?php
								/**
								 * woocommerce_single_product_summary hook
								 *
								 * @hooked woocommerce_template_single_title - 5
								 * @hooked woocommerce_template_single_rating - 10
								 * @hooked woocommerce_template_single_price - 10
								 * @hooked woocommerce_template_single_excerpt - 20
								 * @hooked woocommerce_template_single_add_to_cart - 30
								 * @hooked woocommerce_template_single_meta - 40
								 * @hooked woocommerce_template_single_sharing - 50
								 */
								do_action( 'woocommerce_single_product_summary' );
								?>

							</div><!-- .summary -->
						</div>
					</div>
				</div>
				<?php
				/**
				 * woocommerce_after_single_product_summary hook
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>

				<meta itemprop="url" content="<?php esc_url(the_permalink()); ?>" />
			</div>
		</div>
		<?php if($rit_woo_layout_details == 'right-sidebar' || $rit_woo_layout_details == 'both-sidebar') { ?>
			<div class="col-sm-3 col-md-3">
				<div class="sidebar-details sidebar-details-right">
					<?php dynamic_sidebar('Product Details') ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
