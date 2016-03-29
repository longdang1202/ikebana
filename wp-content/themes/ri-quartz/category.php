<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */

get_header();

$sidebar = $class_main = $class_content = $class_sidebar = '';

$sidebar = get_theme_mod('rit_default_sidebar', 'right-sidebar');
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
            <div id="sidebar-left" class="col-sm-3 col-md-3">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
        <main id="main" class="site-main <?php echo esc_attr($class_main); ?>">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
                        get_template_part( 'content', get_theme_mod('rit_default_layout', 'full') );

					endwhile;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
        </main><!-- .site-main -->
        <?php if($sidebar == 'right-sidebar' || $sidebar == 'both-sidebar') { ?>
            <div id="sidebar-right" class="col-sm-3 col-md-3">
                <?php get_sidebar('right'); ?>
            </div>
        <?php } ?>
    </div><!-- .content-area -->

<?php
get_footer();
