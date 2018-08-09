<!--Talk Section-->
<section class="talk-section style-two">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Column-->
            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="icon-box">
                        <span class="icon flaticon-right-arrow-1"></span>
                    </div>
                    <h3><?php echo wp_kses_post( $heading ); ?></h3>
                    <div class="text"><?php echo wp_kses_post( $title ); ?></div>
                </div>
            </div>
            <!--Button Column-->
            <div class="button-column col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <a href="<?php echo esc_url( $btn_link ); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post( $btn_title ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Talk Section-->