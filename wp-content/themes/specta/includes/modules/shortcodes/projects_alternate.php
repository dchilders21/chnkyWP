<!--Quote Section-->
<section class="quote-section">
    <div class="auto-container">
        <div class="quote-inner">
            <h2><?php echo wp_kses_post( $quote_title ); ?></h2>
            <div class="author"><?php echo wp_kses_post( $author ); ?></div>
            <div class="quote-icon flaticon-two-quotes"></div>
        </div>
    </div>
</section>
<!--End Quote Box-->

<?php
$count = 0;
$query_args = array( 'post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<?php 
    while( $query->have_posts() ) : $query->the_post();
     $projects_meta = _WSH()->get_meta();
     $proj_date = specta_set( $projects_meta, 'proj_date' );
     $term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
     $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
     $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
     global $post;
     if ( $count % 2 == 0 ) {
         $extr_class = '';
     } else {
         $extr_class = 'style-two';
     }
?>
    <!--Fluid Section Two-->
    <section class="fluid-section-two <?php echo esc_attr( $extr_class ); ?>">
        <div class="outer-container clearfix">

            <!--Image Column-->
            <div class="image-column" style="background-image:url(<?php echo esc_url( $post_thumbnail_url ); ?>);">
                <figure class="image-box">
                    <?php the_post_thumbnail( 'specta_960x500', array( 'class' => 'img-responsive' ) ); ?>
                </figure>
                <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e( 'Image Title Here', 'specta' ); ?>"></a>
            </div>

            <!--Content Column-->
            <div class="content-column">
                <div class="inner-column">
                    <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                    <div class="title"><?php echo implode( ', ', (array)$term_list );?></div>
                    <div class="post-date"><?php echo wp_kses_post( $proj_date ); ?></div>
                </div>
            </div>

        </div>
    </section>
    <!--End Fluid Section Two-->
<?php $count++; endwhile; ?>

<?php endif;
wp_reset_postdata();