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
<article id="post-<?php the_ID(); ?>" <?php (is_single()) ? post_class('content-grid col-sm-6 col-md-6 al-center') : post_class('al-center content-grid post-item col-sm-6 col-md-6'); ?>>

    <?php if(has_post_thumbnail()) : ?>
        <?php if(!get_theme_mod('sp_post_thumb')) : ?>
            <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(get_theme_mod('rit_enable_page_heading', '1')) { ?>
	<header class="entry-header">
        <span class="post-cat"><?php echo wp_kses(ri_quartz_get_category(', '), array('a'=>array('href'=>array(),'title'=>array()))); ?></span>
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="'. esc_html__('bookmark', 'ri-quartz') .'">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->
    <?php } ?>
    <?php echo do_shortcode('[rit_divider width="70" height="1" bgColor="#000" margin="16px auto 30px"]') ?>
	<div class="entry-content al-left">
		<?php
            if(is_single()){
                the_content();
            } else {
                echo wp_kses(ri_quartz_excerpt(200), array(
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
    <div class="article-meta clearfix">
        <span class="post-date pull-left"><?php echo esc_html(get_the_date('F jS, Y')); ?></span>
        <span class="post-comment pull-right"><a href="<?php echo esc_url(the_permalink()); ?>#comments"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></span>
    </div>

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

</article><!-- #post-## -->









