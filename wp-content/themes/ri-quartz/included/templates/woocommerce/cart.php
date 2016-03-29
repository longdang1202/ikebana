<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <div class="rit-cart rit-drop-wrap pull-right">
        <?php wc_get_template_part( 'cart/mini', 'cart' ); ?>
    </div>
<?php } ?>