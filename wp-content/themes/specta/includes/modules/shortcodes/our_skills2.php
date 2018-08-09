<!--Fluid Section Two-->
<section class="fluid-section-two">
    <div class="outer-container clearfix">

        <!--Content Column-->
        <div class="content-column">
            <div class="inner-column">
                <?php if ( $skills ) :  ?>
                   <!--Skills-->
                    <div class="skills style-two">

                        <?php foreach ( $skills as $skill ) : ?>
                            <!--Skill Item-->
                            <div class="skill-item">
                                <div class="skill-header clearfix">
                                    <div class="skill-title"><?php echo wp_kses_post( specta_set( $skill, 'skill' ) ); ?></div>
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr( specta_set( $skill, 'percentage' ) ); ?>">0</span>%</div></div>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner"><div class="bar progress-line" data-width="<?php echo esc_attr( specta_set( $skill, 'percentage' ) ); ?>"></div></div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!--Image Column-->
        <div class="image-column" style="background-image:url(<?php echo esc_url( $sidebar_img ); ?>);">
            <figure class="image-box"><img src="<?php echo esc_url( $sidebar_img ); ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>"></figure>
        </div>

    </div>
</section>
<!--End Fluid Section One-->