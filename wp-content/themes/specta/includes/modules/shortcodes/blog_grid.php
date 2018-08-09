<?php
$query_args = array( 'showposts' => $num, 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['category_name'] = $cat;
$query = new WP_Query($query_args);
if ( $query->have_posts() ) :
?>

<!--Services Page Section-->
<section class="blog-page-section load-more-section" data-load-number="2">
    <div class="auto-container">
        <div class="row clearfix">
            <?php  $count = 0; while ( $query->have_posts() ) : $query->the_post();
                if ( $count % 2 == 0 ) {
                    $delay = "0ms";
                } else {
                    $delay = "500ms";
                }
            ?>
                <!--News Block-->
                <div class="news-block-two column <?php if ( $count > 5 ) : ?>load-more-item<?php endif; ?> col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-box <?php if ( $count < 5 ) : ?>wow fadeIn<?php endif; ?>" data-wow-duration="300ms" <?php if ( $count < 5 ) : ?>data-wow-delay="<?php echo esc_attr( $delay ); ?>"<?php endif; ?>>
                        <div class="image">
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                                <?php the_post_thumbnail( 'specta_560x363', array( 'class' => 'img-responsive' ) ); ?>
                            </a>
                            <div class="post-date"><?php echo get_the_date(); ?></div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                            <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-btn theme-btn"><?php esc_html_e( 'read more', 'specta' ); ?></a>
                        </div>
                    </div>
                </div>
            <?php $count++; endwhile; ?>
        </div>

        <div class="btn-box text-center">
            <a href="#" class="theme-btn btn-style-four load-more-btn"><?php esc_html_e( 'load more', 'specta' ); ?></a>
        </div>

    </div>
</section>
<!--End Services Section Two-->

<?php endif; wp_reset_postdata();