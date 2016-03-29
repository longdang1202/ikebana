<?php
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
?>
<?php global $product; ?>
<li class="product-widget-item">
	<div class="product-image">
		<?php echo wp_kses($product->get_image(), array('img' => array('src' => array(), 'alt' => array(), 'class' => array()), 'a' => array('class' => array(), 'href' => array()))); ?>
	</div>
	<div class="product-details">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<span class="product-title"><?php echo esc_html($product->get_title()); ?></span>
		</a>
		<div class="clearfix rating">
			<?php if ( ! empty( $show_rating ) ) echo wp_kses($product->get_rating_html(), array('div' => array('class' => array(), 'title' => array(),), 'span' => array('style' => array(),), 'strong' => array('class' => array(),))); ?>
		</div>
		<div class="clearfix price">
			<?php echo wp_kses($product->get_price_html(), array(
				'span' => array(
					'class' => array()
				),
				'del' => array(),
				'ins' => array()
			)
			); ?>
		</div>
	</div>
</li>