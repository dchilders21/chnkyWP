<?php
$query_args = array( 'post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order );
if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query( $query_args ) ; 

if ( $query->have_posts() ) :  ?>

<!--Team Section-->
<section class="team-section style-two">
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
                while($query->have_posts()): $query->the_post();
                 $team_meta = _WSH()->get_meta();
                 $ext_url = specta_set( $team_meta, 'ext_url' );
                 $designation = specta_set( $team_meta, 'designation' );
                 global $post;
            ?>
                <!--Team Block-->
                <div class="team-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?php echo esc_url( $ext_url ); ?>">
                                <?php the_post_thumbnail( 'specta_370x360', array( 'class' => 'img-responsive' ) ); ?>
                            </a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                            <div class="title"><?php echo wp_kses_post( $designation ); ?></div>
                            
                            <?php if ( $socials = specta_set( $team_meta, 'bunch_team_social' ) ):?>
                                <ul class="social-icon-one">
                                    <?php foreach( $socials as $key => $value ) :?>
                                        <li><a href="<?php echo esc_url( specta_set( $value, 'social_link' ) );?>" target="_blank"><span class="fa <?php echo esc_attr( specta_set( $value, 'social_icon' ) );?>" aria-hidden="true"></span></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            
            <?php endwhile; ?>
            
        </div>

    </div>
</section>
<!--End Team Section-->

<?php endif;
wp_reset_postdata();