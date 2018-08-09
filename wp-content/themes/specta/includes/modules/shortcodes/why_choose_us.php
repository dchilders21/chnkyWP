<!--Fluid Section One / Style Two-->
<section class="fluid-section-one style-two <?php if ( $with_bg_color ) : ?>grey-bg<?php endif; ?>">
    <div class="outer-container clearfix">
        <?php if ( $choose ) :  ?>
        
            <!--Content Column-->
            <div class="content-column">
                <div class="inner-box">
                    <?php foreach ( $choose as $chose ) :  ?>
                       <!--Featured Block-->
                       <div class="featured-block">
                            <div class="inner">
                                <div class="icon-box">
                                    <span class="icon <?php echo esc_attr( specta_set( $chose, 'icon' ) ); ?>"></span>
                                </div>
                                <h3><a href="<?php echo esc_url( specta_set( $chose, 'ext_url' ) ); ?>"><?php echo wp_kses_post( specta_set( $chose, 'title' ) ); ?> <span class="theme_color">.</span></a></h3>
                                <div class="text"><?php echo wp_kses_post( specta_set( $chose, 'text' ) ); ?></div>
                            </div>
                       </div>
                    <?php endforeach; ?>
                </div>
            </div>
        
        <?php endif; ?>
        <!--Image Column-->
        <div class="image-column" style="background-image:url(<?php echo esc_url( $sidebar_img ); ?>);">
            <figure class="image-box"><img src="<?php echo esc_url( $sidebar_img ); ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>"></figure>
        </div>

    </div>
</section>
<!--End Fluid Section One-->