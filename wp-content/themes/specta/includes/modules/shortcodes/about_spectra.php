<!--About Section-->
<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h2><?php echo wp_kses_post( $about_title ); ?> <span class="theme_color">.</span></h2>
                    <div class="text">
                        <p><?php echo wp_kses_post( $about_text ); ?></p>
                    </div>
                </div>
            </div>

            <!--Skill Column-->
            <div class="skill-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    
                    <?php if ( $skills ) :  ?>
                        <!--Skills-->
                        <div class="skills style-two">
                            <!--Skill Item-->
                            <?php foreach ( $skills as $skill ) : ?>
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
        </div>
    </div>
</section>
<!--End About Section-->