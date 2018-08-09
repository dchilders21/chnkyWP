<?php
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<!--Leader Section-->
<section class="leader-section">
    <div class="auto-container">
        <!--Title Box-->
        <div class="title-box">
            <h2><?php echo wp_kses_post( $heading ); ?></h2>
            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        </div>

        <div class="row clearfix">
            <?php 
				while( $query->have_posts() ) : $query->the_post();
				 $projects_meta = _WSH()->get_meta();
                 $delay_time = specta_set( $projects_meta, 'delay_time' );
                 $delay_time = ( $delay_time ) ? $delay_time : '0ms';
                 $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
                 $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	             $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                 if( specta_set( $projects_meta, 'extra_width' ) == 'extra_width' && specta_set( $projects_meta, 'extra_height' ) == 'extra_height' ) { 
					$image_size = 'specta_1170x564';
                    $class ="col-md-12 col-sm-12 col-xs-12";
				 } elseif( specta_set( $projects_meta, 'extra_width' ) == 'normal_width' && specta_set( $projects_meta, 'extra_height' ) == 'normal_height' ) {
					$image_size = 'specta_570x471';
                    $class ="col-md-6 col-sm-6 col-xs-12";
				 } else {
					$image_size = 'specta_1170x564';
                    $class ="col-md-12 col-sm-12 col-xs-12";
				 }
                 global $post;
			?>
            
                <!--Gallery Item-->
                <div class="gallery-item <?php echo esc_attr( $class ); ?>">
                    <div class="inner-box wow fadeIn" data-wow-duration="300ms" data-wow-delay="<?php echo esc_attr( $delay_time ); ?>">
                        <div class="image">
                            <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e( 'Image Title Here', 'specta' ); ?>">
                                <?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
                            </a>
                            <div class="overlay-box">
                                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span>.</span> </a><?php echo implode( ', ', (array)$term_list );?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            
        </div>

    </div>
</section>
<!--End Leader Section-->

<?php endif;
wp_reset_postdata();