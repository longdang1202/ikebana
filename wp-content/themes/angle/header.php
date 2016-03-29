<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rst
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php if( get_theme_mod('des_seo') ) { ?>
<meta name="description" content="<?php echo esc_attr(get_theme_mod('des_seo')) ?>">
<?php } ?>
<?php if( get_theme_mod('keywords_seo') ) { ?>
<meta name="keywords" content="<?php echo esc_attr(get_theme_mod('keywords_seo')) ?>">
<?php } ?>
<?php if( get_theme_mod('author_seo') ) { ?>
<meta name="author" content="<?php echo esc_attr(get_theme_mod('author_seo')) ?>">
<?php } ?>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Favicons
================================================== -->
<?php if( get_theme_mod('favicon') ) { ?>
<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('favicon')) ?>" type="image/x-icon">
<?php } else { ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" type="image/x-icon">
<?php } ?>

<?php if( get_theme_mod('favicon_iphone') ) { ?>
<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('favicon_iphone')) ?>">
<?php } else { ?>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon.png">
<?php } ?>

<?php if( get_theme_mod('favicon_ipad') ) { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('favicon_ipad')) ?>">
<?php } else { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-72x72.png">
<?php } ?>

<?php if( get_theme_mod('favicon_ipad_retina') ) { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('favicon_ipad_retina')) ?>">
<?php } else { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-114x114.png">
<?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<?php if( get_theme_mod('hide_loading') != true ) { ?>
	<!--- Loading -->
	<div id="ip-container" class="ip-container loading">
		<div class="ip-header">
			<div class="ip-logo">
				<?php if( get_theme_mod('rst_logo_large') ) { ?>
				<img src="<?php echo esc_url(get_theme_mod('rst_logo_large')) ?>" alt="" />
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="" />
				<?php } ?>
			</div>
			
			<div class="ip-loader">
				<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
					<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
					<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
				</svg>
			</div>
			
		</div>
	</div><!--- End Loading -->
	<?php } ?>
	
	<?php
		$check_header_template = is_page_template( 'template-home.php' ) && rs::getField('rst_header_home') == 2 && rs::getField('rst_header_home_content');
	?>
	
	<!--- Wrapper -->
	<div id="wrapper" class="clearfix <?php echo ($check_header_template ? 'header-template' : '') ?>">
		
		<?php if( $check_header_template ) { ?>
		<div id="slider_header">
			<div class="bxslider-home">
			<?php foreach( rs::getField('rst_header_home_content') as $slider ) { ?>
				<?php if( isset($slider['image']) ) { ?>
				<div class="slide">
					<img src="<?php echo bfi_thumb(wp_get_attachment_url($slider['image']),array('width' => 1440,'height'=> 670)) ?>" alt="" />
					<div class="bx-captions">
						<div class="bx-inner-caption">
							<div class="rst-control">
								<a href="#" class="rst-prev"><i class="fa fa-angle-left"></i></a>
								<a href="#" class="rst-next"><i class="fa fa-angle-right"></i></a>
							</div>
							<h3><?php echo isset($slider['title']) ? apply_filters('the_title', $slider['title'] ) : '' ?></h3>
							<?php echo isset($slider['content']) ? apply_filters('the_content', $slider['content'] ) : '' ?>
						</div>
					</div>
				</div>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
		<?php } ?>
	
		<!--- Header -->
		<header>
			<div class="container">
				<div class="rst-logo">
					<a href="<?php echo esc_url(home_url()) ?>">
						<?php if( get_theme_mod('rst_logo') ) { ?>
						<img src="<?php echo esc_url(get_theme_mod('rst_logo')) ?>" alt="" />
						<?php } else { ?>
						<img  src="<?php echo get_template_directory_uri() ?>/img/logo_main.png" alt="" />
						<?php } ?>
					</a>
				</div>
				<button class="rst-menu-trigger">
					<span>Toggle navigation</span>
				</button>
				<nav class="rst-main-menu">
					<?php 
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_class'=> 'rst-nav-menu',
									'container' => false
								)
							);
					?>
					<form action="<?php echo esc_url(home_url()) ?>" class="rst-search">
						<input type="text" placeholder="Enter key word" name="s" />
						<button class="sb"><i class="fa fa-search"></i></button>
					</form>
					<?php
						}
					?>
				</nav>
			</div>
			<div class="header-fixed animated">
				<div class="container">
					<div class="rst-logo">
						<a href="<?php echo esc_url(home_url()) ?>">
							<?php if( get_theme_mod('rst_logo_tiny') ) { ?>
							<img src="<?php echo esc_url(get_theme_mod('rst_logo_tiny')) ?>" alt="" />
							<?php } else { ?>
							<img src="<?php echo get_template_directory_uri() ?>/img/logo-tiny.png" alt="" />
							<?php } ?>
						</a>
					</div>
					<nav class="rst-main-menu">
						<?php 
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class'=> 'rst-nav-menu',
										'container' => false
									)
								);
							}
						?>
					</nav>
				</div>
			</div>
		</header><!--- End Header -->