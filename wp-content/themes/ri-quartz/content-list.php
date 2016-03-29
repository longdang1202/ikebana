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
<article id="post-<?php the_ID(); ?>" <?php (is_single()) ? post_class('content-list') : post_class('post-item content-list'); ?>>
    <div class="row">
        <div class="col-sm-5 col-md-5">
        <?php if(has_post_thumbnail()) : ?>
            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        </div>
        <div class="col-sm-7 col-md-7">
            <?php if(get_theme_mod('rit_enable_page_heading', '1')) { ?>
                <header class="entry-header">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="'. esc_html__('bookmark', 'ri-quartz') .'">', esc_url( get_permalink() ) ), '</a></h2>' );
                    endif;
                    ?>
                </header><!-- .entry-header -->
            <?php } ?>
            <div class="article-meta">
                <span class="post-date pul-left"><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date('F jS, Y')); ?></span>
                <span class="post-cat pul-left"><i class="fa fa-eye"></i><?php echo wp_kses(ri_quartz_get_category(', '), array('a'=>array('href'=>array(),'title'=>array()))); ?></span>
                <span class="post-comment pul-left"><a href="<?php echo esc_url(the_permalink()); ?>#comments"><i class="fa fa-comment-o"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></span>
            </div>

            <div class="entry-content">
                <?php
                if(is_single()){
                    the_content();
                } else {
                    echo wp_kses(ri_quartz_content(30), array(
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

            <?php if(!is_single()) { ?>
                <div class="entry-action">
                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(__('Read More', 'ri-quartz')); ?> <i class="fa fa-long-arrow-right"></i></a>
                </div>
            <?php } ?>

            <?php
            // Author bio.
            if ( is_single() && get_the_author_meta( 'description' ) ) :
                get_template_part( 'author-bio' );
            endif;
            ?>
        </div>
    </div>
</article><!-- #post-## -->
