<?php
class rs_import extends WP_Import
{
    function import_themeoption()
    {
		$rs_options = array(
		  'logo_text'=>'Bloggler',
			'logo_image'=>'',
			'favicon'=>'',
			'favicon_ipad_retina'=>'',
			'favicon_ipad'=>'',
			'favicon_iphone'=>'',
			'import_demo'=>'',
			'bg_about'=>'4',
			'name_about'=>'Hi! Im Jenn',
			'job_aubout'=>array(
			array(
			'job_name_about'=>'Photography',
			'job_link_about'=>'',
			),
			array(
			'job_name_about'=>'Design',
			'job_link_about'=>'',
			),
			array(
			'job_name_about'=>'Branding',
			'job_link_about'=>'',
			)),
			'color_sidebar'=>'#3f4446',
			'img_sidebar'=>'9',
			'tracking_code'=>'',
			'text_footer'=>'Copyright@2014',
			'column_blog'=>'1',
			'switchCategory'=>'',
			'switchDate'=>'1',
			'sorByBlog'=>'post_date',
			'sort_blog'=>'dsc',
			'column_work'=>'2',
			'sorByWorks'=>'post_date',
			'sort_work'=>'dsc',
			'detail_404'=>'
			<h4>OPS! 404 Error</h4>
			<h1>Page Not Found!</h1>
			The page you are looking for was moved, removed, renamed or might never existed.
			',
			'redirect_404'=>array(
			),
			'form_404'=>array(
			),
			'translate_header'=>'',
			'next_help_text'=>'',
			'text_contact'=>'',
			'text_about'=>'',
			'learn_more_text'=>'',
			'back_to_block_text'=>'',
			'gallery_text'=>'',
			'Categories_text'=>'',
			'Posted_by_text'=>'',
			'Posted_on_text'=>'',
			'view_more_text'=>'',
			'comments_text'=>'',
			'previous_post_text'=>'',
			'next_post_text'=>'',
			'view_next_text'=>'',
			'view_pevious_text'=>'',
			'read_more_text'=>'',
			'share_this_text'=>'',
			'theme_follow_me'=>'',
			'your_name_text'=>'',
			'your_email_text'=>'',
			'your_message_text'=>'',
			'send_it_now_text'=>'',
			'send_comment_text'=>'',
			'your_name_error_text'=>'',
			'your_email_error_text'=>'',
			'your_message_error_text'=>'',
			'your_message_succes_text'=>'',
			'google_fonts'=>'0',
			'size_fonts'=>'0',
			'line_height'=>'0',
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
			'fb_social'=>'http://facebook.com',
			'flickr_social'=>'',
			'tw_social'=>'Twitter',
			'behance_social'=>'Behance.com',
			'vimeo_social'=>'',
			'yt_social'=>'',
			'pinter_social'=>'',
			'tumblr_social'=>'',
			'google_social'=>'http://google.com',
			'dribbble_social'=>'Dribbble.com',
			'digg_social'=>'',
			'linked_social'=>'LinkedIn.com',
			'instagram_social'=>'',
			'skype_social'=>'',
			'des_seo'=>'',
			'keywords_seo'=>'',
			'author_seo'=>'',
			'css_custom'=>'',
		);
		
		foreach($rs_options as $name => $value){
			update_option('rs-' . $name,$value);
		}
		update_option('show_on_front','page');
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'page',
		);
		$posts_array = get_posts( $args );
		foreach($posts_array as $item)
			if(get_page_template_slug($item->ID) == 'template-home.php')
				update_option('page_on_front',$item->ID);
		
    }
}
