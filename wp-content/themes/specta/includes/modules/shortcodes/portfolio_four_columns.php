<?php
$count = 1;
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<!--Gallery Section Six-->
<section class="gallery-section-six">
    <div class="auto-container">
        <div class="masonry-items-container row clearfix">
            <?php
                while( $query->have_posts() ) : $query->the_post();
                 $projects_meta = _WSH()->get_meta();
                 $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
                 $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
                 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                 global $post;
                 if ( $count > 8 ) {
                     $count = 1;
                 }
                 if ( $count == 1 || $count == 3 || $count == 7 || $count == 8 ) {
                     $img_size = 'specta_270x287';
                 } else {
                     $img_size = 'specta_270x350';
                 }
            ?>
                <!--Gallery Item Six-->
                <div class="gallery-item-six masonry-item small-column col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <?php the_post_thumbnail( $img_size, array( 'class' => 'img-responsive' ) ); ?>
                            <div class="overlay-box">
                                <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e( 'Portfolio', 'specta' ); ?>">
                                    <span class="fa fa-expand"></span>
                                </a>
                                <a class="link-btn" href="<?php echo esc_url(get_permalink(get_the_id()));?>"><span class="flaticon-link"></span></a>
                            </div>
                        </div>
                        <div class="lower-box">
                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                            <div class="title"><?php echo implode( ', ', (array)$term_list );?></div>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; ?>
        </div>
    </div>
</section>
<!--Gallery Section Five-->

<?php endif;
wp_reset_postdata();