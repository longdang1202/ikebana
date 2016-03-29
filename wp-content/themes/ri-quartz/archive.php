<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
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

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                get_template_part( 'content', get_theme_mod('rit_default_layout', 'full') );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			if (function_exists("rit_pagination")) :
				rit_pagination(3);
			endif;

		// If no content, include the "No posts found" template.
		else :
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

<?php get_footer(); ?>
