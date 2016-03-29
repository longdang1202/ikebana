<div class="rit-header-top hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <?php if(is_active_sidebar('Header Top')){
                    dynamic_sidebar('Header Top');
                } ?>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="pull-right">
                    <?php if(class_exists('WooCommerce')) {
                        echo wp_kses(ri_quartz_top_link(), array('div'=>array('class'=>array()), 'a'=>array('href'=>array(),'title'=>array()),'i'=>array('class'=>array()),'ul'=>array('class'=>array()),'li'=>array('class'=>array())));
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>