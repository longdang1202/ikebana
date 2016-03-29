<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
	$rit_woo_layout = get_theme_mod('rit_woo_layout', 'left-sidebar');
	$rit_woo_product_show = get_theme_mod('rit_woo_product_show', 'grid');
	if(isset($_GET['woo_layout'])){
		$rit_woo_layout = $_GET['woo_layout'];
	}
	if(isset($_GET['product_show'])){
		$rit_woo_product_show = $_GET['product_show'];
	}
	$class_woo_layout = 'col-sm-9 col-md-9';
	if($rit_woo_layout == 'no-sidebar') {
		$class_woo_layout = 'col-sm-12 col-md-12';
	}
	if($rit_woo_layout == 'both-sidebar') {
		$class_woo_layout = 'col-sm-6 col-md-6';
	}
?>

<div class="row">
	<?php if($rit_woo_layout == 'left-sidebar' || $rit_woo_layout == 'both-sidebar') { ?>
	<div class="col-sm-3 col-md-3">
		<?php dynamic_sidebar('woocommerce-widget'); ?>
	</div>
	<?php } ?>
	<div class="<?php echo esc_attr($class_woo_layout); ?>">
		<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		?>

<!--		--><?php //if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<!---->
<!--			<h1 class="page-title">--><?php //woocommerce_page_title(); ?><!--</h1>-->
<!---->
<!--		--><?php //endif; ?>
		<?php if(get_theme_mod('rit_banner_woo', '')) { ?>
		<div class="banner-shop">
			<div class="banner-image">
				<?php if(get_theme_mod('rit_banner_woo', '')) { ?>
					<img src="<?php echo esc_url(get_theme_mod('rit_banner_woo', '')); ?>" alt="Banner Shop" />
				<?php } else { ?>
					<span class="banner-shop-place"></span>
				<?php } ?>
				<?php if(get_theme_mod('rit_title_shop', 'IMAGE BANNER')) { ?>
					<div class="banner-content">
						<?php if(get_theme_mod('rit_title_shop', 'IMAGE BANNER')) { ?>
							<h3><?php echo esc_html(get_theme_mod('rit_title_shop', 'IMAGE BANNER')); ?></h3>
						<?php } ?>
						<?php if(get_theme_mod('rit_des_shop', 'Hey Guys !Your image category banner Here.')){ ?>
							<p class="mb0"><?php echo wp_kses(get_theme_mod('rit_des_shop', 'Hey Guys !Your image category banner Here.'), array('p'=>array(),'span'=>array())); ?></p>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>

		<?php if ( have_posts() ) : ?>

			<?php
			/**
			 * woocommerce_before_shop_loop hook
			 *
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );
			?>

			<ul class="products products-category-wrap products-grid <?php echo ($rit_woo_product_show == 'grid') ? 'activate' : 'deactivate'; ?> row">

			<?php woocommerce_product_subcategories(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

			</ul>

			<?php // Product List ?>

			<ul class="products products-category-wrap products-list <?php echo ($rit_woo_product_show == 'list') ? 'activate' : 'deactivate'; ?> row">
				<?php woocommerce_product_subcategories(); ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product-list' ); ?>

				<?php endwhile; // end of the loop. ?>
			</ul>

			<?php
			/**
			 * woocommerce_after_shop_loop hook
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

		<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
		?>


	</div>
	<?php if($rit_woo_layout == 'right-sidebar' || $rit_woo_layout == 'both-sidebar') { ?>
		<div class="col-sm-3 col-md-3">
			<?php dynamic_sidebar('woocommerce-widget'); ?>
		</div>
	<?php } ?>
</div>




<?php get_footer( 'shop' ); ?>
