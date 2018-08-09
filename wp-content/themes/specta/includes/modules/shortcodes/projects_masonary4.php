<?php
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<!--Gallery Section Four-->
<section class="gallery-section-four">
    <div class="inner-container">
        <div class="masonry-items-container row clearfix">
            <?php 
                while( $query->have_posts() ) : $query->the_post();
                 $projects_meta = _WSH()->get_meta();
                 $delay_time = specta_set( $projects_meta, 'delay_time' );
                 $delay_time = ( $delay_time ) ? $delay_time : '0ms';
                 $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
                 if( specta_set( $projects_meta, 'extra_width' ) == 'normal_width' && specta_set( $projects_meta, 'extra_height' ) == 'normal_height' ) {
                    $image_size = 'specta_276x252';
                    $class ="small-column col-lg-3 col-md-4 col-sm-6 col-xs-12";
                 } elseif( specta_set( $projects_meta, 'extra_width' ) == 'normal_width' && specta_set( $projects_meta, 'extra_height' ) == 'extra_height' ) {
                    $image_size = 'specta_276x394';
                    $class ="small-column col-lg-3 col-md-4 col-sm-6 col-xs-12";
                 } else {
                    $image_size = 'specta_276x252';
                    $class ="small-column col-lg-3 col-md-4 col-sm-6 col-xs-12";
                 }
                 global $post;
            ?>
            
                <!--Gallery Item Three-->
                <div class="gallery-item-three masonry-item small-column col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeIn" data-wow-duration="300ms" data-wow-delay="<?php echo esc_attr( $delay_time ); ?>">
                        <div class="image">
                            <?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
                            <div class="overlay-box">
                                <div class="content">
                                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span> <span class="title"><?php echo implode( ', ', (array)$term_list );?></span></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End Gallery Section Four-->

<?php endif;
wp_reset_postdata();