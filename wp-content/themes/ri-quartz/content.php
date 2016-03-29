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

<article id="post-<?php the_ID(); ?>" <?php (is_single()) ? post_class('rit-news-item') : post_class('rit-news-item rit-full-layout'); ?>>
    <?php if(has_post_format('gallery')) : ?>

        <?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>

        <?php if($images) : ?>
            <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                <ul class="bxslider">
                    <?php foreach($images as $image) : ?>

                        <?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
                        <?php $the_caption = get_post_field('post_excerpt', $image); ?>
                        <li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php esc_attr($the_caption); ?>"<?php endif; ?> /></li>

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
                <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.jpg'); ?>" alt="<?php echo esc_html__('Image Placeholder', 'ri-quartz'); ?>" /></a>
            </div>
        <?php } ?>

    <?php endif; ?>
    <div class="rit-news-info">
        <?php if(get_theme_mod('rit_enable_page_heading', '1')) { ?>
            <header class="entry-header">
                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="title-news">', '</h1>' );
                else :
                    the_title( sprintf( '<h2 class="entry-title title-news"><a href="%s" rel="'. esc_html__('bookmark', 'ri-quartz') .'">', esc_url( get_permalink() ) ), '</a></h2>' );
                endif;
                ?>
            </header><!-- .entry-header -->
        <?php } ?>
        <span class="info-cat"><?php echo wp_kses(get_the_category_list(','), array('a'=>array('href'=>array(),'title'=>array()))); ?></span>
        <span class="separate">|</span>
        <span class="info-date"><?php echo esc_html(get_the_date('F j, Y')); ?></span>
        <span class="separate">|</span>
        <span class="info-author"><a class="author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author"><?php echo wp_kses(get_the_author(),array('a'=>array('href'=>array(),'title'=>array(),'class'=>array(),'rel'=>array()))); ?></a></span>
        <span class="separate">|</span>
        <span class="info-comment"><a href="<?php echo esc_url(the_permalink()); ?>#comments"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a></span>
        <div class="entry-content <?php if(!is_single()){ echo 'description al-left'; } ?>">
            <?php
            if(is_single()){
                the_content();
            } else {
                echo wp_kses(ri_quartz_content(50), array(
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
            }
            ?>
        </div><!-- .entry-content -->
        <?php
        if(function_exists('rit_space')){
            echo do_shortcode('[rit_space height="22"][/rit_space]');
        }
        ?>
        <a class="readmore rit-button rit-button-radius rit-button-gray" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(__('Read More', 'ri-quartz')); ?><i class="fa fa-arrow-right"></i></a>
    </div>



	<?php
		// Author bio.
		if (is_single()) :
            get_template_part('included/templates/post_pagination');
            get_template_part('included/templates/share');
            get_template_part('included/templates/tag');
            get_template_part('included/templates/about_author');
            get_template_part('included/templates/related_posts');
		endif;
	?>

</article><!-- #post-## -->
