<?php
/**
 * Single Product Rating
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

if (get_option('woocommerce_enable_review_rating') === 'no') {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average = $product->get_average_rating();

if ($rating_count > 0) : ?>

    <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope
         itemtype="http://schema.org/AggregateRating">
        <div class="star-rating" title="<?php printf(esc_html(__('Rated %s out of 5', 'ri-quartz')), $average); ?>">
			<span style="width:<?php echo(($average / 5) * 100); ?>%">
				<strong itemprop="ratingValue"
                        class="rating"><?php echo esc_html($average); ?></strong> <?php printf(esc_html(__('out of %s5%s', 'ri-quartz')), '<span itemprop="bestRating">', '</span>'); ?>
                <?php printf(esc_html(_n('based on %s customer rating', 'based on %s customer ratings', $rating_count, 'ri-quartz')), '<span itemprop="ratingCount" class="rating">' . esc_html($rating_count) . '</span>'); ?>
			</span>
        </div>
        <?php if (comments_open()) : ?>
            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">
            <?php
                if($review_count == 0){
                    echo '<span class="review-count">'. esc_html(__('0 Review', 'ri-quartz')) .'</span>';
                } elseif ($review_count == 1){
                    echo '<span class="review-count">'. esc_html(__('1 Review', 'ri-quartz')) .'</span>';
                } else {
                    echo '<span class="review-count">'. esc_html($review_count) . esc_html(__(' Review(s)', 'ri-quartz')) .'</span>';
                }
            ?> | 
            </a>
            <a href="#reviews"><?php echo esc_html(__('Add your review', 'ri-quartz')); ?></a>
        <?php endif ?>
    </div>

<?php endif; ?>

<?php
// Availability
$availability      = $product->get_availability();
$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">'. esc_html(__('Available: ', 'ri-quartz')) .'<span>' . esc_html( $availability['availability'] ) . '</span></p>';

echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>
