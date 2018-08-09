<?php
$query_args = array( 'post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :

?>

<section class="services-page-section">
    <div class="auto-container">
        <?php 
            while($query->have_posts()): $query->the_post();
             $services_meta = _WSH()->get_meta();
             $ext_url = specta_set( $services_meta, 'ext_url' );
             global $post;
             if ( $query->current_post % 2 == 0 ) :
        ?>
                <!--Services Block Three-->
                <div class="services-block-three">
                    <div class="inner-box">
                        <div class="row clearfix">

                            <!--Content Column-->
                            <div class="content-column col-md-5 col-sm-6 col-xs-12">
                                <div class="inner-column">
                                    <h3><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                                    <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                                </div>
                            </div>
                            <!--Image Column-->
                            <div class="image-column col-md-7 col-sm-6 col-xs-12">
                                <div class="inner-column">
                                    <div class="image wow fadeInRight">
                                        <a href="<?php echo esc_url( $ext_url ); ?>">
                                            <?php the_post_thumbnail( 'specta_605x362', array( 'class' => 'img-responsive' ) ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php else : ?>
        
                <!--Services Block Four-->
                <div class="services-block-four">
                    <div class="inner-box">
                        <div class="row clearfix">

                            <!--Content Column-->
                            <div class="content-column pull-right col-md-5 col-sm-6 col-xs-12">
                                <div class="inner-column">
                                    <h3><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                                    <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                                </div>
                            </div>

                            <!--Image Column-->
                            <div class="image-column pull-left col-md-7 col-sm-6 col-xs-12">
                                <div class="inner-column">
                                    <div class="image wow fadeInLeft">
                                        <a href="<?php echo esc_url( $ext_url ); ?>">
                                            <?php the_post_thumbnail( 'specta_605x362', array( 'class' => 'img-responsive' ) ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

        <?php endif; endwhile; ?>
        
    </div>
</section>

<?php endif;
wp_reset_postdata();