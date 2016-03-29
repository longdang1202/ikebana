<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$rit_woo_product_show = get_theme_mod('rit_woo_product_show', 'grid');
if(isset($_GET['product_show'])){
	$rit_woo_product_show = $_GET['product_show'];
}
?>
<div class="clearfix">
	<div class="ordering">
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<h3><?php echo esc_html(__('SORT BY', 'ri-quartz')); ?></h3>
				<form class="woocommerce-ordering" method="get">
					<select name="orderby" class="orderby">
						<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
							<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
						<?php endforeach; ?>
					</select>
					<?php
					// Keep query string vars intact
					foreach ( $_GET as $key => $val ) {
						if ( 'orderby' === $key || 'submit' === $key ) {
							continue;
						}
						if ( is_array( $val ) ) {
							foreach( $val as $innerVal ) {
								echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
							}
						} else {
							echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
						}
					}
					?>
				</form>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="pull-right">
					<h3><?php echo esc_html(__('VIEW AS', 'ri-quartz')); ?></h3>
					<div id="sort-by" class="pull-left">
						<ul>
							<li><a data-placement="top" data-toggle="tooltip" data-original-title="View Grid" data-sort="grid" class="grid <?php echo ($rit_woo_product_show == 'grid') ? 'active' : ''; ?>" href="#"><i class="clever-icon-menu-3"></i></a></li>
							<li><a data-placement="top" data-toggle="tooltip" data-original-title="View List" data-sort="list" class="list <?php echo ($rit_woo_product_show == 'list') ? 'active' : ''; ?>" href="#"><i class="clever-icon-list"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

