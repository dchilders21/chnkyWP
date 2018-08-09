<?php
add_action('after_setup_theme', 'specta_bunch_theme_setup');
function specta_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('SPECTA_VERSION')) define('SPECTA_VERSION', '1.0');
	if( !defined( 'SPECTA_ROOT' ) ) define('SPECTA_ROOT', get_template_directory().'/');
	if( !defined( 'SPECTA_URL' ) ) define('SPECTA_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('specta', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'specta'),
                'footer_menu' => esc_html__('Footer Menu', 'specta'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'specta_370x360', 370, 360, true ); // 'spectax370x360 Our Team'
	add_image_size( 'specta_528x330', 528, 330, true ); // 'spectax528x330 Projects Three Columns'
	add_image_size( 'specta_80x80', 80, 80, true ); // 'spectax80x80 Our Testimonials'
    add_image_size( 'specta_370x308', 370, 308, true ); // 'specta_370x308 Latest Blog'
    add_image_size( 'specta_676x653', 676, 653, true ); // 'spectax676x653 Projects Masonary'
    add_image_size( 'specta_474x311', 474, 311, true ); // 'spectax474x311 Projects Masonary'
    add_image_size( 'specta_575x311', 575, 311, true ); // 'spectax575x311 Projects Masonary'
    add_image_size( 'specta_1170x564', 1170, 564, true ); // 'spectax1170x564 Projects Masonary' Two
    add_image_size( 'specta_570x471', 570, 471, true ); // 'spectax570x471 Projects Masonary Two' 
    add_image_size( 'specta_792x525', 792, 525, true ); // 'spectax792x525 Projects Masonary Three'
    add_image_size( 'specta_396x262', 396, 262, true ); // 'spectax396x262 Projects Masonary Three'
    add_image_size( 'specta_396x525', 396, 525, true ); // 'spectax396x525 Projects Masonary Three'
    add_image_size( 'specta_980x400', 980, 400, true ); // 'spectax980x400 Projects Masonary Three'
    add_image_size( 'specta_396x323', 396, 323, true ); // 'spectax396x323 Projects Masonary Three'
    add_image_size( 'specta_960x500', 960, 500, true ); // 'spectax960x500 Projects Alternate'
    add_image_size( 'specta_287x655', 287, 655, true ); // 'spectax287x655 Projects Vertical'
    add_image_size( 'specta_276x252', 276, 252, true ); // 'spectax276x252 Projects Masonary Four'
    add_image_size( 'specta_276x394', 276, 394, true ); // 'spectax276x394 Projects Masonary Four'
    add_image_size( 'specta_270x175', 270, 175, true ); // 'spectax270x175 Projects Filteration'
    add_image_size( 'specta_605x362', 605, 362, true ); // 'spectax605x362 Services'
    add_image_size( 'specta_370x360', 370, 360, true ); // 'spectax370x360 Portfolio Three Columns Filteration'
    add_image_size( 'specta_560x363', 560, 363, true ); // 'specta_560x363 Blog Grid Style'
    add_image_size( 'specta_1170x493', 1170, 493, true ); // 'spectax1170x493 Portfolio detail page'
    add_image_size( 'specta_270x287', 270, 287, true ); // 'spectax270x287 Portfolio four columns'
    add_image_size( 'specta_270x350', 270, 350, true ); // 'spectax270x350 Portfolio four columns'
    add_image_size( 'specta_570x514', 570, 514, true ); // 'spectax570x514 Portfolio five columns'
    add_image_size( 'specta_270x241', 270, 241, true ); // 'spectax270x241 Portfolio five columns'
    add_image_size( 'specta_270x515', 270, 515, true ); // 'spectax270x515 Portfolio five columns'
    add_image_size( 'specta_570x241', 570, 241, true ); // 'spectax570x241 Portfolio five columns'
}
function specta_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	if( class_exists( 'Bunch_About_us' ) )register_widget( 'Bunch_About_us' );
	if( class_exists( 'Bunch_Latest_Post' ) )register_widget( 'Bunch_Latest_Post' );
	if( class_exists( 'Bunch_Footer_Logo' ) )register_widget( 'Bunch_Footer_Logo' );
	if( class_exists( 'Bunch_Services' ) )register_widget( 'Bunch_Services' );
	if( class_exists( 'Bunch_Social_Media' ) )register_widget( 'Bunch_Social_Media' );
    
    
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'specta' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'specta' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h2>',
	  'after_title' => '<span class="theme_color">.</span></h2></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'specta' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'specta' ),
	  'before_widget'=>'<div id="%1$s"  class="big-column col-md-3 col-sm-6 col-xs-12 footer-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="footer-title"><h2>',
	  'after_title' => '<span class="theme_color">.</span></h2></div>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'specta' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'specta' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h2>',
	  'after_title' => '<span class="theme_color">.</span></h2></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = specta_set(specta_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(specta_set($sidebar , 'topcopy')) continue ;
		
		$name = specta_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = specta_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sidebar-title"><h2>',
			'after_title' => '<span class="theme_color">.</span></h2></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'specta_bunch_widget_init' );
// Update items in cart via AJAX
function specta_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
		$map_path = '?key='.specta_set($options, 'map_api_key');
		wp_enqueue_script( 'specta-map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
	}
}
add_action( 'wp_enqueue_scripts', 'specta_load_head_scripts' );
//global variables
function specta_bunch_global_variable() {
    global $wp_query;
}

function specta_enqueue_scripts() {
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' );
    wp_enqueue_style( 'custom-menu', get_template_directory_uri() . '/css/custom-menu.css' );
    wp_enqueue_style( 'jquery-touchspin', get_template_directory_uri() . '/css/jquery.bootstrap-touchspin.css' );
    wp_enqueue_style( 'jquery-mCustomScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'specta-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'specta-custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'specta-unit-style', get_template_directory_uri() . '/css/tut.css' );
	wp_enqueue_style( 'specta-responsive', get_template_directory_uri() . '/css/responsive.css' );
	if(class_exists('woocommerce')) wp_enqueue_style( 'specta_woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );	
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'custom-menu', get_template_directory_uri().'/js/custom-menu.js', array(), false, true );
    wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/js/jquery.countdown.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-owl', get_template_directory_uri().'/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/js/appear.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/mixitup.js', array(), false, true );
    wp_enqueue_script( 'loadmore', get_template_directory_uri().'/js/mixitup-loadmore.js', array(), false, true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/js/isotope.js', array(), false, true );
	wp_enqueue_script( 'jquery-mCustomScrollbar', get_template_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'element', get_template_directory_uri().'/js/element-in-view.js', array(), false, true );
    wp_enqueue_script( 'map-script', get_template_directory_uri().'/js/map-script.js', array(), false, true );
	wp_enqueue_script( 'specta-main-script', get_template_directory_uri().'/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'specta_enqueue_scripts' );

/*-------------------------------------------------------------*/
function specta_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat = _x( 'on', 'Montserrat Script: on or off', 'specta' );
	$work = _x( 'on', 'Work Sans font: on or off', 'specta' );
 
    if ( 'off' !== $montserrat || 'off' !== $work ) {
        $font_families = array();
 
        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }
		
		if ( 'off' !== $work ) {
            $font_families[] = 'Work Sans:100,200,300,400,500,600,700,800,900';
        }
 
        $opt = get_option('specta'.'_theme_options');
		if ( specta_set( $opt, 'body_custom_font' ) ) {
			if ( $custom_font = specta_set( $opt, 'body_font_family' ) )
				$font_families[] = $custom_font . ':300,300i,400,400i,600,700';
		}
		if ( specta_set( $opt, 'use_custom_font' ) ) {
			$font_families[] = specta_set( $opt, 'h1_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = specta_set( $opt, 'h2_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = specta_set( $opt, 'h3_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = specta_set( $opt, 'h4_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = specta_set( $opt, 'h5_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = specta_set( $opt, 'h6_font_family' ) . ':300,300i,400,400i,600,700';
		}
		$font_families = array_unique( $font_families);
        
		$query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function specta_theme_slug_scripts_styles() {
    wp_enqueue_style( 'specta-theme-slug-fonts', specta_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'specta_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function specta_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'specta_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function specta_woo_related_products_limit() {
  global $product;
  $options = _WSH()->option();
  
  $num = specta_set($options, 'number_of_products_per_page');
  $num = ($num) ? $num : 6;
	
	$args['posts_per_page'] = $num;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'specta_jk_related_products_args' );
  function specta_jk_related_products_args( $args ) {
	$options = _WSH()->option();
	
	$rel_num = specta_set($options, 'number_of_related_products');
    $rel_num = ($rel_num) ? $rel_num : 4;
  
	$args['posts_per_page'] = $rel_num; // 4 related products
	$args['columns'] = $rel_num; // arranged in 2 columns
	return $args;
}