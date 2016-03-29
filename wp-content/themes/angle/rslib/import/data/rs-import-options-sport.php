<?php
class rs_import extends WP_Import
{
    function import_themeoption()
    {
		$rs_options = array(
		  'document_support'=>'',
'favicon'=>'',
'favicon_ipad_retina'=>'',
'favicon_ipad'=>'',
'favicon_iphone'=>'',
'color_theme'=>'#18aaf5',
'bg_body_image'=>'5',
'bg_body_color'=>'#f1f1f1',
'bg_body_repeat'=>'no-repeat',
'bg_body_position'=>'center top',
'bg_body_attachment'=>'fixed',
'color_link'=>'#18aaf5',
'color_link_hover'=>'#18aaf5',
'import_demo'=>'',
'header_layout'=>'layout-2',
'header_ads'=>'sidebar-0',
'header_logo'=>'114',
'header_logo_padding'=>'15',
'header_logo_mini'=>'115',
'header_height'=>'',
'bg_header_image'=>'',
'bg_header_repeat'=>'no-repeat',
'bg_header_position'=>'left top',
'bg_header_attachment'=>'',
'color_header'=>'#ffffff',
'breaking_show'=>'1',
'breaking_terms'=>'',
'breaking_tags'=>'',
'breaking_sort'=>'date',
'breaking_order'=>'DESC',
'breaking_numberpost'=>'10',
'breaking_right_type'=>'social',
'breaking_right_text'=>'',
'breaking_right_menu'=>'',
'footer_layout'=>'default',
'text_footer'=>'Copyright 2015 LazaTheme. All Rights Reserved.',
'hidden_footer'=>'',
'bg_footer_image'=>'',
'bg_footer_repeat'=>'no-repeat',
'bg_footer_position'=>'left top',
'bg_footer_attachment'=>'',
'bg_footer_color'=>'#333333',
'color_footer_text_title'=>'#fff',
'color_footer_text'=>'#9b9999',
'search_style'=>'3',
'search_sidebar'=>'0',
'search_template'=>'medium',
'search_number_column'=>'',
'search_posts_per_paged'=>'10',
'search_is_show_thumbnail'=>'image',
'search_is_show_breadcrumb'=>'1',
'search_is_show_excerpt'=>'1',
'search_excerpt_length'=>'30',
'search_is_show_navi'=>'number',
'search_is_show_date'=>'1',
'search_is_show_category'=>'',
'search_is_show_author'=>'1',
'search_is_show_comment'=>'',
'search_is_show_view'=>'',
'search_orderby'=>'post_date',
'search_order'=>'desc',
'blog_style'=>'3',
'blog_sidebar'=>'sidebar-default',
'blog_template'=>'box',
'blog_number_column'=>'2',
'blog_posts_per_paged'=>'6',
'blog_is_show_thumbnail'=>'image',
'blog_is_show_breadcrumb'=>'1',
'blog_is_show_excerpt'=>'1',
'blog_excerpt_length'=>'30',
'blog_is_show_navi'=>'number',
'blog_is_show_date'=>'1',
'blog_is_show_category'=>'0',
'blog_is_show_author'=>'1',
'blog_is_show_comment'=>'0',
'blog_is_show_view'=>'1',
'blog_orderby'=>'post_date',
'blog_order'=>'desc',
'single_style'=>'3',
'single_sidebar'=>'sidebar-default',
'single_is_show_breadcrumb'=>'1',
'single_is_show_category'=>'1',
'single_is_show_date'=>'1',
'single_is_show_author'=>'1',
'single_is_show_comment'=>'1',
'single_is_show_view'=>'1',
'single_is_show_share'=>'1',
'single_is_show_author_meta'=>'1',
'single_is_show_navi'=>'1',
'single_is_show_related'=>'1',
'list_sidebar'=>array(
array(
'sidebar'=>'Header Ads',
),
array(
'sidebar'=>'Header Ads 02',
)),
'translate_header'=>'',
'search'=>'',
'followers'=>'',
'likes'=>'',
'subscriber'=>'',
'comment'=>'',
'leave_a_comment'=>'',
'sent_comment'=>'',
'your_message'=>'',
'name'=>'',
'email'=>'',
'website'=>'',
'related_posts'=>'',
'share_this'=>'',
'was_this_post_helpful'=>'',
'breaking'=>'',
'menu'=>'',
'error_404'=>'',
'page_not_found'=>'',
'please_back_home'=>'',
'go_home'=>'',
'posts_by'=>'',
'daily_archives'=>'',
'monthly_archives'=>'',
'yearly_archives'=>'',
'search_results'=>'',
'search_not_happy'=>'',
'query_not_found'=>'',
'website-font'=>array(
),
'headline1_custom'=>array(
),
'headline2_custom'=>array(
),
'headline3_custom'=>array(
),
'headline4_custom'=>array(
),
'headline5_custom'=>array(
),
'headline6_custom'=>array(
),
'socials_header'=>'',
'social_facebook'=>'https://www.facebook.com/mojomarketplace',
'social_twitter'=>'https://twitter.com/mojomarketplace',
'social_youtube'=>'https://www.youtube.com/channel/UC5BpiUsziG6gqlQ3jQaU2TA',
'social_soundcloud'=>'',
'social_google_plus'=>'',
'social_instagram'=>'',
'des_seo'=>'',
'keywords_seo'=>'',
'author_seo'=>'',
'css_custom'=>'.top-header .list-adv { text-align: right; }',
		);
		
		// Update Option
		foreach($rs_options as $name => $value){
			update_option('rs-' . $name,$value);
		}
		update_option('show_on_front','page');
		
		// Update Menu Location
		$locations = array();
		$menu_location = array ( 
			"footer-menu" => "menu-footer",
			"primary" => "main-menu"
		);
		foreach($menu_location as $key=>$menu) {
			$term = get_term_by('slug', $menu, 'nav_menu');
			$locations[$key] = $term->term_id;
		}
		set_theme_mod('nav_menu_locations', $locations);
		
    }
}
