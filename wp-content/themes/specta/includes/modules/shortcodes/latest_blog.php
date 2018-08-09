<?php
$query_args = array( 'showposts' => $num, 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['category_name'] = $cat;
$query = new WP_Query($query_args);
if ( $query->have_posts() ) :
?>

<!--News Section-->
<section class="news-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <div class="inner-title">
                <h2><?php echo wp_kses_post( $heading ); ?></h2>
                <div class="title"><?php echo wp_kses_post( $title ); ?></div>
            </div>
        </div>
        <div class="row clearfix">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            
                <!--News Block-->
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                                <?php the_post_thumbnail( 'specta_370x308', array( 'class' => 'img-responsive' ) ); ?>
                            </a>
                            <div class="post-date"><?php echo get_the_date(); ?></div>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><a href="#"><span class="icon flaticon-user-1"></span><?php the_author(); ?></a></li>
                                <li><a href="#"><span class="icon flaticon-shapes"></span><?php comments_number( wp_kses_post(__('0' , 'specta')), wp_kses_post(__('1' , 'specta')), wp_kses_post(__('%' , 'specta'))); ?></a></li>
                            </ul>
                            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                            <div class="text"><?php echo wp_trim_words( get_the_content(), $text_limit ); ?></div>
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-btn theme-btn"><?php esc_html_e( 'read more', 'specta' ); ?></a>
                        </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!--End News Section-->

<?php endif; wp_reset_postdata();