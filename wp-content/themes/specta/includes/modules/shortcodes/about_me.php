<!--Services Section-->
<section class="services-section alternate">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="title-box">
            <h2><?php echo wp_kses_post( $heading ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        </div>
        <?php if ( $choose ) :  ?>
            <div class="row clearfix">
                <?php foreach ( $choose as $chose ) :  ?>
                    <!--Services Block-->
                    <div class="services-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon <?php echo esc_attr( specta_set( $chose, 'icon' ) ); ?>"></span>
                            </div>
                            <h3><a href="<?php echo esc_url( specta_set( $chose, 'ext_url' ) ); ?>"><?php echo wp_kses_post( specta_set( $chose, 'title' ) ); ?></a></h3>
                            <div class="text"><?php echo wp_kses_post( specta_set( $chose, 'text' ) ); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--End Services Section-->