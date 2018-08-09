<?php 
$options = _WSH()->option();
$about_logo = specta_set( $options, 'about_logo_image2' );
$about_logo = ( $about_logo ) ? $about_logo : get_template_directory_uri() . '/images/logo-2.png';
?>

<!-- Main Header-->
<header class="main-header header-style-two">
    <!--Header Spacing-->
    <div class="header-spacing"></div>

    <!--Header-Upper-->
    <div class="main-box">

        <div class="outer-container clearfix">
            <div class="pull-left logo-outer">
                <div class="logo">
                    
                    <?php if( specta_set( $options, 'home2_logo_image' ) ) :  ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( specta_set( $options, 'home2_logo_image' ) );  ?>" alt="<?php esc_attr_e( 'Specta', 'specta' );?>" title="<?php esc_attr_e( 'Specta', 'specta' );?>">
                        </a>
                    <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri().'/images/logo-3.png' ); ?>" alt="<?php esc_attr_e( 'Specta', 'specta' ); ?>"></a>
                    <?php endif; ?>
                    
                </div>
            </div>

            <div class="upper-right clearfix">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                
                                <?php 
                                    wp_nav_menu( 
                                        array( 
                                            'theme_location' => 'main_menu',
                                            'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false, 
                                            'items_wrap' => '%3$s', 
											'depth' => 3,
                                            'container'=>false,
                                            'walker'=> new Bootstrap_walker()
                                        )
                                    );
                                ?>
                                
                            </ul>
                        </div>
                    </nav>

                    <!-- Main Menu End-->

                    <!-- Hidden Nav Toggler -->
                    <div class="outer-box nav-toggler">
                        
                        
                        <?php 
                         if ( class_exists( 'specta' ) ) :
                            $cart_url = wc_get_cart_url();
                            if ( $cart_url ) :                                    
                        ?>
                                  <a href="<?php echo esc_url( $cart_url ); ?>" class="cart-btn">
                                    <span class="icon flaticon-shopping-bag-3"></span>
                                    <span class="cart-total">[<?php echo sprintf ( esc_html_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>]</span>
                                  </a>
                        <?php 
                             endif;
                         endif;
                        ?>
                        
                        
                       <div class="nav-btn"><button class="hidden-bar-opener"><span class="icon flaticon-menu-options"></span></button></div>
                    </div>
                    <!-- / Hidden Nav Toggler -->

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
        <button><span class="flaticon-cancel-1"></span></button>
    </div>

    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">

        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $about_logo ); ?>" alt="<?php esc_attr_e('Logo', 'specta'); ?>" />
            </a>
        </div>
        <div class="content-box">
            <h2><?php echo wp_kses_post( specta_set( $options, 'about_title2' ) ); ?></h2>
            <div class="text"><?php echo wp_kses_post( specta_set( $options, 'about_text2' ) ); ?></div>
            <?php if ( specta_set( $options, 'about_btn_title2' ) ) :  ?>
                <a href="<?php echo esc_url( specta_set( $options, 'about_btn_link2' ) ); ?>" class="theme-btn btn-style-two"><?php echo wp_kses_post( specta_set( $options, 'about_btn_title2' ) ); ?></a>
            <?php endif; ?>
        </div>
        <div class="contact-info">
            <h2><?php echo wp_kses_post( specta_set( $options, 'about_info_title2' ) ); ?></h2>
            <ul class="list-style-one">
                <?php if ( specta_set( $options, 'about_address' ) ) :  ?>
                    <li><span class="icon fa fa-map-marker"></span><?php echo wp_kses_post( specta_set( $options, 'about_address' ) ); ?></li>
                <?php endif; ?>
                <?php if ( specta_set( $options, 'about_phone' ) ) :  ?>
                    <li><span class="icon fa fa-phone"></span><?php echo wp_kses_post( specta_set( $options, 'about_phone' ) ); ?></li>
                <?php endif; ?>
                <?php if ( specta_set( $options, 'about_email' ) ) :  ?>
                    <li><span class="icon fa fa-envelope-o"></span><?php echo sanitize_email( specta_set( $options, 'about_email' ) ); ?></li>
                <?php endif; ?>
                <?php if ( specta_set( $options, 'about_week_days' ) ) :  ?>
                    <li><span class="icon fa fa-clock-o"></span><?php echo wp_kses_post( specta_set( $options, 'about_week_days' ) ); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div><!-- / Hidden Bar Wrapper -->

</section>
<!-- End / Hidden Bar -->