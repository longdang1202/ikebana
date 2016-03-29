<?php
	// type use: text, checkbox, radio, select, dropdown-pages, textarea, color, gallery, image
	
	$rst_widgets = rst_get_my_widgets();
	
	// Theme Color
	rs::addCustomizeTab(array(
		'title' => 'Theme Color', 
		'name' => 'rst_customize_theme_color',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Theme Color',
				'type' 			=> 'color',
				'default_value' => '#ff406f',
				'name' 			=> 'rst_theme_color',
				'css'			=> '
					.ip-header .ip-loader svg path.ip-loader-circle {
						stroke: $value;
					}

					.hvr-ripple-out::after, 
					.fancybox-wrap .bx-controls-direction a span:hover,
					.widget_gallery a:hover, 
					blockquote, blockquote.text-right, 
					.rst-main-menu li:hover a {
						border-color: $value;
					}

					#searchform input[type="submit"], .search-form input[type="submit"],
					header .rst-icon-search:hover ,
					.bx-controls-direction a:hover,
					.rst-post-item .overlay-icon,
					header .rst-search.open button,
					.wpcf7-form input[type="submit"],
					#contactForm  input[type="submit"],
					header .rst-search button:hover,
					.widget_newsletterwidget .newsletter-submit ,
					.widget_tag_cloud .tagcloud a:hover ,
					.widget_calendar table tbody td a,
					.comment-respond form input[type="submit"]:hover {
						background: $value;
					}

					a:hover, a:focus ,
					.bx-controls-direction a ,
					.rst-back-home span,
					.wpcf7-not-valid-tip,
					.widget_recent_comments a,
					h3.comment-reply-title a,
					.comment-reply-link,
					.fancybox-wrap .bx-controls-direction a span:hover,
					.help-block.text-danger li ,
					.page-links,
					.rst-ajax-load-more,
					.fa-li,
					.wp-pagenavi a:hover,
					.widget_categories ul li:hover,
					.widget_categories ul li:hover a,
					.rst-readmore ,
					.rst-main-menu li:hover > a {
						color: $value;
					}
				'
			),
			array(
				'label' 		=> 'Link Color',
				'type' 			=> 'color',
				'description'	=> 'Select link color',
				'default_value' => '#428bca',
				'name' 			=> 'color_link',
				'css'			=> 'a{ color: $value }'
			)
		)
	) );
	
	// Favicon
	rs::addCustomizeTab(array(
		'title' => 'Favicon', 
		'name' => 'rst_customize_favicon',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Favicon',
				'type' 			=> 'image',
				'description'	=> '16x16 px.',
				'name' 			=> 'favicon'
			),
			array(
				'label' 		=> 'Apple iPad Retina Icon',
				'type' 			=> 'image',
				'description'	=> '144x144 px.',
				'name' 			=> 'favicon_ipad_retina'
			),
			array(
				'label' 		=> 'Apple iPad Icon',
				'type' 			=> 'image',
				'description'	=> '75x75 px.',
				'name' 			=> 'favicon_ipad'
			),
			array(
				'label' 		=> 'Apple iPhone Icon',
				'type' 			=> 'image',
				'description'	=> '57x57 px.',
				'name' 			=> 'favicon_iphone'
			)
		)
	) );
	
	
	// Loading
	rs::addCustomizeTab(array(
		'title' => 'Loading', 
		'name' => 'rst_customize_loading',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Hide Loading',
				'type' 			=> 'checkbox',
				'name' 			=> 'hide_loading'
			)
		)
	));
	
	// Logo
	rs::addCustomizeTab(array(
		'title' => 'Logo', 
		'name' => 'rst_customize_logo',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Main Logo',
				'type' 			=> 'image',
				'name' 			=> 'rst_logo'
			),
			array(
				'label' 		=> 'Tiny Logo',
				'type' 			=> 'image',
				'name' 			=> 'rst_logo_tiny'
			),
			array(
				'label' 		=> 'Loading Logo',
				'type' 			=> 'image',
				'name' 			=> 'rst_logo_large'
			)
		)
	) );
	
	// Home
	rs::addCustomizeTab(array(
		'title' => 'Home', 
		'name' => 'rst_customize_home',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Home Layout',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_index_layout',
				'default_value'	=> 1,
				'items'        	=> array(
					'1' => get_template_directory_uri() .'/inc/css/images/fullwidth.jpg',
					'2' => get_template_directory_uri() .'/inc/css/images/sidebar_left.jpg',
					'3' => get_template_directory_uri() .'/inc/css/images/sidebar_right.jpg'
				)
			),
			array(
				'label' 		=> 'Home Template',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_index_template',
				'default_value'	=> 'large',
				'items'        	=> array(
					'large' => get_template_directory_uri() .'/inc/css/images/large.jpg',
					'grid' => get_template_directory_uri() .'/inc/css/images/Grid.jpg',
					'box' => get_template_directory_uri() .'/inc/css/images/Box.jpg'
				)
			),
			array(
				'label' 		=> 'Number Columns',
				'type' 			=> 'select',
				'default_value'	=> 4,
				'name'			=> 'rst_index_column',
				'items'			=> array(
					'2' => '2 Columns',
					'3' => '3 Columns',
					'4' => '4 Columns'
				),
				'description'	=> 'Number columns for template grid &amp; box'
			),
			array(
				'label' 		=> 'Posts Per Page',
				'type' 			=> 'text',
				'default_value'	=> 10,
				'name'			=> 'rst_index_numberpost'
			),
			array(
				'label' 		=> 'Excerpt Length',
				'type' 			=> 'text',
				'default_value'	=> 50,
				'name'			=> 'rst_index_excerpt_length'
			),
			array(
				'label' 		=> 'Page Navi',
				'type' 			=> 'select',
				'default_value'	=> 1,
				'name'			=> 'rst_index_pagenavi',
				'items'			=> array(
					'0'	=> 'Hide',
					'1'	=> 'Number',
					'2'	=> 'Load More'
				)
			)
		)
	) );
	
	// Category
	rs::addCustomizeTab(array(
		'title' => 'Category & Author Page', 
		'name' => 'rst_customize_category',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Category Layout',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_cat_layout',
				'default_value'	=> 1,
				'items'        	=> array(
					'1' => get_template_directory_uri() .'/inc/css/images/fullwidth.jpg',
					'2' => get_template_directory_uri() .'/inc/css/images/sidebar_left.jpg',
					'3' => get_template_directory_uri() .'/inc/css/images/sidebar_right.jpg'
				)
			),
			array(
				'label' 		=> 'Category Template',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_cat_template',
				'default_value'	=> 'large',
				'items'        	=> array(
					'large' => get_template_directory_uri() .'/inc/css/images/large.jpg',
					'grid' => get_template_directory_uri() .'/inc/css/images/Grid.jpg',
					'box' => get_template_directory_uri() .'/inc/css/images/Box.jpg'
				)
			),
			array(
				'label' 		=> 'Number Columns',
				'type' 			=> 'select',
				'default_value'	=> 4,
				'name'			=> 'rst_cat_column',
				'items'			=> array(
					'2' => '2 Columns',
					'3' => '3 Columns',
					'4' => '4 Columns'
				),
				'description'	=> 'Number columns for template grid &amp; box'
			),
			array(
				'label' 		=> 'Posts Per Page',
				'type' 			=> 'text',
				'default_value'	=> 10,
				'name'			=> 'rst_cat_numberpost'
			),
			array(
				'label' 		=> 'Excerpt Length',
				'type' 			=> 'text',
				'default_value'	=> 50,
				'name'			=> 'rst_cat_excerpt_length'
			),
			array(
				'label' 		=> 'Page Navi',
				'type' 			=> 'select',
				'default_value'	=> 1,
				'name'			=> 'rst_cat_pagenavi',
				'items'			=> array(
					'0'	=> 'Hide',
					'1'	=> 'Number',
					'2'	=> 'Load More'
				)
			)
		)
	) );
	
	// Search
	rs::addCustomizeTab(array(
		'title' => 'Search', 
		'name' => 'rst_customize_search',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Category Layout',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_search_layout',
				'default_value'	=> 1,
				'items'        	=> array(
					'1' => get_template_directory_uri() .'/inc/css/images/fullwidth.jpg',
					'2' => get_template_directory_uri() .'/inc/css/images/sidebar_left.jpg',
					'3' => get_template_directory_uri() .'/inc/css/images/sidebar_right.jpg'
				)
			),
			array(
				'label' 		=> 'Category Template',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_search_template',
				'default_value'	=> 'large',
				'items'        	=> array(
					'large' => get_template_directory_uri() .'/inc/css/images/large.jpg',
					'grid' => get_template_directory_uri() .'/inc/css/images/Grid.jpg',
					'box' => get_template_directory_uri() .'/inc/css/images/Box.jpg'
				)
			),
			array(
				'label' 		=> 'Number Columns',
				'type' 			=> 'select',
				'default_value'	=> 4,
				'name'			=> 'rst_search_column',
				'items'			=> array(
					'2' => '2 Columns',
					'3' => '3 Columns',
					'4' => '4 Columns'
				),
				'description'	=> 'Number columns for template grid &amp; box'
			),
			array(
				'label' 		=> 'Posts Per Page',
				'type' 			=> 'text',
				'default_value'	=> 10,
				'name'			=> 'rst_search_numberpost'
			),
			array(
				'label' 		=> 'Excerpt Length',
				'type' 			=> 'text',
				'default_value'	=> 50,
				'name'			=> 'rst_search_excerpt_length'
			),
			array(
				'label' 		=> 'Page Navi',
				'type' 			=> 'select',
				'default_value'	=> 1,
				'name'			=> 'rst_search_pagenavi',
				'items'			=> array(
					'0'	=> 'Hide',
					'1'	=> 'Number',
					'2'	=> 'Load More'
				)
			)
		)
	) );
	
	// Page
	rs::addCustomizeTab(array(
		'title' => 'Page', 
		'name' => 'rst_customize_page',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Page Layout Default',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_page_layout',
				'default_value'	=> 1,
				'items'        	=> array(
					'1' => get_template_directory_uri() .'/inc/css/images/fullwidth.jpg',
					'2' => get_template_directory_uri() .'/inc/css/images/sidebar_left.jpg',
					'3' => get_template_directory_uri() .'/inc/css/images/sidebar_right.jpg'
				)
			)
		)
	));
	
	// Post
	rs::addCustomizeTab(array(
		'title' => 'Post', 
		'name' => 'rst_customize_post',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Post Layout Default',
				'type' 			=> 'radio-image',
				'name' 			=> 'rst_post_layout',
				'default_value'	=> 1,
				'items'        	=> array(
					'1' => get_template_directory_uri() .'/inc/css/images/fullwidth.jpg',
					'2' => get_template_directory_uri() .'/inc/css/images/sidebar_left.jpg',
					'3' => get_template_directory_uri() .'/inc/css/images/sidebar_right.jpg'
				)
			)
		)
	));
	
	// 404
	rs::addCustomizeTab(array(
		'title' => '404', 
		'name' => 'rst_customize_404',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Title',
				'type' 			=> 'text',
				'name'			=> 'title_404',
				'default_value'	=> '404'
			),
			array(
				'label' 		=> 'Sub Title',
				'type' 			=> 'text',
				'name'			=> 'subtitle_404',
				'default_value'	=> 'Page not found'
			),
			array(
				'label' 		=> 'Content',
				'type' 			=> 'textarea',
				'name'			=> 'content_404',
				'default_value'	=> ''
			)
		)
	) );
	
	
	// Seo
	rs::addCustomizeTab(array(
		'title' => 'Seo', 
		'name' => 'rst_customize_seo',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Meta Description',
				'type' 			=> 'textarea',
				'description'	=> 'Enter your website meta description for SEO.',
				'name' 			=> 'des_seo'
			),
			array(
				'label' 		=> 'Meta Keywords',
				'type' 			=> 'textarea',
				'description'	=> 'Enter your keywords here separated by a comma.',
				'name' 			=> 'keywords_seo'
			),
			array(
				'label' 		=> 'Meta Author',
				'type' 			=> 'textarea',
				'description'	=> '',
				'name' 			=> 'author_seo'
			),
		)
	) );
	
	// Social Network
	rs::addCustomizeTab(array(
		'title' => 'Social Network', 
		'name' => 'rst_customize_social',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Facebook',
				'type' 			=> 'text',
				'name' 			=> 'social_facebook'
			),
			array(
				'label' 		=> 'Google plus',
				'type' 			=> 'text',
				'name' 			=> 'social_google'
			),
			array(
				'label' 		=> 'Twitter',
				'type' 			=> 'text',
				'name' 			=> 'social_twitter'
			),
			array(
				'label' 		=> 'Tumblr',
				'type' 			=> 'text',
				'name' 			=> 'social_tumblr'
			),
			array(
				'label' 		=> 'Instagram',
				'type' 			=> 'text',
				'name' 			=> 'social_instagram'
			),
			array(
				'label' 		=> 'Youtube',
				'type' 			=> 'text',
				'name' 			=> 'social_youtube'
			),
			array(
				'label' 		=> 'Linkedin',
				'type' 			=> 'text',
				'name' 			=> 'social_linkedin'
			)
		)
	) );
	
	// Footer
	rs::addCustomizeTab(array(
		'title' => 'Footer', 
		'name' => 'rst_customize_footer',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Copyright',
				'type' 			=> 'textarea',
				'default_value'	=> '&copy; 2015 Angel. All rights reverved ',
				'name'			=> 'footer_copyright'
			),
			array(
				'label' 		=> 'Hide social',
				'type' 			=> 'checkbox',
				'default_value'	=> '',
				'name'			=> 'footer_hide_social'
			),
		)
	) );
	
	// Translations
	rs::addCustomizeTab(array(
		'title' => 'Translations / ReName Text', 
		'name' => 'rst_customize_translations',
		'priority' => 30,
		'controls' => array(
			array(
				'label' 		=> 'Continue reading',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_continue_reading'
			),
			array(
				'label' 		=> 'Load more',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_loadmore'
			),
			array(
				'label' 		=> 'Go to Home Page',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_go_to_home'
			),
			array(
				'label' 		=> 'Search',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_search'
			),
			array(
				'label' 		=> 'Search resuilt for',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_search_resuilt'
			),
			array(
				'label' 		=> 'Search for',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_search_for'
			),
			array(
				'label' 		=> 'If you\'re not happy with the results, please do another search',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_search_not_happy'
			),
			array(
				'label' 		=> 'Archives',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_archives'
			),
			array(
				'label' 		=> 'Yearly Archives',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'yearly_archives'
			),
			array(
				'label' 		=> 'Monthly Archives',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'monthly_archives'
			),
			array(
				'label' 		=> 'Daily Archives',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'daily_archives'
			),
			array(
				'label' 		=> 'Browsing Tag',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'browsing_tag'
			),
			array(
				'label' 		=> 'Category',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_category'
			),
			array(
				'label' 		=> 'Author',
				'type' 			=> 'text',
				'default_value'	=> '',
				'name'			=> 'translation_author'
			)
		)
	) );
?>