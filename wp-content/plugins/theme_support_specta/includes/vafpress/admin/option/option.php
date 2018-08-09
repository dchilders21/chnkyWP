<?php
return array(
    'title' => __( 'Specta Theme Options', BUNCH_NAME ),
    'logo' => get_template_directory_uri() . '/images/logo.png',
    'menus' => array(
        // General Settings
         array(
             'title' => __( 'General Settings', BUNCH_NAME ),
            'name' => 'general_settings',
            'icon' => 'font-awesome:fa fa-cogs',
            'menus' => array(
                 
				array(
                    'title' => __( 'general Settings', BUNCH_NAME ),
                    'name' => 'general_sub_settings',
                    'icon' => 'font-awesome:fa fa-dashboard',
                    'controls' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'preloader',
                            'label' => __( 'Preloader', BUNCH_NAME ),
							'default' => 0,
							'description' => __('show or hide Preloader', BUNCH_NAME)
							
                        ),
						array(
							'type' => 'textbox',
							'name' => 'map_api_key',
							'label' => __( 'Map Api Key', BUNCH_NAME ),
							'default' => '',
							'description' => __('Enter the map Api key', BUNCH_NAME)
						),
					) 
                    
                ),
			) 
        ),
        
        // Header Settings
        array(
            'title' => __( 'Header Settings', BUNCH_NAME ),
            'name' => 'header_settings',
            'icon' => 'font-awesome:fa fa-cube',
            'menus' => array(
                //logo settings
                array(
                    'title' => __( 'Logo Settings', BUNCH_NAME ),
                    'name' => 'logo_settings',
                    'icon' => 'font-awesome:fa fa-cube',
                    'controls' => array(
                        array(
                             'type' => 'upload',
                            'name' => 'site_favicon',
                            'label' => __( 'Favicon', BUNCH_NAME ),
                            'description' => __( 'Upload the favicon, should be 16x16', BUNCH_NAME ),
                            'default' => get_template_directory_uri().'/images/favicon.png'
                        ),
                        array(
                            'type' => 'section',
                            'repeating' => true,
                            'sortable' => true,
                            'title' => __( 'Logo Sub Settings', BUNCH_NAME ),
                            'name' => 'logo_sub_settings',
                            'description' => __( 'This section is used for logo sub settings', BUNCH_NAME ),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'logo_image',
                                    'label' => __('Home One Logo Image', BUNCH_NAME),
                                    'description' => __('Insert Home One logo image', BUNCH_NAME),
                                    'default' => get_template_directory_uri().'/images/logo.png'
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'home2_logo_image',
                                    'label' => __('Home Two Logo Image', BUNCH_NAME),
                                    'description' => __('Insert Home Two logo image', BUNCH_NAME),
                                    'default' => get_template_directory_uri().'/images/logo-3.png'
                                ),
                            )
                        ),
                    ) 
                ),
                //header sub settings
                array(
                    'title' => __( 'Header Settings', BUNCH_NAME ),
                    'name' => 'header_sub_settings',
                    'icon' => 'font-awesome:fa fa-cube',
                    'controls' => array(
                         array(
                            'type' => 'radioimage',
                            'name' => 'header_style',
                            'label' => __( 'Choose Header Style', BUNCH_NAME ),
                            'item_max_height' => '200',
                            'item_max_width' => '700',
                            'items' => array(
                                 array(
                                    'value' => 'header_v1',
                                    'label' => __( 'Header Style One', BUNCH_NAME ),
                                    'img' => get_template_directory_uri() . '/images/vafpress/header/header1.png' 
                                ),
                                array(
                                    'value' => 'header_v2',

                                    'label' => __( 'Header Style Two', BUNCH_NAME ),
                                    'img' => get_template_directory_uri() . '/images/vafpress/header/header2.png' 
                                ),
                                array(
                                    'value' => 'header_v3',
                                    'label' => __( 'Header Style Three', BUNCH_NAME ),
                                    'img' => get_template_directory_uri() . '/images/vafpress/header/header3.png' 
                                ),
                                array(
                                    'value' => 'header_v4',
                                    'label' => __( 'Header Style Four', BUNCH_NAME ),
                                    'img' => get_template_directory_uri() . '/images/vafpress/header/header4.png' 
                                ),
                                array(
                                    'value' => 'header_v5',
                                    'label' => __( 'Header Style Five', BUNCH_NAME ),
                                    'img' => get_template_directory_uri() . '/images/vafpress/header/header5.png' 
                                ),
                            ),
                            'default' => 'header_v1'
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header Style One Settings', BUNCH_NAME),
                            'name' => 'header_v1_settings',
                            'dependency' => array(
                                'field' => 'header_style',
                                'function' => 'vp_dep_style1',
                            ),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'about_logo_image',
                                    'label' => __( 'About Logo Image', BUNCH_NAME ),
                                    'description' => __( 'Insert About Section logo image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri().'/images/logo-2.png'
                                ),
								array(
									'type' => 'toggle',
									'name' => 'show_sidebar',
									'label' => __( 'Show Sidebar', BUNCH_NAME ),
									'default' => 0,
									'description' => __('show or hide Sidebar', BUNCH_NAME)
									
								),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_title',
                                    'label' => __( 'About Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the About Title', BUNCH_NAME ),
                                    'default' => 'About Us' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about_text',
                                    'label' => __( 'About Text', BUNCH_NAME ),
                                    'description' => __( 'Enter About Text', BUNCH_NAME ) 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_btn_title',
                                    'label' => __( 'Button Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the Button Title', BUNCH_NAME ),
                                    'default' => 'Consultation' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_btn_link',
                                    'label' => __( 'Button Link', BUNCH_NAME ),
                                    'description' => __( 'Enter Button Link', BUNCH_NAME ),
                                    'default' => '#' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_info_title',
                                    'label' => __( 'Contact Info Title', BUNCH_NAME ),
                                    'description' => __( 'Enter Info Title', BUNCH_NAME ),
                                    'default' => 'Contact Info' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about_address',
                                    'label' => __( 'Address', BUNCH_NAME ),
                                    'description' => __( 'Enter the Address', BUNCH_NAME ),
                                    'default' => 'Rock St 12, Newyork City, USA' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_phone',
                                    'label' => __( 'Phone Number', BUNCH_NAME ),
                                    'description' => __( 'Enter Phone Number', BUNCH_NAME ),
                                    'default' => '(526)-236-895-4732' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_email',
                                    'label' => __( 'Email ID', BUNCH_NAME ),
                                    'description' => __( 'Enter Email ID', BUNCH_NAME ),
                                    'default' => 'Specta@gmail.com' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_week_days',
                                    'label' => __( 'Week Days', BUNCH_NAME ),
                                    'description' => __( 'Enter Week Days', BUNCH_NAME ),
                                    'default' => 'Week Days: 09.00 to 18.00 Sunday: Closed' 
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header Style Two Settings', BUNCH_NAME),
                            'name' => 'header_v2_settings',
                            'dependency' => array(
                                'field' => 'header_style',
                                'function' => 'vp_dep_style2',
                            ),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'about_logo_image2',
                                    'label' => __( 'About Logo Image', BUNCH_NAME ),
                                    'description' => __( 'Insert About Section logo image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri().'/images/logo-2.png'
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_title2',
                                    'label' => __( 'About Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the About Title', BUNCH_NAME ),
                                    'default' => 'About Us' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about_text2',
                                    'label' => __( 'About Text', BUNCH_NAME ),
                                    'description' => __( 'Enter About Text', BUNCH_NAME ) 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_btn_title2',
                                    'label' => __( 'Button Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the Button Title', BUNCH_NAME ),
                                    'default' => 'Consultation' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_btn_link2',
                                    'label' => __( 'Button Link', BUNCH_NAME ),
                                    'description' => __( 'Enter Button Link', BUNCH_NAME ),
                                    'default' => '#' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_info_title2',
                                    'label' => __( 'Contact Info Title', BUNCH_NAME ),
                                    'description' => __( 'Enter Info Title', BUNCH_NAME ),
                                    'default' => 'Contact Info' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about_address2',
                                    'label' => __( 'Address', BUNCH_NAME ),
                                    'description' => __( 'Enter the Address', BUNCH_NAME ),
                                    'default' => 'Rock St 12, Newyork City, USA' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_phone2',
                                    'label' => __( 'Phone Number', BUNCH_NAME ),
                                    'description' => __( 'Enter Phone Number', BUNCH_NAME ),
                                    'default' => '(526)-236-895-4732' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_email2',
                                    'label' => __( 'Email ID', BUNCH_NAME ),
                                    'description' => __( 'Enter Email ID', BUNCH_NAME ),
                                    'default' => 'Specta@gmail.com' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about_week_days2',
                                    'label' => __( 'Week Days', BUNCH_NAME ),
                                    'description' => __( 'Enter Week Days', BUNCH_NAME ),
                                    'default' => 'Week Days: 09.00 to 18.00 Sunday: Closed' 
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header Style Three Settings', BUNCH_NAME),
                            'name' => 'header_v3_settings',
                            'dependency' => array(
                                'field' => 'header_style',
                                'function' => 'vp_dep_style3',
                            ),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'about_logo_image3',
                                    'label' => __( 'About Logo Image', BUNCH_NAME ),
                                    'description' => __( 'Insert About Section logo image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri().'/images/logo-2.png'
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'head_social_2',
                                    'label' => __( 'Show / Hide Social Icons', BUNCH_NAME ),
                                    'default' => 0,
                                    'description' => __('show or hide Social Icons.', BUNCH_NAME)
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header Style Four Settings', BUNCH_NAME),
                            'name' => 'header_v4_settings',
                            'dependency' => array(
                                'field' => 'header_style',
                                'function' => 'vp_dep_style4',
                            ),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'about4_logo_image',
                                    'label' => __( 'About Logo Image', BUNCH_NAME ),
                                    'description' => __( 'Insert About Section logo image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri().'/images/logo-2.png'
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_title',
                                    'label' => __( 'About Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the About Title', BUNCH_NAME ),
                                    'default' => 'About Us' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about4_text',
                                    'label' => __( 'About Text', BUNCH_NAME ),
                                    'description' => __( 'Enter About Text', BUNCH_NAME ) 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_btn_title',
                                    'label' => __( 'Button Title', BUNCH_NAME ),
                                    'description' => __( 'Enter the Button Title', BUNCH_NAME ),
                                    'default' => 'Consultation' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_btn_link',
                                    'label' => __( 'Button Link', BUNCH_NAME ),
                                    'description' => __( 'Enter Button Link', BUNCH_NAME ),
                                    'default' => '#' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_info_title',
                                    'label' => __( 'Contact Info Title', BUNCH_NAME ),
                                    'description' => __( 'Enter Info Title', BUNCH_NAME ),
                                    'default' => 'Contact Info' 
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'about4_address',
                                    'label' => __( 'Address', BUNCH_NAME ),
                                    'description' => __( 'Enter the Address', BUNCH_NAME ),
                                    'default' => 'Rock St 12, Newyork City, USA' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_phone',
                                    'label' => __( 'Phone Number', BUNCH_NAME ),
                                    'description' => __( 'Enter Phone Number', BUNCH_NAME ),
                                    'default' => '(526)-236-895-4732' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_email',
                                    'label' => __( 'Email ID', BUNCH_NAME ),
                                    'description' => __( 'Enter Email ID', BUNCH_NAME ),
                                    'default' => 'Specta@gmail.com' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'about4_week_days',
                                    'label' => __( 'Week Days', BUNCH_NAME ),
                                    'description' => __( 'Enter Week Days', BUNCH_NAME ),
                                    'default' => 'Week Days: 09.00 to 18.00 Sunday: Closed' 
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Header Style Five Settings', BUNCH_NAME),
                            'name' => 'header_v5_settings',
                            'dependency' => array(
                                'field' => 'header_style',
                                'function' => 'vp_dep_style5',
                            ),
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'head_social_5',
                                    'label' => __( 'Show / Hide Social Icons', BUNCH_NAME ),
                                    'default' => 0,
                                    'description' => __('show or hide Social Icons.', BUNCH_NAME)
                                ),
                            ),
                        ),
                    ) 
                ),
            ) 
        ),

        
        /** Submenu for footer area */
        array(
             'title' => __( 'Footer Settings', BUNCH_NAME ),
            'name' => 'sub_footer_settings',
            'icon' => 'font-awesome:fa fa-edit',
            'controls' => array(
                array(
                    'type' => 'toggle',
                    'name' => 'hide_whole_footer',
                    'label' => __( 'Hide Whole Footer', BUNCH_NAME ),
                    'default' => 0,
                    'description' => __('show or hide Whole footer', BUNCH_NAME)

                ),
                array(
                    'type' => 'toggle',
                    'name' => 'hide_upper_footer',
                    'label' => __( 'Hide Upper Footer', BUNCH_NAME ),
                    'default' => 0,
                    'description' => __('show or hide Upper footer', BUNCH_NAME)

                ),
                array(
                    'type' => 'toggle',
                    'name' => 'hide_bottom_footer',
                    'label' => __( 'Hide Bottom Footer', BUNCH_NAME ),
                    'default' => 0,
                    'description' => __('show or hide Bottom footer', BUNCH_NAME)

                ),
                array(
                    'type' => 'upload',
                    'name' => 'footer_logo',
                    'label' => __('Footer Logo Image', BUNCH_NAME),
                    'description' => __('Inser the footer logo', BUNCH_NAME),
                    'default' => get_template_directory_uri().'/images/footer-logo.png'
                ),
                array(
                    'type' => 'toggle',
                    'name' => 'hide_footer_menu',
                    'label' => __( 'Hide Footer Menu', BUNCH_NAME ),
                    'default' => 0,
                    'description' => __('show or hide footer menu', BUNCH_NAME)

                ),
                array(
                    'type' => 'toggle',
                    'name' => 'hide_footer_social',
                    'label' => __( 'Hide Footer Social Media', BUNCH_NAME ),
                    'default' => 0,
                    'description' => __('show or hide footer social media', BUNCH_NAME)

                ),
                array(
                    'type' => 'textarea',
                    'name' => 'copyright',
                    'label' => __( 'Copyright', BUNCH_NAME ),
                    'description' => __( 'Enter Copyright Text', BUNCH_NAME ),
                    'default' => '&copy; 2018 SPECTA Minimal All rights reserved.'
                ),

            ) 
        ), //End of submenu
        
		// SEO General settings Settings
        // Dynamic Clients Creator
        array(
             'title' => __( 'Clients', BUNCH_NAME ),
            'name' => 'clients',
            'icon' => 'font-awesome:fa fa-share-square',
            'controls' => array(
                 array(
                     'type' => 'builder',
                    'repeating' => true,
                    'sortable' => true,
                    'label' => __( 'Clients', BUNCH_NAME ),
                    'name' => 'clients',
                    'description' => __( 'This section is used to add Clients.', BUNCH_NAME ),
                    'fields' => array(
                         array(
                             'type' => 'textbox',
                            'name' => 'title',
                            'label' => __( 'Title', BUNCH_NAME ),
                            'description' => __( 'Enter the title of the client.', BUNCH_NAME ), 
                        ),
						 array(
                             'type' => 'textbox',
                            'name' => 'client_link',
                            'label' => __( 'Link', BUNCH_NAME ),
                            'description' => __( 'Enter the Link for client.', BUNCH_NAME ),
                            'default' => '#'
                        ),
                        array(
                            'type' => 'upload',
                            'name' => 'client_img',
                            'label' => __( 'Logo', BUNCH_NAME ),
                            'description' => __( 'choose the brand logo.', BUNCH_NAME ),
                            'default' => '',
							
                         ),  
                    ) 
                ) 
            ) 
        ),
		
		
		// Pages , Blog Pages Settings
        array(
             'title' => __( 'Page Settings', BUNCH_NAME ),
            'name' => 'general_settings',
            'icon' => 'font-awesome:fa fa-file',
            'menus' => array(
                
                // Search Page Settings 
                 array(
                     'title' => __( 'Search Page', BUNCH_NAME ),
                    'name' => 'search_page_settings',
                    'icon' => 'font-awesome:fa fa-search',
                    'controls' => array(
                        
						array(
                            'type' => 'textbox',
                            'name' => 'search_page_header_title',
                            'label' => __( 'Title', BUNCH_NAME ),
                            'description' => __( 'Enter Search Page Title .', BUNCH_NAME ),
                            'default' => '',
							
                        ),
//						array(
//                            'type' => 'upload',
//                            'name' => 'search_page_header_img',
//                            'label' => __( 'Header image', BUNCH_NAME ),
//                            'description' => __( 'Enter Search Header image .', BUNCH_NAME ),
//                            'default' => '',
//							
//                        ),
						array(
                             'type' => 'select',
                            'name' => 'search_page_sidebar',
                            'label' => __( 'Sidebar', BUNCH_NAME ),
                            'items' => array(
                                 'data' => array(
                                     array(
                                         'source' => 'function',
                                        'value' => 'bunch_get_sidebars_2' 
                                    ) 
                                ) 
                            ),
                            'default' => array(
                                 '{{first}}' 
                            ) 
                        ),
                        array(
                             'type' => 'radioimage',
                            'name' => 'search_page_layout',
                            'label' => __( 'Page Layout', BUNCH_NAME ),
                            'description' => __( 'Choose the layout for blog pages', BUNCH_NAME ),
                            
                            'items' => array(
                                 array(
                                    'value' => 'left',
                                    'label' => __( 'Left Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cl.png' 
                                ),
                                
                                array(
                                    'value' => 'right',
                                    'label' => __( 'Right Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cr.png' 
                                ),
                                array(
                                    'value' => 'full',
                                    'label' => __( 'Full Width', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/1col.png' 
                                ),
                                
                            ) 
                        ),
                    ) 
                ), // End of submenu
                
                // Archive Page Settings 
                array(
                     'title' => __( 'Archive Page', BUNCH_NAME ),
                    'name' => 'archive_page_settings',
                    'icon' => 'font-awesome:fa fa-archive',
                    'controls' => array(
                        array(
                            'type' => 'textbox',
                            'name' => 'archive_page_header_title',
                            'label' => __( 'Title', BUNCH_NAME ),
                            'description' => __( 'Enter Blog Page Title .', BUNCH_NAME ),
                            'default' => '',
							
                        ),
//						array(
//                            'type' => 'upload',
//                            'name' => 'archive_page_header_img',
//                            'label' => __( 'Header Image', BUNCH_NAME ),
//                            'description' => __( 'Enter Header image url .', BUNCH_NAME ),
//                            'default' => '',
//							
//                        ),
					    array(
                             'type' => 'select',
                            'name' => 'archive_page_sidebar',
                            'label' => __( 'Sidebar', BUNCH_NAME ),
                            'items' => array(
                                 'data' => array(
                                     array(
                                         'source' => 'function',
                                        'value' => 'bunch_get_sidebars_2' 
                                    ) 
                                ) 
                            ),
                            'default' => array(
                                 '{{first}}' 
                            ) 
                        ),
                        array(
                             'type' => 'radioimage',
                            'name' => 'archive_page_layout',
                            'label' => __( 'Page Layout', BUNCH_NAME ),
                            'description' => __( 'Choose the layout for blog pages', BUNCH_NAME ),
                            
                            'items' => array(
                                 array(
                                    'value' => 'left',
                                    'label' => __( 'Left Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cl.png' 
                                ),
                                array(
                                    'value' => 'right',
                                    'label' => __( 'Right Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cr.png' 
                                ),
                                array(
                                    'value' => 'full',
                                    'label' => __( 'Full Width', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/1col.png' 
                                ), 
                                
                            ) 
                        ) 
                        
                        
                    ) 
                ),
                
                // Author Page Settings 
                array(
                     'title' => __( 'Author Page', BUNCH_NAME ),
                    'name' => 'author_page_settings',
                    'icon' => 'font-awesome:fa fa-user',
                    'controls' => array(
                        array(
                            'type' => 'textbox',
                            'name' => 'author_page_header_title',
                            'label' => __( 'Title', BUNCH_NAME ),
                            'description' => __( 'Enter Author Page Title .', BUNCH_NAME ),
                            'default' => '',
							
                        ),
//						array(
//                            'type' => 'upload',
//                            'name' => 'author_page_header_img',
//                            'label' => __( 'Header Image', BUNCH_NAME ),
//                            'description' => __( 'Enter Header image url .', BUNCH_NAME ),
//                            'default' => '',
//						),
						array(
                             'type' => 'select',
                            'name' => 'author_page_sidebar',
                            'label' => __( 'Sidebar', BUNCH_NAME ),
                            'items' => array(
                                 'data' => array(
                                     array(
                                         'source' => 'function',
                                        'value' => 'bunch_get_sidebars_2' 
                                    ) 
                                ) 
                            ),
                            'default' => array(
                                 '{{first}}' 
                            ) 
                        ),
                        array(
                             'type' => 'radioimage',
                            'name' => 'author_page_layout',
                            'label' => __( 'Page Layout', BUNCH_NAME ),
                            'description' => __( 'Choose the layout for blog pages', BUNCH_NAME ),
                            
                            'items' => array(
                                 array(
                                     'value' => 'left',
                                    'label' => __( 'Left Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cl.png' 
                                ),
                                
                                array(
                                     'value' => 'right',
                                    'label' => __( 'Right Sidebar', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/2cr.png' 
                                ),
                                array(
                                     'value' => 'full',
                                    'label' => __( 'Full Width', BUNCH_NAME ),
                                    'img' => BUNCH_TH_URL.'/includes/vafpress/public/img/1col.png' 
                                ),
                                
                            ) 
                        ) 
                        
                    ) 
                ),
                
                // 404 Page Settings 
                array(
                     'title' => __( '404 Page Settings', BUNCH_NAME ),
                    'name' => '404_page_settings',
                    'icon' => 'font-awesome:fa fa-exclamation-triangle',
                    'controls' => array(
                         array(
                            'type' => 'upload',
                            'name' => 'error_page_bg',
                            'label' => __( 'Background  Image', BUNCH_NAME ),
                            'description' => __( 'Upload Background Image', BUNCH_NAME ),
                            'default' => get_template_directory_uri() . '/images/background/3.jpg' 
                         ),
                        array(
                            'type' => 'upload',
                            'name' => 'error_page_bg_error',
                            'label' => __( 'Error  Image', BUNCH_NAME ),
                            'description' => __( 'Upload Error Image', BUNCH_NAME ),
                            'default' => get_template_directory_uri() . '/images/resource/error-img.png' 
                         ),
                        array(
                             'type' => 'textbox',
                            'name' => 'error_page_heading',
                            'label' => __( 'Page Heading', BUNCH_NAME ),
                            'description' => __( 'Enter the Heading you want to show on 404 page', BUNCH_NAME ),
                            'default' => '404 Page not Found' 
                        ),
                        array(
                             'type' => 'textarea',
                            'name' => 'error_page_text',
                            'label' => __( '404 Page Text', BUNCH_NAME ),
                            'description' => __( 'Enter the Text you want to show on 404 page', BUNCH_NAME ),
                            'default' => '' 
                        ),
                        array(
                             'type' => 'textbox',
                            'name' => 'error_page_btn_title',
                            'label' => __( 'Button Title', BUNCH_NAME ),
                            'description' => __( 'Enter Button Title show on 404 page', BUNCH_NAME ),
                            'default' => 'back to home' 
                        ),
                    ) 
                ),
                // Comming Soon Page Settings 
                array(
                    'title' => __( 'Comming Soon Page Settings', BUNCH_NAME ),
                    'name' => 'comming_soon_page_settings',
                    'icon' => 'font-awesome:fa fa-exclamation-triangle',
                    'controls' => array(
                        array(
							'type' => 'section',
							'title' => __('Comming Soon Page Header Settings', BUNCH_NAME),
							'name' => 'comming-soon_header_settings',
							'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'cs_page_logo_img',
                                    'label' => __( 'Header & Sidebar Logo', BUNCH_NAME ),
                                    'description' => __( 'Upload Logo & Sidebar Logo', BUNCH_NAME ),
                                    'default' => get_template_directory_uri() . '/images/logo-2.png' 
                                ),
                                array(
									'type' => 'toggle',
									'name' => 'cs_show_sidebar_social',
									'label' => __( 'Show / Hide Sidebar Social Icons', BUNCH_NAME ),
									'default' => 0,
									'description' => __('show or hide sidebar Social Icons.', BUNCH_NAME)
								),
							),
						),
                        array(
							'type' => 'section',
							'title' => __('Comming Soon Page Settings', BUNCH_NAME),
							'name' => 'comming-soon_page_settings',
							'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'cs_bg_img',
                                    'label' => __( 'Comming Soon Background Logo', BUNCH_NAME ),
                                    'description' => __( 'Upload Background Image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri() . '/images/background/4.jpg' 
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'cs_page_text_img',
                                    'label' => __( 'Comming Soon Text Logo', BUNCH_NAME ),
                                    'description' => __( 'Upload Text Image', BUNCH_NAME ),
                                    'default' => get_template_directory_uri() . '/images/icons/comming-soon.png' 
                                ),
                                array(
                                     'type' => 'textarea',
                                    'name' => 'cs_section_text',
                                    'label' => __( 'Comming Soon Page Description', BUNCH_NAME ),
                                    'description' => __( 'Enter the Text you want to show on Comming Soon page', BUNCH_NAME ),
                                    'default' => 'HELLO ! stay tuned with us untill <span class="theme_color">.</span>' 
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'cs_section_count',
                                    'label' => __( 'Page Counter ', BUNCH_NAME ),
                                    'description' => __( 'Enter the Counter you want to show on Comming Soon page', BUNCH_NAME ),
                                    'default' => '2019/7/17' 
                                ),
							),
						),
                        array(
							'type' => 'section',
							'title' => __('Comming Soon Page Social Media Settings', BUNCH_NAME),
							'name' => 'comming-soon_page_social_settings',
							'fields' => array(
                                array(
                                    'type' => 'builder',
                                    'repeating' => true,
                                    'sortable' => true,
                                    'label' => __( 'Social Media', BUNCH_NAME ),
                                    'name' => 'cs_social_media',
                                    'description' => __( 'This section is used to add Social Media.', BUNCH_NAME ),
                                    'fields' => array(
                                         array(
                                             'type' => 'textbox',
                                            'name' => 'title',
                                            'label' => __( 'Title', BUNCH_NAME ),
                                            'description' => __( 'Enter the title of the social media.', BUNCH_NAME ), 
                                        ),
                                         array(
                                             'type' => 'textbox',
                                            'name' => 'social_link',
                                            'label' => __( 'Link', BUNCH_NAME ),
                                            'description' => __( 'Enter the Link for Social Media.', BUNCH_NAME ),
                                            'default' => '#'
                                        )
                                    ) 
                                ) 
							),
						),
                    ) 
                ),
                // Social Sharing
                 array(
                    'title' => __( 'Social Sharing ', BUNCH_NAME ),
                    'name' => 'social_sharing',
                    'icon' => 'font-awesome:fa fa-share-alt',
                    'controls' => array(
                            array(
                                'type' => 'toggle',
                                'name' => 'facebook_sharing',
                                'label' => __( 'Facebook', BUNCH_NAME ),
                                'default' => 0,
                                'description' => __('show or hide Facebook on blog pages', BUNCH_NAME)
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'twitter_sharing',
                                'label' => __( 'Twitter', BUNCH_NAME ),
                                'default' => 0,
                                'description' => __('show or hide Twitter on blog pages', BUNCH_NAME)
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'linkedin_sharing',
                                'label' => __( 'LinkedIn', BUNCH_NAME ),
                                'default' => 0,
                                'description' => __('show or hide LinkedIn on blog pages', BUNCH_NAME)
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'pinterest_sharing',
                                'label' => __( 'Pinterest', BUNCH_NAME ),
                                'default' => 0,
                                'description' => __('show or hide Pinterest on blog pages', BUNCH_NAME)
                            ),
                     ) 
                 ),
            ) 
        ),
        
        // Sidebar Creator
        array(
             'title' => __( 'Sidebar Settings', BUNCH_NAME ),
            'name' => 'sidebar-settings',
            'icon' => 'font-awesome:fa fa-bars',
            'controls' => array(
                 array(
                     'type' => 'builder',
                    'repeating' => true,
                    'sortable' => true,
                    'label' => __( 'Dynamic Sidebar', BUNCH_NAME ),
                    'name' => 'dynamic_sidebar',
                    'description' => __( 'This section is used for theme color settings', BUNCH_NAME ),
                    'fields' => array(
                         array(
                             'type' => 'textbox',
                            'name' => 'sidebar_name',
                            'label' => __( 'Sidebar Name', BUNCH_NAME ),
                            'description' => __( 'Choose the default color scheme for the theme.', BUNCH_NAME ),
                            'default' => __( 'Dynamic Sidebar', BUNCH_NAME ) 
                        ) 
                    ) 
                ) 
            ) 
        ),
        
        // Dynamic Social Media Creator
        array(
             'title' => __( 'Social Media ', BUNCH_NAME ),
            'name' => 'social_media',
            'icon' => 'font-awesome:fa fa-share-square',
            'controls' => array(
                 array(
                     'type' => 'builder',
                    'repeating' => true,
                    'sortable' => true,
                    'label' => __( 'Social Media', BUNCH_NAME ),
                    'name' => 'social_media',
                    'description' => __( 'This section is used to add Social Media.', BUNCH_NAME ),
                    'fields' => array(
                         array(
                             'type' => 'textbox',
                            'name' => 'title',
                            'label' => __( 'Title', BUNCH_NAME ),
                            'description' => __( 'Enter the title of the social media.', BUNCH_NAME ), 
                        ),
						 array(
                             'type' => 'textbox',
                            'name' => 'social_link',
                            'label' => __( 'Link', BUNCH_NAME ),
                            'description' => __( 'Enter the Link for Social Media.', BUNCH_NAME ),
                            'default' => '#'
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'social_icon',
                            'label' => __( 'Icon', BUNCH_NAME ),
                            'description' => __( 'Choose Icon for Social Media.', BUNCH_NAME ),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_social_medias',
									),
								),
							),
                        )  
                    ) 
                ) 
            ) 
        ),
        
        
        /* Font settings */
        array(
             'title' => __( 'Font Settings', BUNCH_NAME ),
            'name' => 'font_settings',
            'icon' => 'font-awesome:fa fa-font',
            'menus' => array(
                /** heading font settings */
                 array(
                     'title' => __( 'Heading Font', BUNCH_NAME ),
                    'name' => 'heading_font_settings',
                    'icon' => 'font-awesome:fa fa-text-height',
                    
                    'controls' => array(
                        
                         array(
                             'type' => 'toggle',
                            'name' => 'use_custom_font',
                            'label' => __( 'Use Custom Font', BUNCH_NAME ),
                            'description' => __( 'Use custom font or not', BUNCH_NAME ),
                            'default' => 0 
                        ),
                        array(
                            'type' => 'section',
                            'title' => __( 'H1 Settings', BUNCH_NAME ),
                            'name' => 'h1_settings',
                            'description' => __( 'heading 1 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h1_font_family',
                                    'description' => __( 'Select the font family to use for h1', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                
                                array(
                                     'type' => 'color',
                                    'name' => 'h1_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h1', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ),
                        array(
                             'type' => 'section',
                            'title' => __( 'H2 Settings', BUNCH_NAME ),
                            'name' => 'h2_settings',
                            'description' => __( 'heading h2 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h2_font_family',
                                    'description' => __( 'Select the font family to use for h2', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                ),
                                array(
                                     'type' => 'color',
                                    'name' => 'h2_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h1', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ),
                        array(
                             'type' => 'section',
                            'title' => __( 'H3 Settings', BUNCH_NAME ),
                            'name' => 'h3_settings',
                            'description' => __( 'heading h3 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h3_font_family',
                                    'description' => __( 'Select the font family to use for h3', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                array(
                                     'type' => 'color',
                                    'name' => 'h3_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h3', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ),
                        
                        array(
                             'type' => 'section',
                            'title' => __( 'H4 Settings', BUNCH_NAME ),
                            'name' => 'h4_settings',
                            'description' => __( 'heading h4 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h4_font_family',
                                    'description' => __( 'Select the font family to use for h4', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                array(
                                     'type' => 'color',
                                    'name' => 'h4_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h4', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ),
                        
                        array(
                             'type' => 'section',
                            'title' => __( 'H5 Settings', BUNCH_NAME ),
                            'name' => 'h5_settings',
                            'description' => __( 'heading h5 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h5_font_family',
                                    'description' => __( 'Select the font family to use for h5', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                array(
                                     'type' => 'color',
                                    'name' => 'h5_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h5', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ),
                        
                        array(
                             'type' => 'section',
                            'title' => __( 'H6 Settings', BUNCH_NAME ),
                            'name' => 'h6_settings',
                            'description' => __( 'heading h6 font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'use_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'h6_font_family',
                                    'description' => __( 'Select the font family to use for h6', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                array(
                                     'type' => 'color',
                                    'name' => 'h6_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading h6', BUNCH_NAME ),
                                    'default' => '#98ed28' 
                                ) 
                            ) 
                        ) 
                    ) 
                ),
                
                /** body font settings */
                array(
                     'title' => __( 'Body Font', BUNCH_NAME ),
                    'name' => 'body_font_settings',
                    'icon' => 'font-awesome:fa fa-text-width',
                    'controls' => array(
                         array(
                             'type' => 'toggle',
                            'name' => 'body_custom_font',
                            'label' => __( 'Use Custom Font', BUNCH_NAME ),
                            'description' => __( 'Use custom font or not', BUNCH_NAME ),
                            'default' => 0 
                        ),
                        array(
                             'type' => 'section',
                            'title' => __( 'Body Font Settings', BUNCH_NAME ),
                            'name' => 'body_font_settings1',
                            'description' => __( 'body font settings', BUNCH_NAME ),
                            'dependency' => array(
                                 'field' => 'body_custom_font',
                                'function' => 'vp_dep_boolean' 
                            ),
                            'fields' => array(
                                
                                 array(
                                     'type' => 'select',
                                    'label' => __( 'Font Family', BUNCH_NAME ),
                                    'name' => 'body_font_family',
                                    'description' => __( 'Select the font family to use for body', BUNCH_NAME ),
                                    'items' => array(
                                         'data' => array(
                                             array(
                                                 'source' => 'function',
                                                'value' => 'vp_get_gwf_family' 
                                            ) 
                                        ) 
                                    ) 
                                    
                                ),
                                
                                array(
                                     'type' => 'color',
                                    'name' => 'body_font_color',
                                    'label' => __( 'Font Color', BUNCH_NAME ),
                                    'description' => __( 'Choose the font color for heading body', BUNCH_NAME ),
                                    'default' => '#686868' 
                                ) 
                            ) 
                        ) 
                    ) 
                ) 
            ) 
        ), 
		
		
    ) 
);
/**
 *EOF
 */