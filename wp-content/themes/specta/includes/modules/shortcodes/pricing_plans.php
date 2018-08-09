<!--Price Block-->
<div class="price-block <?php if ( $recomended ) : ?>active<?php endif; ?> col-md-4 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="top-title"><?php esc_html_e( 'recommended', 'specta' ); ?></div>
        <div class="content">
            <div class="title"><span class="theme_color">.</span> <?php echo wp_kses_post( $plan_name ); ?> <span class="theme_color">.</span></div>
            <div class="price"><?php echo wp_kses_post( $content ); ?></div>
            <div class="text"><?php echo wp_kses_post( $description ); ?></div>
            <a href="<?php echo esc_url( $btn_link );  ?>" class="theme-btn btn-style-three"><?php echo wp_kses_post( $btn_title ); ?></a>
        </div>
    </div>
</div>