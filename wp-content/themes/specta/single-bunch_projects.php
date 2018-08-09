<?php
get_header();
$meta = _WSH()->get_meta();
$meta1 = _WSH()->get_meta('_bunch_header_portfolio_settings');
$detail_style = specta_set( $meta, 'portfolio_detail' );
$client = specta_set( $meta, 'client' );
$title = specta_set($meta1, 'header_title');

?>

<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="inner-container">
            <h2><?php if( $title ) echo wp_kses_post( $title ); else wp_title('');?> <span class="theme_color">.</span></h2>
        </div>
    </div>
</section>
<!--End Page Title-->

<section class="breadcrumb-section">
    <div class="auto-container">
        <!--Breadcrumbs-->
        <?php echo wp_kses_post(specta_get_the_breadcrumb()) ?>
    </div>
</section>




<?php if ( $detail_style == 'style_two' ) : ?>

<!--Portfolio Section One-->
<section class="portfolio-section-one">
    <div class="auto-container">
        <?php while( have_posts() ): the_post();
                $term_list = wp_get_post_terms( get_the_id(), 'portfolio_category', array( "fields" => "names" ) );
                $meta2 = _WSH()->get_meta();
        ?>
            <div class="row clearfix">
                <!--Image Column-->
                <?php if ( $gallery = specta_set( $meta, 'bunch_portfolio_gallery' ) ) : ?>
                    <!--Images Column-->
                    <div class="image-column col-md-7 col-sm-12 col-xs-12">
                        <div class="inner-column">
                            <div class="single-item-carousel owl-carousel owl-theme">
                                <?php foreach( $gallery as $key => $gall ) :  ?>
                                    <div class="slide">
                                        <div class="image">
                                            <img src="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!--Content Column-->
                <?php endif; ?>

                <!--Content Column-->
                <div class="content-column col-md-5 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2><?php the_title(); ?> <span class="theme_color">.</span></h2>
                        <div class="text">
                            <?php the_content(); ?>
                        </div>
                        <div class="portfolio-info-box style-two">
                            
                                <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names"));
                                    if ( $term_list ) :
                                ?>
                                    <h3><?php esc_html_e( 'Category', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo implode( ', ', (array)$term_list );?></div>
                                <?php endif; ?>
                                
                                <?php if ( specta_set( $meta2, 'proj_date' ) ) :  ?>
                                    <h3><?php esc_html_e( 'launch date', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'proj_date' ) ); ?></div>
                                <?php endif; ?>
                                
                                <?php if ( specta_set( $meta2, 'tags' ) ) :  ?>
                                    <h3><?php esc_html_e( 'tags', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'tags' ) ); ?></div>
                                <?php endif; ?>
                            
                                <?php if ( $socials = specta_set( $meta, 'bunch_portfolio_social' ) ) : ?>
                                    <h3><?php esc_html_e( 'Share', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="social-icon-three clearfix">
                                        <?php foreach( $socials as $key => $social ) :  ?>
                                            <a href="<?php echo esc_url( specta_set( $social, 'social_link' ) );  ?>" class="twitter"><span class="<?php echo wp_kses_post(specta_set( $social, 'social_icon' ));  ?>"></span></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <!--Post Options-->
        <div class="post-options">
            <div class="inner-box">
                <div class="clearfix">
                    <ul>
                        <li class="prev"><?php previous_post_link( '%link', '<span class="icon flaticon-left-arrow"></span>' ); ?></li>
                        <li class="next"><?php next_post_link( '%link', '<span class="icon flaticon-arrow-pointing-to-right"></span>' ); ?></li>
                        <li class="grid"><a href="#"><span class="icon flaticon-menu-options"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!--Gallery Section Five-->


<?php  elseif( $detail_style == 'style_three' ) :  ?>


<!--Portfolio Section Two-->
<section class="portfolio-section-two">
    <div class="auto-container">
        <?php while( have_posts() ): the_post();
                $term_list = wp_get_post_terms( get_the_id(), 'portfolio_category', array( "fields" => "names" ) );
                $meta2 = _WSH()->get_meta();
        ?>
        
        <?php if ( $gallery = specta_set( $meta, 'bunch_portfolio_gallery' ) ) : ?>
            <!--Images Column-->
            <div class="image-gallery">
                <?php foreach( $gallery as $key => $gall ) :  ?>
                    <div class="image">
                        <a href="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e('Gallery', 'specta'); ?>" ><img src="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" /></a>
                    </div>
                <?php endforeach; ?>
            </div>
            <!--Content Column-->
        <?php endif; ?>

            <!--Content Box-->
            <div class="content-box">
                <div class="row clearfix">
                    <!--Content Column-->
                    <div class="content-column col-md-9 col-sm-12 col-xs-12">
                        <div class="inner-column">
                            <h2><?php the_title(); ?> <span class="theme_color">.</span></h2>
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <!--Info Column-->
                    <div class="info-column col-md-3 col-sm-12 col-xs-12">
                        <div class="inner-column">
                            <div class="portfolio-info-box style-two">
                                
                                <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names"));
                                    if ( $term_list ) :
                                ?>
                                    <h3><?php esc_html_e( 'Category', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo implode( ', ', (array)$term_list );?></div>
                                <?php endif; ?>
                                
                                <?php if ( specta_set( $meta2, 'proj_date' ) ) :  ?>
                                    <h3><?php esc_html_e( 'launch date', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'proj_date' ) ); ?></div>
                                <?php endif; ?>
                                
                                <?php if ( specta_set( $meta2, 'tags' ) ) :  ?>
                                    <h3><?php esc_html_e( 'tags', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'tags' ) ); ?></div>
                                <?php endif; ?>
                                
                                <?php if ( $socials = specta_set( $meta, 'bunch_portfolio_social' ) ) : ?>
                                    <h3><?php esc_html_e( 'Share', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                    <div class="social-icon-three clearfix">
                                        <?php foreach( $socials as $key => $social ) :  ?>
                                            <a href="<?php echo esc_url( specta_set( $social, 'social_link' ) );  ?>" class="twitter"><span class="<?php echo wp_kses_post(specta_set( $social, 'social_icon' ));  ?>"></span></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        
        
        <!--Post Options-->
        <div class="post-options">
            <div class="inner-box">
                <div class="clearfix">
                    <ul>
                        <li class="prev"><?php previous_post_link( '%link', '<span class="icon flaticon-left-arrow"></span>' ); ?></li>
                        <li class="next"><?php next_post_link( '%link', '<span class="icon flaticon-arrow-pointing-to-right"></span>' ); ?></li>
                        <li class="grid"><a href="#"><span class="icon flaticon-menu-options"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!--Gallery Section Five-->


<?php elseif( $detail_style == 'style_four' ) :  ?>

<!--Portfolio Section Three-->
<section class="portfolio-section-three">
    <div class="auto-container">
        <?php while( have_posts() ): the_post();
                $term_list = wp_get_post_terms( get_the_id(), 'portfolio_category', array( "fields" => "names" ) );
                $meta2 = _WSH()->get_meta();
                $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
        ?>
            <div class="inner-container">
                <div class="image">
                    <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e('Image Title Here', 'specta'); ?>">
                        <?php the_post_thumbnail( 'specta_1170x493', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                </div>
                <h2><?php the_title(); ?> <span class="theme_color">.</span></h2>
                <div class="text"><?php the_content(); ?></div>
                <div class="portfolio-info-box-three clearfix">
                    <div class="inf-box">
                        
                        <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names"));
                                if ( $term_list ) :
                            ?>
                            <h3><?php esc_html_e( 'Category', 'specta' ); ?> <span class="theme_color">.</span></h3>
                            <div class="sub-title"><?php echo implode( ', ', (array)$term_list );?></div>
                        <?php endif; ?>
                        
                        
                    </div>
                    
                    <?php if ( specta_set( $meta2, 'proj_date' ) ) :  ?>
                        <div class="inf-box">
                            <h3><?php esc_html_e( 'launch date', 'specta' ); ?> <span class="theme_color">.</span></h3>
                            <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'proj_date' ) ); ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( specta_set( $meta2, 'tags' ) ) :  ?>
                        <div class="inf-box">
                            <h3><?php esc_html_e( 'tags', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'tags' ) ); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $socials = specta_set( $meta, 'bunch_portfolio_social' ) ) : ?>
                        <div class="inf-box">
                            <h3><?php esc_html_e( 'Share', 'specta' ); ?> <span class="theme_color">.</span></h3>
                            <div class="social-icon-three clearfix">
                                <?php foreach( $socials as $key => $social ) :  ?>
                                    <a href="<?php echo esc_url( specta_set( $social, 'social_link' ) );  ?>" class="twitter"><span class="<?php echo wp_kses_post(specta_set( $social, 'social_icon' ));  ?>"></span></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <!--Images Gallery-->
            <?php if ( $gallery = specta_set( $meta, 'bunch_portfolio_gallery' ) ) : ?>
                <!--Images Column-->
                <div class="images-gallery">
                    <div class="row clearfix">
                        <?php foreach( $gallery as $key => $gall ) :  ?>
                            <div class="column col-md-6 col-sm-12 col-xs-12">
                                <div class="image">
                                    <a href="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e('Gallery', 'specta'); ?>" ><img src="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" /></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--Content Column-->
            <?php endif; ?>
        
        <?php endwhile; ?>
        <!--Post Options-->
        <div class="post-options">
            <div class="inner-box">
                <div class="clearfix">
                    <ul>
                        <li class="prev"><?php previous_post_link( '%link', '<span class="icon flaticon-left-arrow"></span>' ); ?></li>
                        <li class="next"><?php next_post_link( '%link', '<span class="icon flaticon-arrow-pointing-to-right"></span>' ); ?></li>
                        <li class="grid"><a href="#"><span class="icon flaticon-menu-options"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!--Gallery Section Five-->


<?php else :  ?>


<!--Portfolio Section One-->
<section class="portfolio-section-one">
    <div class="auto-container">
        <?php while( have_posts() ): the_post();
                $term_list = wp_get_post_terms( get_the_id(), 'portfolio_category', array( "fields" => "names" ) );
                $meta2 = _WSH()->get_meta();
        ?>
            <div class="row clearfix">
                <!--Image Column-->
                <?php if ( $gallery = specta_set( $meta, 'bunch_portfolio_gallery' ) ) : ?>
					<!--Images Column-->
					<div class="image-column col-md-7 col-sm-12 col-xs-12">
						<div class="inner-column">
							<?php foreach( $gallery as $key => $gall ) :  ?>
								<div class="image">
									<a href="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" data-fancybox="images" class="lightbox-image popup-box" title="<?php esc_attr_e('Gallery', 'specta'); ?>" ><img src="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" /></a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<!--Content Column-->
				<?php endif; ?>
                
                <!--Content Column-->
                <div class="content-column col-md-5 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2><?php the_title(); ?> <span class="theme_color">.</span></h2>
                        <div class="text">
                            <?php the_content(); ?>
                        </div>
                        <div class="portfolio-info-box">
                            <?php $term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names"));
                                if ( $term_list ) :
                            ?>
                                <h3><?php esc_html_e( 'Category', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                <div class="sub-title"><?php echo implode( ', ', (array)$term_list );?></div>
                            <?php endif; ?>
                            
                            <?php if ( specta_set( $meta2, 'proj_date' ) ) :  ?>
                                <h3><?php esc_html_e( 'launch date', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'proj_date' ) ); ?></div>
                            <?php endif; ?>
                            
                            <?php if ( specta_set( $meta2, 'tags' ) ) :  ?>
                                <h3><?php esc_html_e( 'tags', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                <div class="sub-title"><?php echo wp_kses_post( specta_set( $meta2, 'tags' ) ); ?></div>
                            <?php endif; ?>
                            
                            <?php if ( $socials = specta_set( $meta, 'bunch_portfolio_social' ) ) : ?>
                                <h3><?php esc_html_e( 'Share', 'specta' ); ?> <span class="theme_color">.</span></h3>
                                <div class="social-icon-three clearfix">
                                    <?php foreach( $socials as $key => $social ) :  ?>
                                        <a href="<?php echo esc_url( specta_set( $social, 'social_link' ) );  ?>" class="twitter"><span class="<?php echo wp_kses_post(specta_set( $social, 'social_icon' ));  ?>"></span></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

            <!--Images Gallery-->
                    
            <?php if ( $gallery = specta_set( $meta, 'bunch_portfolio_gallery1' ) ) : ?>
                <!--Images Column-->
                <div class="image-gallery">
                    <div class="row clearfix">
                        <?php foreach( $gallery as $key => $gall ) :  ?>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                <div class="image">
                                    <a href="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e('Gallery', 'specta'); ?>" ><img src="<?php echo esc_url( specta_set( $gall, 'gallary_img' ) );  ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" /></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--Content Column-->
            <?php endif; ?>
                    
        <?php endwhile; ?>
        <!--Post Options-->
        <div class="post-options">
            <div class="inner-box">
                <div class="clearfix">
                    <ul>
                        <li class="prev"><?php previous_post_link( '%link', '<span class="icon flaticon-left-arrow"></span>' ); ?></li>
                        <li class="next"><?php next_post_link( '%link', '<span class="icon flaticon-arrow-pointing-to-right"></span>' ); ?></li>
                        <li class="grid"><a href="#"><span class="icon flaticon-menu-options"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>