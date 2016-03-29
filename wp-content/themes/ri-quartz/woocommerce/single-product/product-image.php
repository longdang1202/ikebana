<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="rit-product-image">
	<?php
	$attachment_first =
	$attachment_ids = $product->get_gallery_attachment_ids();
	$thumbnail_id =  get_post_thumbnail_id($post->ID);
	array_unshift($attachment_ids, $thumbnail_id);
	$attachment_ids = array_unique($attachment_ids);

	if ( $attachment_ids ) {
		$loop 		= 0;
		$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
		?>
		<div class="rit-product-gallery">
		<div class="gallery gallery-main">
			<?php

			foreach ( $attachment_ids as $attachment_id ) {

				$classes = array( 'zoom' );

				if ( $loop === 0 || $loop % $columns === 0 )
					$classes[] = 'first';

				if ( ( $loop + 1 ) % $columns === 0 )
					$classes[] = 'last';

				$image_link = wp_get_attachment_url( $attachment_id );

				if ( ! $image_link )
					continue;

				$image_title 	= esc_attr( get_the_title( $attachment_id ) );
				$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
				$image_url = wp_get_attachment_image_src($attachment_id, 'shop_single', false);

				$image = '<img data-zoom-image="'. esc_url($image_url[0]) .'" alt="'. esc_attr($image_caption) .'" title="'. esc_attr($image_title) .'" src="'. esc_url($image_url[0]) .'" width="'. esc_attr($image_url[1]) .'" height="'. esc_attr($image_url[2]) .'" />';

				$image_class = esc_attr( implode( ' ', $classes ) );
				echo '<div class="easyzoom">';
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image" title="%s">%s</a>', $image_link, $image_caption, $image ), $post->ID );
				echo '</div>';

				$loop++;
			}

			?>
		</div>
			<span class="popup-zoom"><i class="fa-expand fa"></i></span>
		</div>
			<div class="gallery gallery-nav">
				<?php
				foreach ( $attachment_ids as $attachment_id ) {

					$classes = array( 'zoom' );

					if ( $loop === 0 || $loop % $columns === 0 )
						$classes[] = 'first';

					if ( ( $loop + 1 ) % $columns === 0 )
						$classes[] = 'last';

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link )
						continue;

					$image_title 	= esc_attr( get_the_title( $attachment_id ) );
					$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

					$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
						'title'	=> $image_title,
						'alt'	=> $image_title
					) );

					$image_class = esc_attr( implode( ' ', $classes ) );
					echo '<div class="gallery-cell">';
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a title="%s">%s</a>', $image_caption, $image ), $attachment_id, $post->ID, $image_class );
					echo '</div>';
					$loop++;
				}
				?>
			</div>
		<?php
	}

	?>
</div>
<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('.gallery-main').flickity({
			// options
			cellAlign: 'left',
			contain: true,
			freeScroll: true,
			pageDots: false,
			wrapAround: true
		});
		jQuery('.gallery-nav').flickity({
			asNavFor: '.gallery-main',
			contain: true,
			pageDots: false,
			cellAlign: "left",
			prevNextButtons: false
		});
		jQuery('.gallery-main').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery:{enabled:true}
			// other options
		});
		jQuery('.popup-zoom').click(function(e){
			jQuery('.gallery-main').find('.is-selected a').click(), e.preventDefault();
		});
		jQuery('.easyzoom').zoom();
	});

</script>
