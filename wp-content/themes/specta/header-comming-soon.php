<?php $options = _WSH()->option();
	$icon_href = (specta_set( $options, 'site_favicon' )) ? specta_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.png';
    $cs_logo = specta_set( $options, 'cs_page_logo_img' );
    $cs_logo = ( $cs_logo ) ? $cs_logo : get_template_directory_uri() . '/images/logo-2.png';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
	<link rel="shortcut icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
	<link rel="icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<?php endif;?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <div class="comming-soon-page">

        <div class="page-wrapper">

            <?php if( specta_set( $options, 'preloader' ) ) :  ?>
                <!-- Preloader -->
                <div class="preloader"></div>
            <?php endif; ?>
            
            <!-- Main Header / Header Style Four-->
            <header class="main-header header-style-four alternate">

                <!--Header-Upper-->
                <div class="main-box">
                    <div class="auto-container">
                        <div class="outer-container clearfix">
                            <div class="pull-left logo-outer">
                                <div class="logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url( $cs_logo ); ?>" alt="<?php esc_attr_e('Specta', 'specta'); ?>" />
                                    </a>
                                </div>
                            </div>

                            <div class="pull-right upper-right clearfix">

                                <div class="nav-outer clearfix">
                                    <!-- Hidden Nav Toggler -->
                                    <div class="outer-box nav-toggler style-two">
                                       <div class="nav-btn"><button class="hidden-bar-opener"><span class="icon flaticon-menu-options"></span></button></div>
                                    </div>
                                    <!-- / Hidden Nav Toggler -->

                                </div>

                            </div>
                        </div>    
                    </div>
                </div>
                <!--End Header Upper-->


            </header>
            <!--End Main Header -->

            <!-- Hidden Navigation Bar -->
            <section class="hidden-bar right-align">

                <div class="hidden-bar-closer">
                    <button class="btn"><i class="flaticon-unchecked"></i></button>
                </div>

                <!-- Hidden Bar Wrapper -->
                <div class="hidden-bar-wrapper">

                    <!-- .logo -->
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( $cs_logo ); ?>" alt="<?php esc_attr_e('Specta', 'specta'); ?>" />
                        </a>			
                    </div><!-- /.logo -->

                    <!-- .Side-menu -->
                    <div class="side-menu">
                    <!-- .navigation -->
                        <ul class="navigation">
                            <?php 
                                wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'main_menu',
                                        'container_id' => 'navbar-collapse-1',
                                        'container_class'=>'navbar-collapse collapse navbar-right',
                                        'menu_class'=>'nav navbar-nav',
                                        'fallback_cb'=>false, 
                                        'items_wrap' => '%3$s', 
                                        'container'=>false,
                                        'walker'=> new Bootstrap_walker()
                                    )
                                );
                            ?>
                        </ul>
                    </div><!-- /.Side-menu -->

                    <?php if ( ! specta_set( $options, 'cs_show_sidebar_social' ) ) : ?>
                        <div class="social-icons">
                            <ul>

                                <?php $social_icons = specta_set( $options, 'social_media' );
                                    foreach( specta_set( $social_icons, 'social_media' ) as $social_icon ):
                                    if( isset( $social_icon['tocopy' ] ) ) continue; ?>
                                    <li><a href="<?php echo esc_url(specta_set( $social_icon, 'social_link' ) ); ?>"><span class="fa <?php echo esc_attr( specta_set( $social_icon, 'social_icon' ) ); ?>"></span></a></li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    <?php endif; ?>

                </div><!-- / Hidden Bar Wrapper -->
            </section>
            <!-- / Hidden Bar -->