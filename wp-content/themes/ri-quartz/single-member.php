<?php

get_header();

$sidebar = $class_main = $class_content = $class_sidebar = '';
if(get_post_meta(get_the_ID(), 'rit_sidebar_options', true) == 'use-default'){
    $sidebar = get_theme_mod('rit_default_sidebar', 'right-sidebar');
} else {
    $sidebar = get_post_meta(get_the_ID(), 'rit_sidebar_options', true);
}
$class_content = $sidebar;

if($sidebar == 'no-sidebar'){
    $class_main = 'col-sm-12 col-md-12';
} elseif ($sidebar == 'left-sidebar' || $sidebar == 'right-sidebar'){
    $class_main = 'col-sm-9 col-md-9';
} else{
    $class_main = 'col-sm-6 col-md-6';
}

?>

<div id="primary" class="content-area row <?php echo esc_attr($class_content); ?>">
    <?php if($sidebar == 'left-sidebar' || $sidebar == 'both-sidebar') { ?>
        <div id="sidebar-left" class="col-sm-3 col-md-3 hidden-xs">
            <?php get_sidebar(); ?>
        </div>
    <?php } ?>
    <main id="main" class="site-main col-sm-12 col-md-12">

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', 'member' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template('', true);
            endif;


            // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->
    <?php if($sidebar == 'right-sidebar' || $sidebar == 'both-sidebar') { ?>
        <div id="sidebar-right" class="col-sm-3 col-md-3">
            <?php get_sidebar('right'); ?>
        </div>
    <?php } ?>
</div><!-- .content-area -->

<?php get_footer(); ?>
