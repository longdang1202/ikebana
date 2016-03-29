<div class="search-wrap rit-search ">
    <form method="get" class="ajax-search-form clearfix" action="<?php echo esc_url(home_url( '/' )); ?>">
        <?php if (function_exists('rit_quartz_get_product_cat')) { ?>
        <?php echo wp_kses(rit_quartz_get_product_cat(), array('select'=>array('id'=>array(),'class'=>array(),'name'=>array(),'style'=>array()), 'option'=>array('value'=>array()))); ?>
        <?php } ?>
        <input type="text" class="search-field" name="s" placeholder="<?php echo esc_html(__('Type & hit enter to search...', 'ri-quartz')); ?>" />
        <i class="icon-search fa fa-search"></i>
    </form>
</div>
