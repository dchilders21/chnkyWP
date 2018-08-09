<?php $options = _WSH()->option(); ?>

<!-- Main Header / Visible On Mobile-->
<header class="main-header mobile-visible">
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

                    </div>

                </div>
            </div>    
        </div>
    </div>
    <!--End Header Upper-->
</header>
<!--End Main Header -->


<!-- Side Navigation Two -->
<section class="side-nav-two">

    <!-- Hidden Bar Wrapper -->
    <div class="side-nav-wrapper">

        <!-- .logo -->
        <div class="logo">
            <?php if( specta_set( $options, 'logo_image' ) ) :  ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( specta_set( $options, 'logo_image' ) );  ?>" alt="<?php esc_attr_e( 'Specta', 'specta' );?>" title="<?php esc_attr_e( 'Specta', 'specta' );?>">
                </a>
            <?php else: ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri().'/images/logo.png' ); ?>" alt="<?php esc_attr_e( 'Specta', 'specta' ); ?>"></a>
            <?php endif; ?>			
        </div><!-- /.logo -->

        <!-- .Side Nav -->
        <nav class="side-nav">
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
							'depth' => 3,
                            'container'=>false,
                            'walker'=> new Bootstrap_walker()
                        )
                    );
                ?>
            </ul>
        </nav><!-- /.Side-menu -->
        
        <?php if ( ! specta_set( $options, 'head_social_5' ) ) : ?>
            <div class="social-links">
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