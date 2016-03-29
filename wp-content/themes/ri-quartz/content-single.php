<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php (is_single()) ? post_class('rit-news-item single-post') : post_class('post-item'); ?>>

    <?php if(has_post_format('gallery')) : ?>

        <?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>

        <?php if($images) : ?>
            <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                <ul class="bxslider">
                    <?php foreach($images as $image) : ?>

                        <?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
                        <?php $the_caption = get_post_field('post_excerpt', $image); ?>
                        <li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> /></li>

                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

    <?php elseif(has_post_format('video')) : ?>

        <div class="post-image<?php echo (is_single()) ? ' single-video' : ''; ?>">
            <?php $sp_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
            <?php if(wp_oembed_get( $sp_video )) : ?>
                <?php echo wp_oembed_get($sp_video); ?>
            <?php else : ?>
                <?php echo esc_url($sp_video); ?>
            <?php endif; ?>
        </div>

    <?php elseif(has_post_format('audio')) : ?>

        <div class="post-image audio<?php echo (is_single()) ? ' single-audio' : ''; ?>">
            <?php $sp_audio = get_post_meta( get_the_ID(), '_format_audio_embed', true ); ?>
            <?php if(wp_oembed_get( $sp_audio )) : ?>
                <?php echo wp_oembed_get($sp_audio); ?>
            <?php else : ?>
                <?php echo esc_url($sp_audio); ?>
            <?php endif; ?>
        </div>

    <?php else : ?>

        <?php if(has_post_thumbnail()) { ?>
            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                </div>
            <?php endif; ?>
        <?php } else { ?>
            <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                <a href="<?php echo esc_html(get_permalink()); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.jpg'); ?>" alt="<?php echo esc_html__('Image Placeholder', 'ri-quartz'); ?>" /></a>
            </div>
        <?php } ?>

    <?php endif; ?>

    <div class="rit-news-info">
        <h3 class="title-news"><a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <span class="info-author"><?php echo esc_html(__('By', 'ri-quartz')); ?> <a class="author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author"><?php echo wp_kses(get_the_author(),array('a'=>array('href'=>array(),'title'=>array(),'class'=>array(),'rel'=>array()))); ?></a></span>
        <span class="separate">|</span>
        <span class="info-date"><?php echo esc_html(get_the_date('F j, Y')); ?></span>
        <span class="separate">|</span>
        <span class="info-comment"><a href="<?php echo esc_url(the_permalink()); ?>#comments"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
        <span class="separate">|</span>
        <span class="info-cat"><?php echo wp_kses(get_the_category_list(','), array('a'=>array('href'=>array(),'title'=>array()))); ?></span>
        <div class="description al-left entry-content">
            <?php
            if(!is_single()) {
                echo wp_kses(ri_quartz_content(40), array(
                    'p' => array(
                        'class' => array()
                    ),
                    'span' => array(
                        'class' => array()
                    ),
                    'h1' => array(
                        'class' => array()
                    ),
                    'h2' => array(
                        'class' => array()
                    ),
                    'h3' => array(
                        'class' => array()
                    ),
                    'h4' => array(
                        'class' => array()
                    ),
                    'h5' => array(
                        'class' => array()
                    ),
                    'h6' => array(
                        'class' => array()
                    ),
                    'a' => array(
                        'class' => array(),
                        'title' => array(),
                        'href' => array(),
                    )
                ));
            } else {
                the_content();
            }

            ?>
        </div>
        <?php if(!is_single()) { ?>
            <a class="readmore" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(__('Read More', 'ri-quartz')); ?><i class="fa fa-arrow-right"></i></a>
        <?php } ?>

        <?php if(is_single()){
            get_template_part('included/templates/tag');
            get_template_part('included/templates/share');
        } ?>

    </div>

    <?php
    // Author bio.
    if (is_single()) :
//        get_template_part('included/templates/post_pagination');
        get_template_part('included/templates/about_author');
        get_template_part('included/templates/related_posts');
    endif;
    ?>

</article><!-- #post-## -->
