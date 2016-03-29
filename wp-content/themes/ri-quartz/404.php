<?php

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<h1 class="page-title">404</h1>
			<?php echo esc_html(__('Oops! That page can&rsquo;t be found.', 'ri-quartz')); ?>
			<div class="entry-action">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Go To Home</a>
			</div>
		</section><!-- .error-404 -->

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
