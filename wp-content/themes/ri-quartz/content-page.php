<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage ri-quartz
 * @since Ri Quartz 1.0
 */
?>

<div class="entry-content">
    <?php the_content(); ?>
    <?php
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html(__( 'Pages:', 'ri-quartz' )) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html(__( 'Page', 'ri-quartz' )) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
    ?>
</div>
<?php edit_post_link( esc_html(__( 'Edit', 'ri-quartz' )), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>


