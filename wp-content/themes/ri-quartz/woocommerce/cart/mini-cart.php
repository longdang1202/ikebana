<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	global $woocommerce;

	$cart_total = $woocommerce->cart->get_cart_total();
	$cart_count = $woocommerce->cart->cart_contents_count;
	$cart_count_text = ri_quartz_product_items_text($cart_count);
	$totalamount = $woocommerce->cart->get_cart_total();

	?>

	<div class="widget_shopping_cart_content">
	<div class="cart-title">
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'ri-quartz'); ?>">
			<i class="clever-icon-cart-3"></i>
			<small><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></small>
			<span><?php echo sprintf (_n( '%d item', '%d items', esc_html(WC()->cart->get_cart_contents_count()), 'ri-quartz' ), esc_html(WC()->cart->get_cart_contents_count()) ); ?> - <?php echo wp_kses($totalamount, array('span' => array('class' => array()))); ?></span>
		</a>
	</div>
	<div class=" rit-cart-header rit-drop-box pull-left">
		<div class="rit-shopping-cart">
			<?php if ( $cart_count != "0" ) { ?>
				<div class="cart-contents">
					<?php foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
						$bag_product = $cart_item['data'];
						$product_title = $bag_product->get_title();
						$product_short_title = (strlen($product_title) > 25) ? substr($product_title, 0, 22) . '...' : $product_title;
						if ($bag_product->exists() && $cart_item['quantity']>0) {
							?>
							<div class="cart-item clearfix">
								<div class="cart-product-image"><a class="cart-product-img" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo wp_kses($bag_product->get_image(), array('img' => array('width' => array(), 'height' => array(), 'src' => array(), 'class' => array(), 'alt' => array(),))); ?></a></div>
								<div class="cart-product-details">
									<div class="cart-product-title"><a href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('woocommerce_cart_widget_product_title', $product_short_title, $bag_product) . esc_html(__('x', 'ri-quartz')) . esc_html($cart_item['quantity']); ?></a></div>
									<div class="cart-product-price"><?php echo woocommerce_price($bag_product->get_price()); ?></div>
								</div>
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="fa fa-trash-o" aria-hidden="true"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html(__('Remove this item', 'ri-quartz')) ), $cart_item_key ) ?>
							</div>

						<?php } } ?>
					<div class="cart-item clearfix">
						<p class="cart-total">
							<span class="pull-left"><?php echo esc_html(__('sub total', 'ri-quartz')); ?></span>
							<span class="pull-right"><?php echo wp_kses($totalamount, array('span' => array('class' => array()))); ?></span>
						</p>
					</div>
				</div>
				<div class="cart-buttons">

					<a class="rit-button rit-button-cart rit-button-default" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"><?php echo esc_html(__('view cart', 'ri-quartz')); ?></a>

					<a class="rit-button rit-button-checkout rit-button-default" href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>"><?php echo esc_html(__('checkout', 'ri-quartz')); ?></a>

				</div>
			<?php } else { ?>

				<div class="cart-item clearfix">
					<?php echo esc_html(__("0 items in the shopping bag", 'ri-quartz')); ?>
				</div>

				<?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>

				<div class="cart-buttons">

					<a class="rit-button rit-button-cart rit-button-default" href="<?php echo esc_url( $shop_page_url ); ?>"><?php echo esc_html(__('Go to the shop', 'ri-quartz')); ?></a>

				</div>

			<?php } ?>

		</div>
	</div>
	</div>

<?php } ?>