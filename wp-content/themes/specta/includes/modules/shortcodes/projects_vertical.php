<?php
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>
<!--Carousel Gallery Section-->
<section class="carousel-gallery-section">
    <div class="auto-container">
        <h2><?php echo wp_kses_post( $quote_title ); ?><span class="theme_color">.</span></h2>
    </div>
    <div class="inner-container">
        <div class="five-item-carousel owl-carousel owl-theme">
            <?php 
                 while( $query->have_posts() ) : $query->the_post();
                 $projects_meta = _WSH()->get_meta();
                 $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
                 global $post;
            ?>
                <!--Gallery Item Two-->
                <div class="gallery-item-two">
                    <div class="inner-box">
                        <div class="image">
                            <?php the_post_thumbnail( 'specta_287x655', array( 'class' => 'img-responsive' ) ); ?>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                                        <div class="designation"><?php echo implode( ', ', (array)$term_list );?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End Carousel Gallery Section-->

<?php endif;
wp_reset_postdata();