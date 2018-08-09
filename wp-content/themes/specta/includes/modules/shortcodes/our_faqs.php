<?php
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['faqs_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>
<!--Faq Section-->
<section class="faq-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Info Column-->
            <div class="info-column col-md-3 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h3><?php echo wp_kses_post( $title ); ?> <span class="theme_color">.</span></h3>
                    <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                    <h3><?php echo wp_kses_post( $info_title ); ?> <span class="theme_color">.</span></h3>
                    <?php if ( $links ) :  ?>
                        <ul class="list-style-two">
                            <?php foreach ( $links as $link ) : ?>
                                <li><a href="<?php echo esc_url( specta_set( $link, 'ext_link' ) ); ?>"><?php echo wp_kses_post( specta_set( $link, 'page_name' ) ); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <!--Accordian Column-->
            <div class="accordian-column col-md-9 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <?php if( $query->have_posts() ) :  ?> 
                        <!--Accordian Box-->
                        <ul class="accordion-box">
                            <?php while( $query->have_posts() ) : $query->the_post();
                                    if ( $query->current_post == 1 ) {
                                        $ext_class = 'active-block';
                                        $current_class = 'current';
                                    } else {
                                        $ext_class = '';
                                        $current_class = '';
                                    }
                            ?>
                            
                                <!--Block-->
                                <li class="accordion block <?php echo esc_attr( $ext_class ); ?>">
                                    <div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus fa fa-angle-down"></span></div><?php the_title(); ?></div>
                                    <div class="acc-content <?php echo esc_attr( $current_class ); ?>">
                                        <div class="content">
                                            <div class="text">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Faq Section-->

<?php
wp_reset_postdata();