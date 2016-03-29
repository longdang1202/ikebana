<div class="tags-link-wrap clearfix">
    <h6 class="tag-title"><?php echo esc_html__('Tags: ', 'ri-quartz'); ?></h6>
    <?php if (has_tag()) { ?>
        <div class="tags-wrap"><span class="tags"><?php the_tags('', ' ', ''); ?></span></div>
    <?php } ?>
</div>