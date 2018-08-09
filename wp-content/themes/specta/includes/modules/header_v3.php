<?php 
$options = _WSH()->option();
$about_logo = specta_set( $options, 'about_logo_image3' );
$about_logo = ( $about_logo ) ? $about_logo : get_template_directory_uri() . '/images/logo-2.png';
?>


<!-- Main Header / Header Style Four-->
<header class="main-header header-style-four">
    <!--Header Spacing-->
    <div class="header-spacing"></div>

    <!--Header-Upper-->
    <div class="main-box">
        <div class="auto-container">
            <div class="outer-container clearfix">
                <div class="pull-left logo-outer">
                    
                    <div class="logo">
                        
                        <?php if( specta_set( $options, 'logo_image' ) ) :  ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( specta_set( $options, 'logo_image' ) );  ?>" alt="<?php esc_attr_e( 'Specta', 'specta' );?>" title="<?php esc_attr_e( 'Specta', 'specta' );?>">
                            </a>
                        <?php else: ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri().'/images/logo.png' ); ?>" alt="<?php esc_attr_e( 'Specta', 'specta' ); ?>"></a>
                        <?php endif; ?>                        
                        
                    </div>
                    
                </div>

                <div class="pull-right upper-right clearfix">

                    <div class="nav-outer clearfix">
                        <!-- Hidden Nav Toggler -->
                        <div class="outer-box nav-toggler">
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
                <img src="<?php echo esc_url( $about_logo ); ?>" alt="<?php esc_attr_e('Logo', 'specta'); ?>" />
            </a>			
            
        </div><!-- /.logo -->

        <!-- .Side-menu -->
        <div class="side-menu">
        <!-- .navigation -->
            <ul class="navigation">
                
                <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                    'container_class'=>'navbar-collapse collapse navbar-right',
                    'menu_class'=>'nav navbar-nav',
                    'fallback_cb'=>false, 
                    'items_wrap' => '%3$s', 
					'depth' => 3,
                    'container'=>false,
                    'walker'=> new Bootstrap_walker()  
                 ) ); ?>
                
            </ul>
        </div><!-- /.Side-menu -->
        
        <?php if ( ! specta_set( $options, 'head_social_2' ) ) : ?>
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