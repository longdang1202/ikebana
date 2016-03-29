<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

wc_print_notices();

do_action('woocommerce_checkout_nav');
do_action('woocommerce_before_cart');

?>
<form action="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" method="post">
<div class="row">
    <div class="col-sm-7 col-md-7">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <table class="shop_table cart al-center" cellspacing="0">
                <thead>
                <tr>
                    <th class="product-thumbnail"><?php echo esc_html(__('Product', 'ri-quartz')); ?></th>
                    <th class="product-name">&nbsp;</th>
                    <th class="product-price"><?php echo esc_html(__('Price', 'ri-quartz')); ?></th>
                    <th class="product-quantity"><?php echo esc_html(__('Quantity', 'ri-quartz')); ?></th>
                    <th class="product-subtotal"><?php echo esc_html(__('Total', 'ri-quartz')); ?></th>
                    <th class="product-remove">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php do_action('woocommerce_before_cart_contents'); ?>

                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        ?>
                        <tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                            <td class="product-thumbnail">
                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                if (!$_product->is_visible()) {
                                    echo wp_kses($thumbnail, array('img' => array('width' => array(), 'height' => array(), 'src' => array(), 'class' => array(), 'alt' => array(),)));
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($_product->get_permalink($cart_item)), $thumbnail);
                                }
                                ?>
                            </td>

                            <td class="product-name">
                                <?php
                                if (!$_product->is_visible()) {
                                    echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                } else {
                                    echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s </a>', esc_url($_product->get_permalink($cart_item)), $_product->get_title()), $cart_item, $cart_item_key);
                                }

                                // Meta data
                                echo WC()->cart->get_item_data($cart_item);

                                // Backorder notification
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo '<p class="backorder_notification">' . esc_html(__('Available on backorder', 'ri-quartz')) . '</p>';
                                }
                                ?>
                            </td>

                            <td class="product-price">
                                <?php
                                echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                ?>
                            </td>

                            <td class="product-quantity">
                                <?php
                                if ($_product->is_sold_individually()) {
                                    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                } else {
                                    $product_quantity = woocommerce_quantity_input(array(
                                        'input_name' => "cart[{$cart_item_key}][qty]",
                                        'input_value' => $cart_item['quantity'],
                                        'max_value' => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                        'min_value' => '0'
                                    ), $_product, false);
                                }

                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key);
                                ?>
                            </td>

                            <td class="product-subtotal">
                                <?php
                                echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                ?>
                            </td>
                            <td class="product-remove">
                                <?php
                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><i class="clever-icon-close"></i></a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), esc_html(__('Remove this item', 'ri-quartz'))), $cart_item_key);
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }

                do_action('woocommerce_cart_contents');
                ?>

                <?php do_action('woocommerce_after_cart_contents'); ?>
                </tbody>
            </table>
            <?php if (WC()->cart->coupons_enabled()) { ?>
                <div class="coupon">
                    <div class="coupon-inner">
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                               placeholder="<?php echo esc_html(__('Coupon code', 'ri-quartz')); ?>"/> <input
                            type="submit" class="button" name="apply_coupon"
                            value="<?php echo esc_html(__('Apply Coupon', 'ri-quartz')); ?>"/>

                        <?php do_action('woocommerce_cart_coupon'); ?>
                    </div>
                </div>
            <?php } ?>

            <?php do_action('woocommerce_cart_actions'); ?>

            <?php wp_nonce_field('woocommerce-cart'); ?>
            <?php do_action('woocommerce_after_cart_table'); ?>
    </div>
    <div class="col-sm-5 col-md-5">
        <div class="cart-collaterals">
            <?php do_action('woocommerce_cart_collaterals'); ?>
        </div>
    </div>
</div>
<?php //do_action('woocommerce_cart_bottom'); ?>
<?php do_action('woocommerce_after_cart'); ?>
</form>
