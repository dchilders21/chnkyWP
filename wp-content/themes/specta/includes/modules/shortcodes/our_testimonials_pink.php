<?php
$query_args = array( 'post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  
?>
<!--Testimonial Section-->
<section class="testimonial-section style-two" style="background-image:url(<?php echo esc_url( $bg_img ); ?>)">
    <div class="auto-container">
        <div class="single-item-carousel owl-carousel owl-theme">
            <?php
                while( $query->have_posts() ): $query->the_post();
                    $testimonial_meta = _WSH()->get_meta();
			?>
            
                <!--Testimonial Block-->
                <div class="testimonial-block style-two">
                <div class="inner-box">
                    <div class="quote-icon">
                        <span class="icon flaticon-left-quote-2"></span>
                    </div>
                    <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                    <div class="image">
                        <?php the_post_thumbnail( 'specta_80x80', array( 'class' => 'img-responsive' ) ); ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                </div>
            </div>
            
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End Testimonial Section-->

<?php endif;
wp_reset_postdata();