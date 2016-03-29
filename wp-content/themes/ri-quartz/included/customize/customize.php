<?php
// Customize
if (class_exists('RIT_Customize')) {
    if(!function_exists('rit_customize')){
        function rit_customize()
        {
            $rit_customize = RIT_Customize::getInstance();

            $customizers = array(
                'rit_new_section_export_import' => array(
                    'title' => esc_html(__('Export/Import', 'ri-quartz')),
                    'priority' => 100,
                    'settings' => array(
                        'rit-setting' => array(
                            'class' => 'cei',
                            'priority' => 1
                        )
                    ),
                ),
                'rit_new_section_sidebar' => array(
                    'title' => esc_html(__('Sidebar Options', 'ri-quartz')),
                    'description' => '',
                    'priority' => 3,
                    'settings' => array(
                        'rit_sidebar_layout' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Sidebar Layout', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => array(
                                'style-1' => esc_html(__('Style 1', 'ri-quartz')),
                                'style-2' => esc_html(__('Style 2', 'ri-quartz')),
                                'style-3' => esc_html(__('Style 3', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'style-1',
                            ),
                        ),
                        'rit_default_sidebar' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Sidebar Config', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => array(
                                'no-sidebar' => esc_html(__('No Sidebar', 'ri-quartz')),
                                'left-sidebar' => esc_html(__('Left Sidebar', 'ri-quartz')),
                                'right-sidebar' => esc_html(__('Right Sidebar', 'ri-quartz')),
                                'both-sidebar' => esc_html(__('Both Sidebar', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'no-sidebar',
                            ),
                        ),
                        'rit_default_left_sidebar' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Left Sidebar', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => ri_quartz_sidebar(),
                            'params' => array(
                                'default' => 'sidebar-1',
                            ),
                        ),
                        'rit_default_right_sidebar' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Right Sidebar', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => ri_quartz_sidebar(),
                            'params' => array(
                                'default' => 'sidebar-1',
                            ),
                        )
                    )
                ),
                'rit_new_section_meta' => array(
                    'title' => esc_html(__('Default Meta Options', 'ri-quartz')),
                    'description' => '',
                    'priority' => 3,
                    'settings' => array(
                        'rit_default_layout' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Post Layout', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => array(
                                'full' => esc_html(__('Full', 'ri-quartz')),
                                'grid' => esc_html(__('Grid', 'ri-quartz')),
                                'list' => esc_html(__('List', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'full',
                            ),
                        ),
                        'rit_enable_page_heading' => array(
                            'type' => 'checkbox',
                            'label' => esc_html(__('Default Show Page Heading', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0
                        ),
                        'rit_enable_place_holder' => array(
                            'type' => 'checkbox',
                            'label' => esc_html(__('Enable place holder', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'params' => array(
                                'default' => '1',
                            ),
                        )
                    )
                ),

                'rit_new_section_woo' => array(
                    'title' => esc_html(__('Woocommerce Options', 'ri-quartz')),
                    'description' => '',
                    'priority' => 5,
                    'settings' => array(
                        'rit_heading_woo_genaral' => array(
                            'class' => 'heading',
                            'label' => esc_html(__('General', 'ri-quartz')),
                            'priority' => 0
                        ),
                        'rit_woo_label_sale' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Label Sale Mode', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => array(
                                'percent' => esc_html(__('Percent', 'ri-quartz')),
                                'text' => esc_html(__('Text', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'percent',
                            ),
                        ),
                        'rit_heading_woo_layout' => array(
                            'class' => 'heading',
                            'label' => esc_html(__('Layout', 'ri-quartz')),
                            'priority' => 0
                        ),
                        'rit_woo_layout' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Layout', 'ri-quartz')),
                            'description' => '',
                            'priority' => 0,
                            'choices' => array(
                                'left-sidebar' => esc_html(__('Left Sidebar', 'ri-quartz')),
                                'right-sidebar' => esc_html(__('Right Sidebar', 'ri-quartz')),
                                'both-sidebar' => esc_html(__('Both Sidebar', 'ri-quartz')),
                                'no-sidebar' => esc_html(__('No Sidebar', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'left-sidebar',
                            ),
                        ),
                        'rit_woo_column' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Product Columns', 'ri-quartz')),
                            'description' => '',
                            'priority' => 1,
                            'choices' => array(
                                '1' => esc_html(__('1 Column', 'ri-quartz')),
                                '2' => esc_html(__('2 Columns', 'ri-quartz')),
                                '3' => esc_html(__('3 Columns', 'ri-quartz')),
                                '4' => esc_html(__('4 Columns', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => '2',
                            ),
                        ),
                        'rit_woo_product_show' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Product Layout', 'ri-quartz')),
                            'description' => '',
                            'priority' => 1,
                            'choices' => array(
                                'list' => esc_html(__('List', 'ri-quartz')),
                                'grid' => esc_html(__('Grid', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'grid',
                            ),
                        ),

                        'rit_heading_woo_layout_details' => array(
                            'class' => 'heading',
                            'label' => esc_html(__('Layout Page Details', 'ri-quartz')),
                            'priority' => 1
                        ),
                        'rit_woo_layout_details' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Default Layout Details', 'ri-quartz')),
                            'description' => '',
                            'priority' => 1,
                            'choices' => array(
                                'left-sidebar' => esc_html(__('Left Sidebar', 'ri-quartz')),
                                'right-sidebar' => esc_html(__('Right Sidebar', 'ri-quartz')),
                                'both-sidebar' => esc_html(__('Both Sidebar', 'ri-quartz')),
                                'no-sidebar' => esc_html(__('No Sidebar', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => 'left-sidebar',
                            ),
                        ),
                        'rit_woo_column_details' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Upsell Columns', 'ri-quartz')),
                            'description' => 'Apply for upsell product',
                            'priority' => 1,
                            'choices' => array(
                                '1' => esc_html(__('1 Column', 'ri-quartz')),
                                '2' => esc_html(__('2 Columns', 'ri-quartz')),
                                '3' => esc_html(__('3 Columns', 'ri-quartz')),
                                '4' => esc_html(__('4 Columns', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => '3',
                            ),
                        ),
                        'rit_woo_column_related' => array(
                            'type' => 'select',
                            'label' => esc_html(__('Related Columns', 'ri-quartz')),
                            'description' => 'Apply for related product',
                            'priority' => 1,
                            'choices' => array(
                                '1' => esc_html(__('1 Column', 'ri-quartz')),
                                '2' => esc_html(__('2 Columns', 'ri-quartz')),
                                '3' => esc_html(__('3 Columns', 'ri-quartz')),
                                '4' => esc_html(__('4 Columns', 'ri-quartz'))
                            ),
                            'params' => array(
                                'default' => '4',
                            ),
                        ),
                        'rit_heading_woo_shop' => array(
                            'class' => 'heading',
                            'label' => esc_html(__('Shop Page', 'ri-quartz')),
                            'priority' => 2
                        ),
                        'rit_banner_woo' => array(
                            'class' => 'image',
                            'label' => esc_html(__('Banner Shop', 'ri-quartz')),
                            'description' => esc_html(__('Upload Banner Shop Image', 'ri-quartz')),
                            'priority' => 2
                        ),
                        'rit_title_shop' => array(
                            'type' => 'text',
                            'label' => esc_html(__('Title Shop', 'ri-quartz')),
                            'description' => 'Title Shop.',
                            'priority' => 3,
                            'params' => array(
                                'default' => 'IMAGE BANNER',
                            ),
                        ),
                        'rit_des_shop' => array(
                            'type' => 'textarea',
                            'label' => esc_html(__('Description Shop', 'ri-quartz')),
                            'description' => 'Description Shop.',
                            'priority' => 4,
                            'params' => array(
                                'default' => 'Hey Guys !Your image category banner Here.',
                            ),
                        ),
                    )
                )
            );
            $rit_customize->add_customize($customizers);
            $rit_customize->rit_register_theme_customizer();
        }

        add_action('customize_register', 'rit_customize');
    }
}
?>