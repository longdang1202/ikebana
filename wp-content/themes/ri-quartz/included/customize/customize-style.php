<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
if(!function_exists('rit_customizer_css')){
    function rit_customizer_css() { ?>
        <style type="text/css">
            <?php
                $rit_custom_color = get_theme_mod('rit_accent_color', '#ff9248');
                $rit_accent_color_2 = get_theme_mod('rit_accent_color_2', '#ff6600');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_primary_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_primary_color', true) != '#'){
                        $rit_custom_color = get_post_meta(get_the_ID(), 'rit_custom_primary_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_primary_color_2', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_primary_color_2', true) != '#'){
                        $rit_accent_color_2 = get_post_meta(get_the_ID(), 'rit_custom_primary_color_2', true);
                    }
                }
                $_rit_accent_color = ri_quartz_hex2rgba($rit_custom_color);
            ?>
            <?php
                $font_body = $font_menu = $font_heading = '';

                $google_body_default = array(
                'family' => 'Lato',
                'variants' => array('300','400','700', '900'),
                'subsets' => array('latin')
                );
                $google_menu_default = array(
                    'family' => 'Montserrat',
                    'variants' => array('400','700'),
                    'subsets' => array('latin')
                );
                $google_heading_default = array(
                    'family' => 'Montserrat',
                    'variants' => array('400','700'),
                    'subsets' => array('latin')
                );

                $google_body = json_decode(get_theme_mod('rit_body_font_google', json_encode($google_body_default)), true);
                $google_menu = json_decode(get_theme_mod('rit_menu_font_google', json_encode($google_menu_default)), true);
                $google_heading = json_decode(get_theme_mod('rit_heading_font_google', json_encode($google_heading_default)), true);
                if(get_theme_mod('rit_body_font_select', 'google') == 'standard'){
                    $font_body = get_theme_mod('rit_body_font_standard', 'Arial');
                } else {
                    if(isset($google_body['family'])){
                        $font_body = $google_body['family'];
                    }
                }
                if(get_theme_mod('rit_menu_font_select', 'google') == 'standard'){
                    $font_menu = get_theme_mod('rit_menu_font_standard', 'Arial');
                } else {
                    if(isset($google_menu['family'])){
                        $font_menu = $google_menu['family'];
                    }
                }
                if(get_theme_mod('rit_heading_font_select', 'google') == 'standard'){
                    $font_heading = get_theme_mod('rit_heading_font_standard', 'Arial');
                } else {
                    if(isset($google_heading['family'])){
                        $font_heading = $google_heading['family'];
                    }
                }
            ?>

            body,
            #rit-masonry-filter li,
            .rit-portfolio-content .rit-cat,
            .custom-text,
            .position,
            .content-grid .entry-content p,
            .image-hover-caption h4,
            .rit-promotion-wrap .widget-title,
            .site-footer .widget-title,
            .rit-tab-title ul li a,
            .content-grid .entry-title,
            .vc_tta.vc_general .vc_tta-panel-title,
            .post-author h5, .post-related h5, .comments-area h5,
            .rit-tab-title-inner h4,
            .rit-list-title-layout,
            .rit-list-title-layout h6,
            .rit-list-cat-title h4,
            .inner-block-bottom,
            .inner-block-bottom .box-heading h2,
            .rit-list-item h3,
            .style-icon-title .rit-icon-box-item h6{
                font-family: "<?php echo esc_attr($font_body); ?>";
            }

            #main-navigation{
                font-family: "<?php echo esc_attr($font_menu); ?>";
            }

            .rit-heading,
            .feat-text .feat-title,
            .rit-element-title,
            .rit-tab-title,
            .style-3 .image-hover-inner .content h4,
            .woocommerce-result-count, .ordering,
            .selectBox-dropdown-menu.orderby-selectBox-dropdown-menu li a,
            .product-label,
            .price,
            .quantity #qty,
            .header-action .rit-drop-wrap,
            .rit-text-button .rit-text,
            .tparrows.special span:before,
            .slicknav_nav a,
            h1, h2, h3, h4, h5, h6,
            .rit-portfolio-masonry #rit-masonry-filter li,
            .wpcf7 .wpcf7-submit,
            .work-hour span,
            .rit-cover-wrap .rit-cover-title .h1,
            .image-hover-caption a,
            .footer-widget-special a.view-map,
            .footer-widget-special a.make-questions,
            .rit-ajax-load a,
            .box-contact span.contact-info,
            .site-footer.footer-9 .link li a,
            .contact-info-content .info-value,
            .vertical-menu-title span,
            .header-4 .header-action span,
            .product-action-bottom > .button.add_to_cart_button,
            .product-action-bottom > a.added_to_cart,
            .product-action-bottom > .product_type_variable,
            .summary .details-action button[class*="add_to_cart"],
            .layout-4 .rit-tab-title ul li a{
                font-family: "<?php echo esc_attr($font_heading); ?>";
            }

            h1 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h1', '36')) . 'px' ?>;
            }

            h2 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h2', '30')) . 'px' ?>;
            }

            h3 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h3', '24')) . 'px' ?>;
            }

            h4 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h4', '22')) . 'px' ?>;
            }

            h5 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h5', '20')) . 'px' ?>;
            }

            h6 {
                font-size: <?php echo esc_attr(get_theme_mod('rit_font_size_h6', '18')) . 'px' ?>;
            }

            .se-pre-con .loader::before{
                border-color: <?php echo esc_attr($rit_custom_color); ?> rgba(<?php echo esc_attr($_rit_accent_color[0]); ?>, <?php echo esc_attr($_rit_accent_color[1]); ?>, <?php echo esc_attr($_rit_accent_color[2]); ?>, 0.2) rgba(<?php echo esc_attr($_rit_accent_color[0]); ?>, <?php echo esc_attr($_rit_accent_color[1]); ?>, <?php echo esc_attr($_rit_accent_color[2]); ?>, 0.2);
            }

            <?php // ---------  Accent Color ------------ // ?>
            .content-grid .entry-title a:hover,
            .content-grid .article-meta a:hover,
            .content-grid .article-meta a:hover i,
            .rit-news-info .info-cat a,
            .rit-news-info .info-author a,
            .share-links ul li a:hover,
            .entry-content .rit-member-item .rit-social ul li a:hover,
            .footer-widget-special [class*="icon_"],
            .site-footer.footer-8 #coppy-right a i,
            .site-footer.footer-10 #coppy-right a i,
            .rit-ajax-load li a.rit-selected,
            .rit-title-left #rit-masonry-filter li.active,
            .rit-title-left #rit-masonry-filter li:hover,
            .box-contact .icon,
            .site-footer.footer-style-aceentbrownblack #coppy-right a:hover,
            .portfolio-information .item-label i,
            .breadcrumbs span span,
            .rit-events-type-item .rit-events-type-info ul li,
            .contact-info-content .info-label,
            .site-footer.footer-style-darkbrown .widget-title,
            .header-action span,
            .header-action span a,
            .product-action-item,
            .price,
            li.product .product-details h3 a:hover,
            .rit-element-has-border .owl-theme .owl-controls .owl-buttons div:hover,
            .rit-icon-box-item .icon > *,
            .rit-search .icon-search,
            .layout-2 .owl-theme .owl-controls .owl-buttons div:hover,
            .element-thumnail-content h3 span,
            #main-navigation .sub-menu li a:hover,
            #main-navigation .children li a:hover,
            .mobile-menu .sub-menu li a:hover,
            .mobile-menu .children li a:hover,
            .widget_categories ul li,
            .widget_archive ul li,
            .widget_meta ul li,
            .product-categories li:hover > .count,
            .product-categories li:hover > a,
            .product-categories li.current-cat > .count,
            .product-categories li.current-cat > a,
            .quantity .items-count:hover,
            .footer-2 .contact-info i,
            .rit-button[class*="-light-accent"],
            blockquote::before,
            .summary .product_meta > span a:hover,
            .woocommerce-cart .rit-checkout-breadcrumb .title-cart,
            .woocommerce-checkout:not(.woocommerce-order-received) .rit-checkout-breadcrumb .title-checkout,
            .woocommerce-order-received .rit-checkout-breadcrumb .title-thankyou,
            .rit-login-checkout a, .rit-coupon-checkout a{
                color: <?php echo esc_attr($rit_custom_color); ?>;
            }
            .accent, .accent-color{
                color: <?php echo esc_attr($rit_custom_color); ?> !important;
            }
            .rit-news-info .info-cat a,
            .rit-loader-wrap .icon-spin,
            .site-footer.footer-1 .newsletter-widget:focus,
            .site-footer.footer-1 .newsletter-widget.focused,
            .focused input[type="text"],
            .focused input[type="email"],
            .focused input[type="url"],
            .focused input[type="tel"],
            .focused input[type="password"],
            .focused input[type="search"],
            .focused textarea,
            .content-grid .style-1 .post-image,
            .content-grid .style-2 .post-image,
            .portfolio-action a:hover,
            .parralax-testimonials_type .rit-parallax-wrap .owl-theme .owl-controls .owl-page.active,
            .site-footer.footer-style-darkbrown .widget .view-map:hover,
            .rit-button-accent,
            .rit-element-title,
            .rit-button[class*="-gray"]:hover,
            .pagination a:hover, .pagination span.current,
            .tagcloud a:hover, .tags-wrap a:hover,
            blockquote,
            .rit-next-prev-product i:hover,
            .woocommerce a.remove:hover,
            .rit-button.rit-button-checkout{
                border-color: <?php echo esc_attr($rit_custom_color); ?>;
            }
            .style-horizontal-3 .rit-icon-box-item:hover .icon,
            .rit-button-gray:hover{
                border-color: <?php echo esc_attr($rit_custom_color); ?> !important;
            }
            .testimonial-item-boxed::after{
                border-color: transparent <?php echo esc_attr($rit_custom_color); ?> <?php echo esc_attr($rit_custom_color); ?> transparent;
            }
            .vc_tta-container > h2:before{
                border-bottom-color: <?php echo esc_attr($rit_custom_color); ?>;
            }

            .footer-widget-special .newsletter-submit,
            .rit-element-contact-inner,
            .portfolio-action a:hover,
            .testimonial-item-boxed:after,
            .portfolio-single-image .bx-wrapper .bx-controls-direction a:hover,
            .owl-theme .owl-controls .owl-buttons div:hover,
            .product-action-item:hover,
            .product-action-item[id*="rit-quickview-"]:hover,
            .product-action-bottom > .add_to_cart_button,
            .product-action-bottom > .product_type_variable,
            .product-action-bottom > a.added_to_cart,
            .item-border .border-scale:before,
            .item-border .border-scale:after,
            .item-border figure:before,
            .item-border figure:after,
            .site-footer .newsletter-submit,
            #back-to-top i,
            .vertical-menu-title,
            .cart-title,
            .rit-element-title span,
            .vc_tta-container > h2,
            .vc_tta.vc_tta-accordion.vc_tta-color-grey .vc_active .vc_tta-controls-icon-position-left .vc_tta-controls-icon,
            .vc_tta-container > h2:after,
            #mega-menu-wrap-vertical #mega-menu-vertical a.rit-button,
            #mega-menu-wrap-vertical-2 #mega-menu-vertical-2 a.rit-button,
            #mega-menu-wrap-vertical-3 #mega-menu-vertical-3 a.rit-button,
            #mega-menu-wrap-vertical-4 #mega-menu-vertical-4 a.rit-button,
            .layout-2 .rit-element-title,
            .style-horizontal-3 .rit-icon-box-item:hover .icon,
            .header-4 .cart-title i,
            .rit-button-accent,
            .rit-button[class*="-gray"]:hover,
            .pagination a:hover, .pagination span.current,
            .search-form input[type="submit"],
            .widget .search-form input[type="submit"],
            .tagcloud a:hover,
            .comments-area input[type="submit"],
            .post-password-form input[type="submit"],
            .wpcf7 .wpcf7-submit,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce #respond input#submit,
            .woocommerce a.button,
            .woocommerce button.button,
            .woocommerce input.button,
            .widget_shopping_cart .rit-shopping-cart .rit-button,
            .woocommerce-pagination li a.next,
            .woocommerce-pagination li a.prev,
            .single-product.woocommerce .product-details-image .thumbnails #slider-prev:hover,
            .single-product.woocommerce .product-details-image .thumbnails #slider-next:hover,
            .layout-4 .rit-tab-title ul li a:hover,
            .layout-4 .rit-tab-title ul li a.active,
            .site-footer.footer-2 .widget .rit-social a:hover,
            .style-icon-title .rit-icon-box-item .icon,
            .header-6 .cart-title small,
            .rit-button[class*="-light-accent"]:hover,
            .typo li::before,
            .rit-next-prev-product i:hover,
            .woocommerce a.remove:hover,
            .rit-button.rit-button-checkout{
                background-color: <?php echo esc_attr($rit_custom_color); ?>
            }
            .style-suspensory .rit-element-title{
                background-color: rgba(<?php echo esc_attr($_rit_accent_color[0] - 14); ?>, <?php echo esc_attr($_rit_accent_color[1] - 14); ?>, <?php echo esc_attr($_rit_accent_color[2] - 14); ?>, 1);
            }
            .style-suspensory .wpcf7 input[type="text"],
            .style-suspensory .wpcf7 input[type="email"],
            .style-suspensory .wpcf7 input[type="url"],
            .style-suspensory .wpcf7 input[type="tel"],
            .style-suspensory .wpcf7 input[type="password"],
            .style-suspensory .wpcf7 input[type="search"],
            .style-suspensory .wpcf7 textarea,
            .style-suspensory .wpcf7 .wpcf7-submit{
                box-shadow: 0 5px 0 0 rgba(<?php echo esc_attr($_rit_accent_color[0] - 14); ?>, <?php echo esc_attr($_rit_accent_color[1] - 14); ?>, <?php echo esc_attr($_rit_accent_color[2] - 14); ?>, 1);
            }
            .bg-accent{
                background-color: <?php echo esc_attr($rit_custom_color); ?> !important;
            }
            .slider-boxed .feat-cat a, .content-grid .post-cat a, .content-grid .post-cat{ color: <?php echo esc_attr($rit_custom_color); ?>; }
            .slider-boxed .feat-overlay .feat-cat{ border-bottom: 1px solid <?php echo esc_attr($rit_custom_color); ?>; }

            <?php // ---------  Accent Color 2 ------------ // ?>
            .product-action-bottom > .add_to_cart_button:hover,
            .summary .details-action button[class*="add_to_cart"]:hover,
            .product-action-bottom > .product_type_variable:hover,
            .cart-title i, .site-footer .newsletter-submit:hover{
                background-color: <?php echo esc_attr($rit_accent_color_2); ?>;
            }
            .vc_custom_heading strong{
                color: <?php echo esc_attr($rit_accent_color_2); ?>;
            }
            <?php // --------- // Accent Color 2 ------------ // ?>
            a{ color: <?php echo esc_attr(get_theme_mod('rit_body_link_color', '#353535')); ?>; }
            a:hover, a.active, .testimonial-item .rit-social ul li a:hover{ color: <?php echo esc_attr(get_theme_mod('rit_body_link_hover_color', '#ff9248')); ?>; }
            h1{ color: <?php echo esc_attr(get_theme_mod('rit_body_h1_color', '#353535')); ?>; }
            h2{ color: <?php echo esc_attr(get_theme_mod('rit_body_h2_color', '#353535')); ?>; }
            h3,
            .woocommerce-tabs .tabs .active a{ color: <?php echo esc_attr(get_theme_mod('rit_body_h3_color', '#353535')); ?>; }
            h4{ color: <?php echo esc_attr(get_theme_mod('rit_body_h4_color', '#353535')); ?>; }
            h5{ color: <?php echo esc_attr(get_theme_mod('rit_body_h5_color', '#353535')); ?>; }
            h6{ color: <?php echo esc_attr(get_theme_mod('rit_body_h6_color', '#353535')); ?>; }

            <?php // ---------  Body ------------ // ?>
            body{
                color: <?php echo esc_attr(get_theme_mod('rit_body_text_color', '#7d7d7d')); ?>;
            }
            .woocommerce-tabs .tabs .active a{
                border-color: <?php echo esc_attr(get_theme_mod('rit_body_h3_color', '#353535')); ?>;
            }
            <?php
                $rit_custom_bg_body = get_theme_mod('rit_custom_bg_body', '#ffffff');
                $bg_body_image = get_theme_mod('rit_body_bg_image', '');
                $rit_bg_body_repeat = get_theme_mod('rit_bg_body_repeat', 'no-repeat');
                $rit_bg_body_size = get_theme_mod('rit_bg_body_size', 'cover');
                $rit_bg_body_attachment = get_theme_mod('rit_bg_body_attachment', 'fixed');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_bg_body', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_bg_body', true) != '#'){
                        $rit_custom_bg_body = get_post_meta(get_the_ID(), 'rit_custom_bg_body', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_bg_body_image', true) != ''){
                        $bg_body_image = wp_get_attachment_thumb_url(get_post_meta(get_the_ID(), 'rit_bg_body_image', true));
                    }
                    if(get_post_meta(get_the_ID(), 'rit_bg_body_repeat', true) != '' && get_post_meta(get_the_ID(), 'rit_bg_body_repeat', true) != 'default'){
                        $rit_bg_body_repeat = get_post_meta(get_the_ID(), 'rit_bg_body_repeat', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_bg_body_size', true) != '' && get_post_meta(get_the_ID(), 'rit_bg_body_size', true) != 'default'){
                        $rit_bg_body_size = get_post_meta(get_the_ID(), 'rit_bg_body_size', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_bg_body_attachment', true) != '' && get_post_meta(get_the_ID(), 'rit_bg_body_attachment', true) != 'default'){
                        $rit_bg_body_attachment = get_post_meta(get_the_ID(), 'rit_bg_body_attachment', true);
                    }
                }
            ?>
            body{
                font-size: <?php echo esc_attr(get_theme_mod('rit_enable_body_font_size', '14')); ?>px;
                line-height: <?php echo esc_attr(get_theme_mod('rit_enable_bodyline_height', '20')); ?>px;
                background-color: <?php echo esc_attr($rit_custom_bg_body); ?>;
            <?php if($bg_body_image != ''){ ?>
                background-image: url(<?php echo esc_url($bg_body_image); ?>);
                background-repeat: <?php echo esc_attr($rit_bg_body_repeat); ?>;
                background-size: <?php echo esc_attr($rit_bg_body_size); ?>;
                background-attachment: <?php echo esc_attr($rit_bg_body_attachment); ?>;
            <?php } ?>
            }

            <?php // ---------  Header Top ------------ // ?>
            <?php
                $rit_header_top_border_color = '';
                $rit_header_top_bg_image = get_theme_mod('rit_header_top_bg_image', '');
                $rit_header_top_bg_repeat = get_theme_mod('rit_header_top_bg_repeat', 'repeat-x');
                $rit_header_top_bg_size = get_theme_mod('rit_header_top_bg_size', 'auto');
                $rit_header_top_bg_color = get_theme_mod('rit_header_top_bg_color', '#ffffff');
                $rit_header_top_color = get_theme_mod('rit_header_top_color', '#000000');
                $rit_header_top_link_color = get_theme_mod('rit_header_top_link_color', '#999999');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_htop_bg_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_htop_bg_color', true) != '#'){
                        $rit_header_top_bg_color = get_post_meta(get_the_ID(), 'rit_custom_htop_bg_color', true);
                        $rit_header_top_border_color = get_post_meta(get_the_ID(), 'rit_custom_htop_bg_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_htop_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_htop_color', true) != '#'){
                        $rit_header_top_color = get_post_meta(get_the_ID(), 'rit_custom_htop_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_htop_link_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_htop_link_color', true) != '#'){
                        $rit_header_top_link_color = get_post_meta(get_the_ID(), 'rit_custom_htop_link_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_htop_bg_img', true) != ''){
                        $rit_header_top_bg_image = wp_get_attachment_url(get_post_meta(get_the_ID(), 'rit_custom_htop_bg_img', true));
                    }
                }
            ?>
            .site-header .rit-header-top{
                background-color: <?php echo esc_attr($rit_header_top_bg_color) ?>;
                <?php if($rit_header_top_bg_image != '') { ?>
                background-image: url(<?php echo esc_url($rit_header_top_bg_image); ?>);
                background-repeat: <?php echo esc_attr($rit_header_top_bg_repeat); ?>;
                background-size: <?php echo esc_attr($rit_header_top_bg_size); ?>;
                <?php } ?>
                <?php if($rit_header_top_border_color != '') { ?>
                border-color: <?php echo esc_attr($rit_header_top_border_color); ?>;
                <?php } ?>
            }
            <?php if($rit_header_top_bg_image != '') { ?>
            .rit-header-top [class*="border-"], .rit-header-top{
                border-color: transparent;
            }
            <?php } ?>
            .site-header .rit-header-top,
            .site-header .rit-header-top p,
            .site-header .rit-header-top span{
                color: <?php echo esc_attr($rit_header_top_color) ?>;
            }
            .site-header .rit-header-top a{
                color: <?php echo esc_attr($rit_header_top_link_color) ?>;
            }
            .site-header .rit-header-top a:hover, .site-header.header-4 .rit-top-link a:hover, .site-header.header-3 .rit-top-link a:hover{
                color: <?php echo esc_attr(get_theme_mod('rit_header_top_link_hover_color', '#ff9248')) ?>;
            }
            .site-header .rit-promotion-wrap a, .site-header .rit-top-link a:hover{
                color: <?php echo esc_attr($rit_header_top_color) ?>;
            }

            <?php // ---------  Header ------------ // ?>
            .site-header{
                background-color: <?php echo esc_attr(get_theme_mod('rit_header_background_color', '#ffffff')); ?>;
                color: <?php echo esc_attr(get_theme_mod('rit_header_text_color', '#ffffff')); ?>;
            }
            .site-header a, .menu-wrap i, .menu-toggle i, .header-4 .cart-title span{ color: <?php echo esc_attr(get_theme_mod('rit_header_link_color', '#ffffff')); ?>; }
            .site-header a:hover{ color: <?php echo esc_attr(get_theme_mod('rit_header_link_hover_color', '#353535')); ?>; }

            <?php // ---------  Main Navigation ------------ // ?>
            #main-navigation li a,
            .mobile-menu-content .rit-top-link li a,
            .mobile-menu li a{
                font-size: <?php echo esc_attr(get_theme_mod('rit_enable_menu_font_size', '12')); ?>px;
                color: <?php echo esc_attr(get_theme_mod('rit_nav_link_color', '')); ?>
            }
            #main-navigation li a:hover,
            #main-navigation li.current-menu-item a,
            .mobile-menu li > a:hover,
            .mobile-menu-content .rit-top-link li a:hover,
            .mobile-menu li.current-menu-item > a{
                color: <?php echo esc_attr(get_theme_mod('rit_nav_link_hover_color', '#ffffff')); ?>
            }

            <?php // ----------- Header Bottom ------------ ?>
            <?php
                $rit_header_botton_bg_color = get_theme_mod('rit_header_botton_bg_color', '#181818');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_hbottom_bg_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_hbottom_bg_color', true) != '#'){
                        $rit_header_botton_bg_color = get_post_meta(get_the_ID(), 'rit_custom_hbottom_bg_color', true);
                    }
                }
            ?>
            .rit-header-bottom{
                background-color: <?php echo esc_attr($rit_header_botton_bg_color); ?>;
            }

            <?php // ---------  Logo ------------ // ?>
            <?php
                $rit_logo_top_spacing = get_theme_mod('rit_logo_top_spacing', '0');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_logo_top_spacing', true) != ''){
                        $rit_logo_top_spacing = get_post_meta(get_the_ID(), 'rit_logo_top_spacing', true);
                    }
                }
            ?>
            #logo,
            #logo-retina{
                padding-top: <?php echo esc_attr($rit_logo_top_spacing); ?>px;
                padding-bottom: <?php echo esc_attr(get_theme_mod('rit_logo_bottom_spacing', '0')); ?>px;
            }
            @media only screen and (max-width: 767px) {
                #logo, #logo-retina{
                    padding-top: <?php echo esc_attr(get_theme_mod('rit_logo_top_spacing', '0')); ?>px;
                }
            }
            #logo img{
                max-height: <?php echo esc_attr(get_theme_mod('rit_logo_height', '')); ?>px;
            }
            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi) {
                #logo-retina img{
                    max-height: <?php echo esc_attr(get_theme_mod('rit_logo_retina_height', '40')); ?>px;
                }
            }

            <?php // ---------  Custom Menu Color ------------ // ?>
            <?php
                $rit_custom_item_bg_color = $rit_custom_item_menu_color = $rit_custom_item_bg_hover_color = $rit_custom_item_menu_hover_color = '';
                if(!is_404()){
                    $rit_custom_item_bg_color = get_post_meta(get_the_ID(), 'rit_custom_item_bg_color', true);
                    $rit_custom_item_menu_color = get_post_meta(get_the_ID(), 'rit_custom_item_menu_color', true);
                    $rit_custom_item_bg_hover_color = get_post_meta(get_the_ID(), 'rit_custom_item_bg_hover_color', true);
                    $rit_custom_item_menu_hover_color = get_post_meta(get_the_ID(), 'rit_custom_item_menu_hover_color', true);
                }
            ?>
            <?php if($rit_custom_item_bg_color != '' && $rit_custom_item_bg_color != '#'){ ?>
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link{background-color: <?php echo esc_attr($rit_custom_item_bg_color); ?>}
            <?php } ?>
            <?php if($rit_custom_item_menu_color != '' && $rit_custom_item_menu_color != '#'){ ?>
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link, .header-4 .header-action span,
            .header-6.position-absolute .search-click i,
            .header-6.position-absolute .cart-title,
            .header-6.position-absolute .cart-title i{color: <?php echo esc_attr($rit_custom_item_menu_color); ?>}
            <?php } ?>
            <?php if($rit_custom_item_bg_hover_color != '' && $rit_custom_item_bg_hover_color != '#'){ ?>
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:hover,
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:focus,
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:active{background-color: <?php echo esc_attr($rit_custom_item_bg_hover_color); ?>}
            <?php } ?>
            <?php if($rit_custom_item_menu_hover_color != '' && $rit_custom_item_menu_hover_color != '#'){ ?>
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:hover,
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:focus,
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:active{color: <?php echo esc_attr($rit_custom_item_menu_hover_color); ?>}
            <?php } ?>

            <?php // ---------  Page content ------------ // ?>
            <?php
                $rit_page_background_color = get_theme_mod('rit_page_background_color', '#fff');
                $rit_page_bg = get_theme_mod('rit_page_bg', '');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_page_bg_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_page_bg_color', true) != '#'){
                        $rit_page_background_color = get_post_meta(get_the_ID(), 'rit_custom_page_bg_color', true);
                    }
                }
            ?>
            .site-content{
                background-color: <?php echo esc_url($rit_page_background_color); ?>;
            }
            .entry-content p, .entry-content ul li, .contact-section a{
                color: <?php echo esc_attr(get_theme_mod('rit_page_text_color', '#333333')); ?>;
            }

            <?php // ---------  Footer ------------ // ?>
            <?php
                $rit_footer_background_color = get_theme_mod('rit_footer_background_color', '#ffffff');
                $rit_footer_text_color = get_theme_mod('rit_footer_text_color', '#ffffff');
                $rit_footer_link_color = get_theme_mod('rit_footer_link_color', '#ffffff');
                $rit_footer_link_hover_color = get_theme_mod('rit_footer_link_hover_color', '#ffffff');
                $rit_footer_title_color = get_theme_mod('rit_footer_title_color', '#ffffff');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_footer_bg_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_footer_bg_color', true) != '#'){
                        $rit_footer_background_color = get_post_meta(get_the_ID(), 'rit_custom_footer_bg_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_footer_text_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_footer_text_color', true) != '#'){
                        $rit_footer_text_color = get_post_meta(get_the_ID(), 'rit_custom_footer_text_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_footer_link_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_footer_link_color', true) != '#'){
                        $rit_footer_link_color = get_post_meta(get_the_ID(), 'rit_custom_footer_link_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_footer_link_hover_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_footer_link_hover_color', true) != '#'){
                        $rit_footer_link_hover_color = get_post_meta(get_the_ID(), 'rit_custom_footer_link_hover_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_footer_widget_title_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_footer_widget_title_color', true) != '#'){
                        $rit_footer_title_color = get_post_meta(get_the_ID(), 'rit_custom_footer_widget_title_color', true);
                    }
                }
            ?>
            .site-footer{
                background-color: <?php echo esc_attr($rit_footer_background_color); ?>;
            }
            .site-footer{
                color: <?php echo esc_attr($rit_footer_text_color); ?>;
            }
            .site-footer .widget-title{
                color: <?php echo esc_attr($rit_footer_title_color); ?>;
            }
            .site-footer.footer-2 .newsletter-submit{
                background-color: <?php echo esc_attr($rit_footer_title_color); ?>;
            }
            .site-footer .links li a:before{
                background-color: <?php echo esc_attr($rit_footer_link_color); ?>;
            }
            .site-footer.footer-2 .widget .rit-social a{
                background-color: <?php echo esc_attr($rit_footer_title_color); ?>;
                color: #fff;
            }
            .site-footer a,
            .site-footer .contact-info, .widget_newsletterwidget{ color: <?php echo esc_attr($rit_footer_link_color); ?>; }
            .site-footer a:hover{ color: <?php echo esc_attr($rit_footer_link_hover_color); ?>; }
            .site-footer .links li a:hover:before{
                background-color: <?php echo esc_attr($rit_footer_link_hover_color); ?>;
            }

            <?php // ---------  Product ------------ // ?>
            .label-sale{
                background-color: <?php echo esc_attr(get_theme_mod('rit_label_sale_background_color', '#ff9933')); ?>;
                color: <?php echo esc_attr(get_theme_mod('rit_label_sale_color', '#ffffff')); ?>;
            }
            .label-new,
            .product-action-item[id*="rit-quickview-"]{
                background-color: <?php echo esc_attr(get_theme_mod('rit_label_new_background_color', '#99cc00')); ?>;
                color: <?php echo esc_attr(get_theme_mod('rit_label_new_color', '#ffffff')); ?>;
            }

            <?php // ---------  Coppy Right ------------ // ?>
            <?php
                $rit_copyright_bg_color = get_theme_mod('rit_copyright_bg_color', '#2e2e2e');
                $rit_copyright_text_color = get_theme_mod('rit_copyright_text_color', '#999999');
                $rit_copyright_link_color = get_theme_mod('rit_copyright_link_color', '#ffffff');
                $rit_copyright_link_hover_color = get_theme_mod('rit_copyright_link_hover_color', '#ff9248');
                if(!is_404()){
                    if(get_post_meta(get_the_ID(), 'rit_custom_copyright_bg_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_copyright_bg_color', true) != '#'){
                        $rit_copyright_bg_color = get_post_meta(get_the_ID(), 'rit_custom_copyright_bg_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_copyright_text_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_copyright_text_color', true) != '#'){
                        $rit_copyright_text_color = get_post_meta(get_the_ID(), 'rit_custom_copyright_text_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_copyright_link_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_copyright_link_color', true) != '#'){
                        $rit_copyright_link_color = get_post_meta(get_the_ID(), 'rit_custom_copyright_link_color', true);
                    }
                    if(get_post_meta(get_the_ID(), 'rit_custom_copyright_link_hover_color', true) != '' && get_post_meta(get_the_ID(), 'rit_custom_copyright_link_hover_color', true) != '#'){
                        $rit_copyright_link_hover_color = get_post_meta(get_the_ID(), 'rit_custom_copyright_link_hover_color', true);
                    }
                }
            ?>
            #coppy-right{
                background-color: <?php echo esc_attr($rit_copyright_bg_color); ?>;
                color: <?php echo esc_attr($rit_copyright_text_color); ?>;
            }
            #coppy-right .links-horizontal li a{
                color: <?php echo esc_attr($rit_copyright_text_color); ?>;
            }
            #coppy-right a{ color: <?php echo esc_attr($rit_copyright_link_color); ?>; }
            #coppy-right a:hover, #coppy-right .links-horizontal li a:hover{ color: <?php echo esc_attr($rit_copyright_link_hover_color); ?>; }

            <?php // ---------  Custom Style ------------ // ?>
            <?php if(get_theme_mod( 'rit_custom_css' )) : ?>
            <?php echo get_theme_mod( 'rit_custom_css' ); ?>
            <?php endif; ?>

        </style>
        <?php
    }

    add_action( 'wp_head', 'rit_customizer_css' );
}

?>