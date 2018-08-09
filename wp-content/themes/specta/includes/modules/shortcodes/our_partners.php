<!--Clients Section-->
<section class="clients-section">
    <div class="auto-container">
        <?php if ( $partners ) : ?>
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <?php foreach ( $partners as $partner ) :  ?>
                        <li class="slide-item">
                            <figure class="image-box">
                                <a href="<?php echo esc_url( specta_set( $partner, 'ext_url' ) ); ?>"><img src="<?php echo esc_url( specta_set( $partner, 'partner_img' ) ); ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>"></a>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--End Clients Section-->