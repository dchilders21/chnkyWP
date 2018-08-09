<?php
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<!--Gallery Section-->
<section class="gallery-section">
    <div class="outer-container">
        <div class="clearfix">
            <?php 
				while( $query->have_posts() ) : $query->the_post();
				global $post;
				 $projects_meta = _WSH()->get_meta();
                 $delay_time = specta_set( $projects_meta, 'delay_time' );
                 $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
                 $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	             $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                 global $post;
			?>
            
                <!--Gallery Item-->
                <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeIn" data-wow-duration="300ms" data-wow-delay="<?php echo esc_attr( $delay_time ); ?>">
                        <div class="image">
                            <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e( 'Image Title Here', 'specta' ); ?>"><?php the_post_thumbnail( 'specta_528x330', array( 'class' => 'img-responsive' ) ); ?></a>
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
<!--End Gallery Section-->

<?php endif;
wp_reset_postdata();