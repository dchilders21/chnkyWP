<?php
/**
 * Kingcomposer array
 *
 * @package Student WP
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$orderby = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order By", BUNCH_NAME),
				"name"			=>	"sort",
				'options'		=>	array('date'=>esc_html__('Date', BUNCH_NAME),'title'=>esc_html__('Title', BUNCH_NAME) ,'name'=>esc_html__('Name', BUNCH_NAME) ,'author'=>esc_html__('Author', BUNCH_NAME),'comment_count' =>esc_html__('Comment Count', BUNCH_NAME),'random' =>esc_html__('Random', BUNCH_NAME) ),
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$order = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order", BUNCH_NAME),
				"name"			=>	"order",
				'options'		=>	(array('ASC'=>esc_html__('Ascending', BUNCH_NAME),'DESC'=>esc_html__('Descending', BUNCH_NAME) ) ),			
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$number = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Number', BUNCH_NAME ),
				"name"			=>	"num",
				"description"	=>	esc_html__('Enter Number of posts to Show.', BUNCH_NAME )
			);
$text_limit = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Text Limit', BUNCH_NAME ),
				"name"			=>	"text_limit",
				"description"	=>	esc_html__('Enter text limit of posts to Show.', BUNCH_NAME )
			);
$heading = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Heading', BUNCH_NAME ),
				"name"			=>	"heading",
				"description"	=>	esc_html__('Enter Heading.', BUNCH_NAME )
			);
$title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Title', BUNCH_NAME ),
				"name"			=>	"title",
				"description"	=>	esc_html__('Enter section title.', BUNCH_NAME )
			);
$subtitle = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Sub-Title', BUNCH_NAME ),
				"name"			=>	"subtitle",
				"description"	=>	esc_html__('Enter section subtitle.', BUNCH_NAME )
			);
$text  = array(
				"type"			=>	"textarea",
				"label"			=>	esc_html__('Text', BUNCH_NAME ),
				"name"			=>	"text",
				"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
			);
$btn_title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Button Title', BUNCH_NAME ),
				"name"			=>	"btn_title",
				"description"	=>	esc_html__('Enter section Button title.', BUNCH_NAME )
			);
$btn_link = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Button Link', BUNCH_NAME ),
				"name"			=>	"btn_link",
				"description"	=>	esc_html__('Enter section Button Link.', BUNCH_NAME )
			);
$bg_img = array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Background Image', BUNCH_NAME ),
				"name"			=>	"bg_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Background image.', BUNCH_NAME )
			);

$options = array();


// Revslider Start.
$options['bunch_revslider']	=	array(
					'name' => esc_html__('Revslider', BUNCH_NAME),
					'base' => 'bunch_revslider',
					'class' => '',
					'category' => esc_html__('Specta', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show  Revolution slider.', BUNCH_NAME),
					'params' => array(
                        'general' => array(
                            array(
                                'type' => 'dropdown',
                                'label' => esc_html__('Choose Slider', BUNCH_NAME ),
                                'name' => 'slider_slug',
                                'options' => bunch_get_rev_slider( 0 ),
                                'description' => esc_html__('Choose Slider', BUNCH_NAME )
                            ),
                        ),
                        'styling' => array(
                            array(
                                "type"			=>	"toggle",
                                "label"			=>	esc_html__('Show Background Color', BUNCH_NAME ),
                                "name"			=>	"bg_color",
                                "description"	=>	esc_html__('Enable to show Background Color', BUNCH_NAME )
                            ),
                        )
					),
			);

/**
 * WHAT WE DO array.
 */
$options['bunch_what_we_do'] = array(
			'name'			=> esc_html__( 'what we do', BUNCH_NAME ),
			'base'			=> 'bunch_what_we_do',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'what we do section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
					$heading,
                    $title,
                    $text_limit,
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME ),
                        "name" => "cat",
                        "options" =>  bunch_get_categories( array( 'taxonomy' => 'services_category' ), true ),
                        "description" => __( 'Choose Category.', BUNCH_NAME )
                    ),
                    $orderby,
                    $order
				),
			),
	);

/**
 * Projects Three Columns array.
 */
$options['bunch_projects_three_col'] = array(
			'name'			=> esc_html__( 'Projects Three columns', BUNCH_NAME ),
			'base'			=> 'bunch_projects_three_col',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Three columns', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),

			),
	);

/**
 * Call to Action array.
 */
$options['bunch_call_to_action'] = array(
    'name'			=> esc_html__( 'Call to Action', BUNCH_NAME ),
    'base'			=> 'bunch_call_to_action',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Call to Action', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            $heading,
            $title,
            $btn_title,
            $btn_link
        ),

    ),
);

/**
 * Our Skills array.
 */
$options['bunch_our_skills'] = array(
    'name'			=> esc_html__( 'Our Skills', BUNCH_NAME ),
    'base'			=> 'bunch_our_skills',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Our Skills Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Sidebar Image', BUNCH_NAME ),
				"name"			=>	"sidebar_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Sidebar image.', BUNCH_NAME )
			),
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Skills', BUNCH_NAME ),
                'name' 			=> 'skills',
                'description' 	=> esc_html__( 'Add Skill', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Skill', BUNCH_NAME ),
                        "name"			=>	"skill",
                        "description"	=>	esc_html__('Enter Skill Name.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Percentage', BUNCH_NAME ),
                        "name"			=>	"percentage",
                        "description"	=>	esc_html__('Enter Percentage.', BUNCH_NAME )
                    ),
                ),
            ),
        ),

    ),
);


/**
 * Our Team array.
 */
$options['bunch_our_team'] = array(
			'name'			=> esc_html__( 'Our Team', BUNCH_NAME ),
			'base'			=> 'bunch_our_team',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Our Team Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
					$heading,
                    $title,
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'team_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order
				),

			),
	);


/**
 * Testimonials array.
 */
$options['bunch_our_testimonials'] = array(
			'name'			=> esc_html__( 'Testimonials', BUNCH_NAME ),
			'base'			=> 'bunch_our_testimonials',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show the Testimonials Section', BUNCH_NAME ),
			'is_container'	=> true,
			'tab_icons' => array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params' => array(
                $bg_img,
                $number,
                $text_limit,
                $orderby,
                $order,
                array(
                    'type'          => 'autocomplete',
                    'label'         => esc_html__( 'Select Category', BUNCH_NAME ),
                    'name'          => 'testimonials_cat',
                    'options'       => array(
                        'taxonomy'      => 'testimonials_category',
                    ),
                ),
			),
	);


//fun Facts array
$options['bunch_fun_facts']	=	array(
					'name' => esc_html__('Fun Facts', BUNCH_NAME),
					'base' => 'bunch_fun_facts',
					'class' => '',
					'category' => esc_html__('Specta', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Fun Facts Home 1.', BUNCH_NAME),
					'params' => array(
						//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Fun Facts', BUNCH_NAME ),
								 'name' => 'facts',
								 'description' => esc_html__( 'Enter the Fun Facts.', BUNCH_NAME ),
								 'params' => array(
										array(
											'type' 			=> 'icon_picker',
											'label' 		=> esc_html__( 'Icon Picker', BUNCH_NAME ),
											'name' 			=> 'icon',
											'description' 	=> esc_html__( 'Choose the Icon', BUNCH_NAME ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Title', BUNCH_NAME ),
											 'name' => 'title',
											 'description' => esc_html__( 'Enter Facts title.', BUNCH_NAME ),
										),
										array(
											 'type' => 'text',
											 'label' => esc_html__( 'Stop Number', BUNCH_NAME ),
											 'name' => 'stop_num',
											 'description' => esc_html__( 'Enter Stop Number.', BUNCH_NAME ),
										),
								 ),
							),//Group End
					),
			);

/**
 * Latest Blog array.
 */
$options['bunch_latest_blog'] = array(
    'name' => esc_html__( 'Latest Blog', BUNCH_NAME ),
    'base' => 'bunch_latest_blog',
    'class' => '',
    'category' => esc_html__( 'Specta', BUNCH_NAME ),
    'icon' => 'fa-briefcase' ,
    'description' => esc_html__( 'Show Latest Blog Section.', BUNCH_NAME ),
    'params' => array(
        $heading,
        $title,
        $number,
        $text_limit,
        array(
            "type" => "dropdown",
            "label" => __( 'Category', BUNCH_NAME),
            "name" => "cat",
            "options" =>  bunch_get_categories(array( 'taxonomy' => 'category'), true),
            "description" => __( 'Choose Category.', BUNCH_NAME)
        ),
        $orderby,
        $order,
    ),
);

/**
 * Projects Masonary Columns array.
 */
$options['bunch_projects_masonary'] = array(
			'name'			=> esc_html__( 'Projects Masonary', BUNCH_NAME ),
			'base'			=> 'bunch_projects_masonary',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Masonary Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),

			),
	);

/**
 * Services Three Columns array.
 */
$options['bunch_services_three_col'] = array(
    'name'			=> esc_html__( 'Services Three Columns', BUNCH_NAME ),
    'base'			=> 'bunch_services_three_col',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Services Three Columns Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Service', BUNCH_NAME ),
                'name' 			=> 'services',
                'description' 	=> esc_html__( 'Add Service', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        'type' 			=> 'icon_picker',
                        'label' 		=> esc_html__( 'Icon Picker', BUNCH_NAME ),
                        'name' 			=> 'icon',
                        'description' 	=> esc_html__( 'Choose the Icon', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'Title', BUNCH_NAME ),
                         'name' => 'title',
                         'description' => esc_html__( 'Enter Title.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'External URL', BUNCH_NAME ),
                         'name' => 'ext_url',
                         'description' => esc_html__( 'Enter External URL.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'textarea',
                         'label' => esc_html__( 'Text', BUNCH_NAME ),
                         'name' => 'text',
                         'description' => esc_html__( 'Enter Text.', BUNCH_NAME ),
                    ),
                ),
            ),
            array(
                'name' => 'without_img',
                'label' => 'Without Sidebar Image',
                'type' => 'toggle',
                'description' => 'Enable to Show Without Image Section'
            ),
        ),

    ),
);

/**
 * Why Choose US array.
 */
$options['bunch_why_choose_us'] = array(
    'name'			=> esc_html__( 'Why Choose us', BUNCH_NAME ),
    'base'			=> 'bunch_why_choose_us',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Why Choose us Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Sidebar Image', BUNCH_NAME ),
				"name"			=>	"sidebar_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Sidebar image.', BUNCH_NAME )
			),
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Service', BUNCH_NAME ),
                'name' 			=> 'choose',
                'description' 	=> esc_html__( 'Add Service', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        'type' 			=> 'icon_picker',
                        'label' 		=> esc_html__( 'Icon Picker', BUNCH_NAME ),
                        'name' 			=> 'icon',
                        'description' 	=> esc_html__( 'Choose the Icon', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'Title', BUNCH_NAME ),
                         'name' => 'title',
                         'description' => esc_html__( 'Enter Title.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'External URL', BUNCH_NAME ),
                         'name' => 'ext_url',
                         'description' => esc_html__( 'Enter External URL.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'textarea',
                         'label' => esc_html__( 'Text', BUNCH_NAME ),
                         'name' => 'text',
                         'description' => esc_html__( 'Enter Text.', BUNCH_NAME ),
                    ),
                ),
            ),
            array(
                'name' => 'with_bg_color',
                'label' => 'With Background Color',
                'type' => 'toggle',
                'description' => 'Enable to Show With Background Color Section'
            ),
        ),

    ),
);

/**
 * Our Skills Two array.
 */
$options['bunch_our_skills2'] = array(
    'name'			=> esc_html__( 'Our Skills Two', BUNCH_NAME ),
    'base'			=> 'bunch_our_skills2',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Our Skills Two Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Skills', BUNCH_NAME ),
                'name' 			=> 'skills',
                'description' 	=> esc_html__( 'Add Skill', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Skill', BUNCH_NAME ),
                        "name"			=>	"skill",
                        "description"	=>	esc_html__('Enter Skill Name.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Percentage', BUNCH_NAME ),
                        "name"			=>	"percentage",
                        "description"	=>	esc_html__('Enter Percentage.', BUNCH_NAME )
                    ),
                ),
            ),
            array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Sidebar Image', BUNCH_NAME ),
				"name"			=>	"sidebar_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Sidebar image.', BUNCH_NAME )
			),
        ),

    ),
);

/**
 * Our Partners array.
 */
$options['bunch_our_partners'] = array(
    'name'			=> esc_html__( 'Our Partners', BUNCH_NAME ),
    'base'			=> 'bunch_our_partners',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Our Partners Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Partner', BUNCH_NAME ),
                'name' 			=> 'partners',
                'description' 	=> esc_html__( 'Add Partner', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        "type"			=>	"attach_image_url",
                        "label"			=>	esc_html__('Partner Image', BUNCH_NAME ),
                        "name"			=>	"partner_img",
                        'admin_label' 	=> 	false,
                        "description"	=>	esc_html__('Choose Partner image.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('External URL', BUNCH_NAME ),
                        "name"			=>	"ext_url",
                        "description"	=>	esc_html__('Enter External URL.', BUNCH_NAME )
                    ),
                ),
            ),
        ),

    ),
);

/**
 * Projects Masonary Two array.
 */
$options['bunch_projects_masonary2'] = array(
			'name'			=> esc_html__( 'Projects Masonary Two', BUNCH_NAME ),
			'base'			=> 'bunch_projects_masonary2',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Masonary Two Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    array(
                        "type"			=>	"textarea",
                        "label"			=>	esc_html__('Heading', BUNCH_NAME ),
                        "name"			=>	"heading",
                        "description"	=>	esc_html__('Enter heading to show.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"textarea",
                        "label"			=>	esc_html__('Text', BUNCH_NAME ),
                        "name"			=>	"text",
                        "description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
                    ),
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),

			),
	);

/**
 * Call to Action Two array.
 */
$options['bunch_call_to_action2'] = array(
    'name'			=> esc_html__( 'Call to Action Two', BUNCH_NAME ),
    'base'			=> 'bunch_call_to_action2',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Call to Action Two', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            $heading,
            $title,
            $btn_title,
            $btn_link
        ),

    ),
);

/**
 * Projects Masonary Three array.
 */
$options['bunch_projects_masonary3'] = array(
			'name'			=> esc_html__( 'Projects Masonary Three', BUNCH_NAME ),
			'base'			=> 'bunch_projects_masonary3',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Masonary Three Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),
			),
	);

/**
 * Services Three Columns Two array.
 */
$options['bunch_services_three_col2'] = array(
    'name'			=> esc_html__( 'Services Three Columns Two', BUNCH_NAME ),
    'base'			=> 'bunch_services_three_col2',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show Services Three Columns Two Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Service', BUNCH_NAME ),
                'name' 			=> 'services',
                'description' 	=> esc_html__( 'Add Service', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        'type' 			=> 'icon_picker',
                        'label' 		=> esc_html__( 'Icon Picker', BUNCH_NAME ),
                        'name' 			=> 'icon',
                        'description' 	=> esc_html__( 'Choose the Icon', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'Title', BUNCH_NAME ),
                         'name' => 'title',
                         'description' => esc_html__( 'Enter Title.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'External URL', BUNCH_NAME ),
                         'name' => 'ext_url',
                         'description' => esc_html__( 'Enter External URL.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'textarea',
                         'label' => esc_html__( 'Text', BUNCH_NAME ),
                         'name' => 'text',
                         'description' => esc_html__( 'Enter Text.', BUNCH_NAME ),
                    ),
                ),
            ),
        ),

    ),
);

/**
 * Our Team Pink array.
 */
$options['bunch_our_team_pink'] = array(
			'name'			=> esc_html__( 'Our Team Pink', BUNCH_NAME ),
			'base'			=> 'bunch_our_team_pink',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Our Team Pink Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
					$heading,
                    $title,
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'team_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order
				),

			),
	);

/**
 * About Spectra array.
 */
$options['bunch_about_spectra'] = array(
    'name'			=> esc_html__( 'About Spectra', BUNCH_NAME ),
    'base'			=> 'bunch_about_spectra',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show About Spectra Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Title', BUNCH_NAME ),
				"name"			=>	"about_title",
				"description"	=>	esc_html__('Enter Title.', BUNCH_NAME )
			),
            array(
				"type"			=>	"textarea",
				"label"			=>	esc_html__('Text', BUNCH_NAME ),
				"name"			=>	"about_text",
				"description"	=>	esc_html__('Enter Text.', BUNCH_NAME )
			),
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Skills', BUNCH_NAME ),
                'name' 			=> 'skills',
                'description' 	=> esc_html__( 'Add Skill', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Skill', BUNCH_NAME ),
                        "name"			=>	"skill",
                        "description"	=>	esc_html__('Enter Skill Name.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Percentage', BUNCH_NAME ),
                        "name"			=>	"percentage",
                        "description"	=>	esc_html__('Enter Percentage.', BUNCH_NAME )
                    ),
                ),
            ),
        ),

    ),
);

/**
 * Projects Alternate Two array.
 */
$options['bunch_projects_alternate'] = array(
			'name'			=> esc_html__( 'Projects Alternate', BUNCH_NAME ),
			'base'			=> 'bunch_projects_alternate',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Alternate Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    array(
                        "type"			=>	"textarea",
                        "label"			=>	esc_html__('Quote Title', BUNCH_NAME ),
                        "name"			=>	"quote_title",
                        "description"	=>	esc_html__('Enter Quote Title to show.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Author', BUNCH_NAME ),
                        "name"			=>	"author",
                        "description"	=>	esc_html__('Enter Author Name to show.', BUNCH_NAME )
                    ),
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),

			),
	);

/**
 * Projects Vertical Two array.
 */
$options['bunch_projects_vertical'] = array(
			'name'			=> esc_html__( 'Projects Vertical', BUNCH_NAME ),
			'base'			=> 'bunch_projects_vertical',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Vertical Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    array(
                        "type"			=>	"textarea",
                        "label"			=>	esc_html__('Quote Title', BUNCH_NAME ),
                        "name"			=>	"quote_title",
                        "description"	=>	esc_html__('Enter Quote Title to show.', BUNCH_NAME )
                    ),
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),

			),
	);

/**
 * Projects Masonary Four array.
 */
$options['bunch_projects_masonary4'] = array(
			'name'			=> esc_html__( 'Projects Masonary Four', BUNCH_NAME ),
			'base'			=> 'bunch_projects_masonary4',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Masonary Four Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME),
                        "name" => "cat",
                        "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                        "description" => __( 'Choose Category.', BUNCH_NAME)
                    ),
                    $orderby,
                    $order,
				),
			),
	);

//Portfolio Filteration
$options['bunch_portfolio_filteration']	=	array(
		'name' => esc_html__('Portfolio Filteration', BUNCH_NAME),
		'base' => 'bunch_portfolio_filteration',
		'class' => '',
		'category' => esc_html__('Specta', BUNCH_NAME),
		'icon' => 'fa-briefcase' ,
		'description' => esc_html__('Show Portfolio Filteration Section', BUNCH_NAME),
		'params' => array(
			$number,
			array(
			   "type" => "textfield",
			   "label" => __('Excluded Categories ID', BUNCH_NAME ),
			   "name" => "exclude_cats",
			   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
			),
			$orderby,
			$order,
		),
);

/**
 * Abour me array.
 */
$options['bunch_about_me'] = array(
    'name'			=> esc_html__( 'About Me', BUNCH_NAME ),
    'base'			=> 'bunch_about_me',
    'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
    'icon'			=> 'fa fa-briefcase',
    'description'	=> esc_html__( 'Show About Me Section', BUNCH_NAME ),
    'tab_icons' 	=> array(
        'general' => 'et-tools',
        'styling' => 'et-adjustments',
        'animate' => 'et-lightbulb',
    ),
    'params'		=> array(
        'general'	=> array(
            array(
				"type"			=>	"textarea",
				"label"			=>	esc_html__('Heading', BUNCH_NAME ),
				"name"			=>	"heading",
				"description"	=>	esc_html__('Enter heading to show.', BUNCH_NAME )
			),
            $text,
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Service', BUNCH_NAME ),
                'name' 			=> 'choose',
                'description' 	=> esc_html__( 'Add Service', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        'type' 			=> 'icon_picker',
                        'label' 		=> esc_html__( 'Icon Picker', BUNCH_NAME ),
                        'name' 			=> 'icon',
                        'description' 	=> esc_html__( 'Choose the Icon', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'Title', BUNCH_NAME ),
                         'name' => 'title',
                         'description' => esc_html__( 'Enter Title.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'text',
                         'label' => esc_html__( 'External URL', BUNCH_NAME ),
                         'name' => 'ext_url',
                         'description' => esc_html__( 'Enter External URL.', BUNCH_NAME ),
                    ),
                    array(
                         'type' => 'textarea',
                         'label' => esc_html__( 'Text', BUNCH_NAME ),
                         'name' => 'text',
                         'description' => esc_html__( 'Enter Text.', BUNCH_NAME ),
                    ),
                ),
            ),
        ),

    ),
);

/**
 * Testimonials Pink array.
 */
$options['bunch_our_testimonials_pink'] = array(
			'name'			=> esc_html__( 'Testimonials Pink', BUNCH_NAME ),
			'base'			=> 'bunch_our_testimonials_pink',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show the Testimonials Pink Section', BUNCH_NAME ),
			'is_container'	=> true,
			'tab_icons' => array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params' => array(
                $bg_img,
                $number,
                $text_limit,
                $orderby,
                $order,
                array(
                    'type'          => 'autocomplete',
                    'label'         => esc_html__( 'Select Category', BUNCH_NAME ),
                    'name'          => 'testimonials_cat',
                    'options'       => array(
                        'taxonomy'      => 'testimonials_category',
                    ),
                ),
			),
	);

/**
 * Our Faqs array.
 */
$options['bunch_our_faqs'] = array(
	'name' => esc_html__( 'Our Faqs', BUNCH_NAME ),
	'base' => 'bunch_our_faqs',
	'class' => '',
	'category' => esc_html__( 'Specta', BUNCH_NAME ),
	'icon' => 'fa-briefcase' ,
	'description' => esc_html__( 'Show The Our Faqs.', BUNCH_NAME ),
	'params' => array(
        esc_html__( 'Information', BUNCH_NAME ) => array(
            $title,
            $text
        ),
        esc_html__( 'Links', BUNCH_NAME ) => array(
            array(
                "type"   => "text",
                "label"   => esc_html__( 'Info Title', BUNCH_NAME ),
                "name"   => "info_title",
                "description" => esc_html__( 'Enter Info Title.', BUNCH_NAME )
            ),
            array(
                'type' 			=> 'group',
                'label' 		=> esc_html__( 'Add Links', BUNCH_NAME ),
                'name' 			=> 'links',
                'description' 	=> esc_html__( 'Add Links', BUNCH_NAME ),
                'params'		=> array(
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('Page Name', BUNCH_NAME ),
                        "name"			=>	"page_name",
                        "description"	=>	esc_html__('Enter Page Name.', BUNCH_NAME )
                    ),
                    array(
                        "type"			=>	"text",
                        "label"			=>	esc_html__('External Link', BUNCH_NAME ),
                        "name"			=>	"ext_link",
                        "description"	=>	esc_html__('Enter External Link.', BUNCH_NAME )
                    ),
                ),
            ),
        ),
        esc_html__( 'Faq', BUNCH_NAME ) => array(
            $number,
            $text_limit,
            array(
                "type" => "dropdown",
                "label" => __( 'Category', BUNCH_NAME),
                "name" => "cat",
                "options" =>  bunch_get_categories(array( 'taxonomy' => 'faqs_category'), true),
                "description" => __( 'Choose Category.', BUNCH_NAME)
            ),
            $order,
            $orderby,
        ),
	),
);

//Pricing Plans
$options['bunch_pricing_table'] = array(
		'name'	=> esc_html__( 'Pricing Plan', BUNCH_NAME ),
		'base'	=> 'bunch_pricing_table',
		'category'=> esc_html__( 'Specta', BUNCH_NAME ),
		'icon'	=> 'fa fa-briefcase',
		'description'=> esc_html__( 'Add Pricing Plan', BUNCH_NAME ),
		'nested'		=> true,
		'accept_child'	=> 'bunch_pricing_plans,kc_title',
		'params'		=> array(
			$text,
		),
	);


$options['bunch_pricing_plans']	=	array(
					'name' => esc_html__('Pricing Plans', BUNCH_NAME),
					'base' => 'bunch_pricing_plans',
					'class' => '',
					'category' => esc_html__('Specta', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'is_container' => true,
					'description' => esc_html__('Show Pricing Plans.', BUNCH_NAME),
					'params' => array(
                        array(
                            "type"			=>	"toggle",
                            "label"			=>	esc_html__('Show Recomened or Not', BUNCH_NAME ),
                            "name"			=>	"recomended",
                            "description"	=>	esc_html__('Enable to show Recomended Text', BUNCH_NAME )
                        ),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Plan Name', BUNCH_NAME ),
							"name"			=>	"plan_name",
							"description"	=>	esc_html__('Enter Plan Name', BUNCH_NAME )
						),
						array(
							"type"			=>	"textarea_html",
							"label"			=>	esc_html__('Price', BUNCH_NAME ),
							"name"			=>	"content",
							"description"	=>	esc_html__('Enter Plan Price', BUNCH_NAME )
						),
						array(
							"type"			=>	"textarea",
							"label"			=>	esc_html__('Text', BUNCH_NAME ),
							"name"			=>	"description",
							"description"	=>	esc_html__('Enter Text', BUNCH_NAME )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Button Title', BUNCH_NAME ),
							"name"			=>	"btn_title",
							"description"	=>	esc_html__('Enter section Button title.', BUNCH_NAME )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Button Link', BUNCH_NAME ),
							"name"			=>	"btn_link",
							"description"	=>	esc_html__('Enter section Button Link.', BUNCH_NAME )
						),
					),
			);

/**
 * Our Services array.
 */
$options['bunch_services'] = array(
			'name'			=> esc_html__( 'Services', BUNCH_NAME ),
			'base'			=> 'bunch_services',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Services', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $text_limit,
                    $number,
                    array(
                        "type" => "dropdown",
                        "label" => __( 'Category', BUNCH_NAME ),
                        "name" => "cat",
                        "options" =>  bunch_get_categories( array( 'taxonomy' => 'services_category' ), true ),
                        "description" => __( 'Choose Category.', BUNCH_NAME )
                    ),
                    $orderby,
                    $order,
				),
			),
	);

/**
 * Contact Us array.
 */
$options['bunch_contact_us'] = array(
			'name'			=> esc_html__( 'Contact us', BUNCH_NAME ),
			'base'			=> 'bunch_contact_us',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show the contact us info', BUNCH_NAME ),
			'tab_icons' 	=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
						'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				esc_html__( 'Contact Form', BUNCH_NAME ) => array(
						$title,
						array(
							'type' 			=> 'autocomplete',
							'label' 		=> esc_html__( 'Contact Form 7', BUNCH_NAME ),
							'name' 			=> 'contact_form_7',
							'description' 	=> esc_html__( 'Choose the contact form 7', BUNCH_NAME ),
							'options'		=> array( 'post_type' => 'wpcf7_contact_form' ),
						),
                    ),
                    esc_html__( 'Contact Info', BUNCH_NAME ) => array(
                        array(
                            "type"			=>	"text",
                            "label"			=>	esc_html__('Enter Heading', BUNCH_NAME ),
                            "name"			=>	"heading",
                            "description"	=>	esc_html__('Enter Info Heading', BUNCH_NAME )
                        ),
                        array(
                            "type"			=>	"textarea",
                            "label"			=>	esc_html__('Enter Address', BUNCH_NAME ),
                            "name"			=>	"address",
                            "description"	=>	esc_html__('Enter Address', BUNCH_NAME )
                        ),
                        array(
                            "type"			=>	"text",
                            "label"			=>	esc_html__('Enter Phone Number', BUNCH_NAME ),
                            "name"			=>	"phone",
                            "description"	=>	esc_html__('Enter Phone Number', BUNCH_NAME )
                        ),
                        array(
                            "type"			=>	"text",
                            "label"			=>	esc_html__('Enter Email id', BUNCH_NAME ),
                            "name"			=>	"email",
                            "description"	=>	esc_html__('Enter Email id', BUNCH_NAME )
                        ),
                    ),
			),
	);


/**
 * Google Map array.
 */
$options['bunch_google_map']	=	array(
					'name' => esc_html__( 'Google Map', BUNCH_NAME ),
					'base' => 'bunch_google_map',
					'class' => '',
					'category' => esc_html__( 'Specta', BUNCH_NAME ),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__( 'Show google Map.', BUNCH_NAME ),
					'params' => array(
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Latitude', BUNCH_NAME ),
							"name"			=>	"latitude",
							"description"	=>	esc_html__('Enter Latitude', BUNCH_NAME )
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Enter Longitude', BUNCH_NAME ),
							"name"			=>	"longitude",
							"description"	=>	esc_html__('Enter Longitude', BUNCH_NAME )
						),
                        array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Marker Title', BUNCH_NAME ),
							"name"			=>	"marker_title",
							"description"	=>	esc_html__('Enter MArker Title', BUNCH_NAME )
						),
						array(
							"type"			=>	"textarea",
							"label"			=>	esc_html__('Enter Address', BUNCH_NAME ),
							"name"			=>	"address",
							"description"	=>	esc_html__('Enter Address', BUNCH_NAME )
						),
						array(
							"type"			=>	"attach_image_url",
							"label"			=>	esc_html__('Map Image', BUNCH_NAME ),
							"name"			=>	"map_img",
							'admin_label' 	=> 	false,
							"description"	=>	esc_html__('Upload Map Image.', BUNCH_NAME )
						),
					),
			);


//Portfolio Three Columns Filteration
$options['bunch_portfolio_three_col_filteration']	=	array(
		'name' => esc_html__('Portfolio Three Columns Filteration', BUNCH_NAME),
		'base' => 'bunch_portfolio_three_col_filteration',
		'class' => '',
		'category' => esc_html__('Specta', BUNCH_NAME),
		'icon' => 'fa-briefcase' ,
		'description' => esc_html__('Show Portfolio Three Columns Filteration Section', BUNCH_NAME),
		'params' => array(
			$number,
			array(
			   "type" => "textfield",
			   "label" => __('Excluded Categories ID', BUNCH_NAME ),
			   "name" => "exclude_cats",
			   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
			),
			$orderby,
			$order,
		),
);

//Portfolio Full Width Filteration
$options['bunch_portfolio_full_width_filteration']	=	array(
		'name' => esc_html__('Portfolio Full Width Filteration', BUNCH_NAME),
		'base' => 'bunch_portfolio_full_width_filteration',
		'class' => '',
		'category' => esc_html__('Specta', BUNCH_NAME),
		'icon' => 'fa-briefcase' ,
		'description' => esc_html__('Show Portfolio Full Width Filteration Section', BUNCH_NAME),
		'params' => array(
			$number,
			array(
			   "type" => "textfield",
			   "label" => __('Excluded Categories ID', BUNCH_NAME ),
			   "name" => "exclude_cats",
			   "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
			),
			$orderby,
			$order,
		),
);


//Portfolio Four Columns
$options['bunch_portfolio_four_columns']	=	array(
		'name' => esc_html__('Portfolio Four Colummns', BUNCH_NAME),
		'base' => 'bunch_portfolio_four_columns',
		'class' => '',
		'category' => esc_html__('Specta', BUNCH_NAME),
		'icon' => 'fa-briefcase' ,
		'description' => esc_html__('Show Portfolio Four Colummns Section', BUNCH_NAME),
		'params' => array(
			$number,
			array(
                "type" => "dropdown",
                "label" => __( 'Category', BUNCH_NAME),
                "name" => "cat",
                "options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
                "description" => __( 'Choose Category.', BUNCH_NAME)
            ),
			$orderby,
			$order,
		),
);

/**
 * Projects Masonary Five array.
 */
$options['bunch_projects_masonary5'] = array(
			'name'			=> esc_html__( 'Projects Masonary Five', BUNCH_NAME ),
			'base'			=> 'bunch_projects_masonary5',
			'category'		=> esc_html__( 'Specta', BUNCH_NAME ),
			'icon'			=> 'fa fa-briefcase',
			'description'	=> esc_html__( 'Show Projects Masonary Five Section', BUNCH_NAME ),
			'tab_icons' 	=> array(
				'general' => 'et-tools',
				'styling' => 'et-adjustments',
				'animate' => 'et-lightbulb',
			),
			'params'		=> array(
				'general'	=> array(
                    $number,
                    array(
                       "type" => "textfield",
                       "label" => __('Excluded Categories ID', BUNCH_NAME ),
                       "name" => "exclude_cats",
                       "description" => __('Enter Excluded Categories ID seperated by commas(13,14).', BUNCH_NAME )
                    ),
                    $orderby,
                    $order,
				),
			),
	);


/**
 * Blog Grid array.
 */
$options['bunch_blog_grid'] = array(
    'name' => esc_html__( 'Blog Grid', BUNCH_NAME ),
    'base' => 'bunch_blog_grid',
    'class' => '',
    'category' => esc_html__( 'Specta', BUNCH_NAME ),
    'icon' => 'fa-briefcase' ,
    'description' => esc_html__( 'Show Blog Grid Section.', BUNCH_NAME ),
    'params' => array(
        $number,
        $text_limit,
        array(
            "type" => "dropdown",
            "label" => __( 'Category', BUNCH_NAME),
            "name" => "cat",
            "options" =>  bunch_get_categories(array( 'taxonomy' => 'category'), true),
            "description" => __( 'Choose Category.', BUNCH_NAME)
        ),
        $orderby,
        $order,
    ),
);

return $options;