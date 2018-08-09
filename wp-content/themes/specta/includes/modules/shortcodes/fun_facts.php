<!--Counter Section-->
<section class="counter-section">
    <div class="auto-container">
        
        <?php if ( $facts ) : ?>
        
            <div class="fact-counter">
                <div class="row clearfix">
                    <?php foreach ( $facts as $fact ) :  ?>
                        <!--Column-->
                        <div class="column counter-column col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <div class="icon-box">
                                    <span class="icon <?php echo esc_attr( $fact->icon );  ?>"></span>
                                </div>
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2000" data-stop="<?php echo wp_kses_post( $fact->stop_num );  ?>">0</span>
                                </div>
                                <h4 class="counter-title"><?php echo wp_kses_post( $fact->title );  ?></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        
        <?php endif; ?>
        
    </div>
</section>
<!--End Counter Section-->