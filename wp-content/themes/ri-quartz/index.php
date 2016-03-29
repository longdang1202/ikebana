<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

            <?php if(get_theme_mod('rit_default_layout', 'full') == 'grid') {
                echo '<div class="row">';
            } ?>

			<?php
			// Start the loop.
            $i=0;
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_theme_mod('rit_default_layout', 'full') );

			// End the loop.
                $i++;
			endwhile;

			// Previous/next page navigation.
            ?>
            <div class="rit-pagination"><div class="rit-pagination-left pull-left">
            <?php previous_posts_link ( 'NEWER POST' ); ?>
            </div><div class="rit-pagination-right pull-right">
            <?php next_posts_link ( 'OLDER POST' ); ?>
            </div></div>
        <?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
            <?php if(get_theme_mod('rit_default_layout', 'full') == 'grid') {
                echo '</div>';
            } ?>

		</main><!-- .site-main -->
    <?php if($sidebar == 'right-sidebar' || $sidebar == 'both-sidebar') { ?>
        <div id="sidebar-right" class="col-sm-3 col-md-3">
            <?php get_sidebar('right'); ?>
        </div>
    <?php } ?>
</div><!-- .content-area -->
<?php get_footer(); ?>
