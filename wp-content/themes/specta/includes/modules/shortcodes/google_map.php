<!--Map Section-->
<section class="map-section">
    <!--Map Outer-->
    <div class="map-outer">
        <!--Map Canvas-->
        <div class="map-canvas"
            data-zoom="12"
            data-lat="<?php echo wp_kses_post( $latitude );  ?>"
            data-lng="<?php echo wp_kses_post( $longitude );  ?>"
            data-type="roadmap"
            data-hue="#ffc400"
            data-title="<?php echo wp_kses_post( $marker_title );  ?>"
            data-icon-path="<?php echo esc_url( $map_img ); ?>"
            data-content="<?php echo wp_kses_post( $address );  ?>">
        </div>
    </div>
</section>
<!--End Map Section-->