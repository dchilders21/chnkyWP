<!--Services Section Two-->
<section class="services-section-two <?php if ( $without_img ) : ?>style-three<?php endif; ?>">
    <div class="auto-container">
        <div class="row clearfix">
            <?php if ( $services ) :
                foreach ( $services as $service ) :
            ?>
                <!--Services Block Two-->
                <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon <?php echo esc_attr( specta_set( $service, 'icon' ) ); ?>"></span>
                        </div>
                        <h3><a href="<?php echo esc_url( specta_set( $service, 'ext_url' ) ); ?>"><?php echo wp_kses_post( specta_set( $service, 'title' ) ); ?> <span class="theme_color">.</span></a></h3>
                        <div class="text"><?php echo wp_kses_post( specta_set( $service, 'text' ) ); ?></div>
                    </div>
                </div>
            
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<!--End Services Section Two-->