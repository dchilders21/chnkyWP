<?php
$query_args = array( 'post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :
?>

<!--Services Section-->
<section class="services-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="inner-title">
                <h2><?php echo wp_kses_post( $heading ); ?></h2>
                <div class="title"><?php echo wp_kses_post( $title ); ?></div>
            </div>
        </div>

        <div class="row clearfix">

            <?php 
				while( $query->have_posts() ) : $query->the_post();
				 $services_meta = _WSH()->get_meta();
                 $icon = specta_set( $services_meta, 'fontawesome' );
				 $ext_url = specta_set( $services_meta, 'ext_url' );
                 global $post;
			?>
                <div class="services-block col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="icon-box">
                        <span class="icon <?php echo esc_attr( $icon ); ?>"></span>
                    </div>
                    <h3><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title();  ?></a></h3>
                    <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>

    </div>
</section>
<!--End Services Section-->

<?php endif;
wp_reset_postdata();