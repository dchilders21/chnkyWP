<?php $options = _WSH()->option();
	get_header();
	$settings  = specta_set(specta_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
	$layout = specta_set( $meta, 'layout', 'right' );
	if( !$layout || $layout == 'full' || specta_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = specta_set( $meta, 'sidebar', 'default-sidebar' );

	$layout = ( $layout ) ? $layout : 'right';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';

	$classes = ( !$layout || $layout == 'full' || specta_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	/** Update the post views counter */
	_WSH()->post_views( true );
	$title = specta_set($meta1, 'header_title');
?>
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="inner-container">
            <h2><?php if( $title ) echo wp_kses_post( $title ); else wp_title('');?></h2>
        </div>
    </div>
</section>

<!--Sidebar Page-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) : ?>
                    <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar default-sidebar">
                            <?php dynamic_sidebar( $sidebar ); ?>
                        </aside>
                    </div>
                <?php endif; ?>
			<?php endif; ?>

            <!--Content Side-->
            <div class="<?php echo esc_attr($classes);?>">

                <!--Default Section-->
                <div class="blog-single right-padd">
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post();
						global $post;
                        $term_list = wp_get_post_terms( get_the_id(), 'category', array( "fields" => "names" ) );
						$post_meta = _WSH()->get_meta();
					?>
                        <!--Blog Post-->
                        <div class="news-block-three">
                            <div class="inner-box">
                                <?php if( has_post_thumbnail() ):?>
                                <div class="image">
                                    <?php the_post_thumbnail( 'specta_1200x313', array( 'class' => 'img-responsive' ) ); ?>
                                    <div class="post-date"><?php echo get_the_date( ); ?></div>
                                </div>
                                <?php endif;?>
                                <div class="lower-content <?php if(! has_post_thumbnail() == true ) echo 'pt-0'?>">
                                    <ul class="post-meta">
                                        <li><span class="icon flaticon-user-1"></span><?php the_author();?></li>
                                        <li><span class="icon flaticon-shapes"></span><?php comments_number( wp_kses_post(__('0 Comments' , 'specta')), wp_kses_post(__('1 Comment' , 'specta')), wp_kses_post(__('% Comments' , 'specta'))); ?></li>
                                        <li><span class="icon flaticon-tags"></span><?php echo implode( ', ', (array)$term_list );?></li>
                                    </ul>
                                    <div class="text">
                                        <?php the_content(); ?>
                                        <div class="clearfix"></div>
                                        <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'specta'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?><br>
                                    </div>
                                    <div class="post-share-options clearfix">
                                        <div class="pull-left tags"><?php the_tags('Tags: ', ''); ?> </div>
                                        <?php if(function_exists('bunch_share_us')) echo wp_kses_post(bunch_share_us(get_the_id(),$post->post_name ));?>
                                    </div>
                                </div>

                                <!--Comments Area-->
                                <?php comments_template(); ?><!-- end comments -->

                                <!--Posts Nav-->
                                <div class="posts-nav">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <?php previous_post_link('%link','<div class="prev-post"><span class="fa fa-long-arrow-left"></span> &nbsp;&nbsp;&nbsp; Prev Post</div>'); ?>
                                        </div>
                                        <div class="pull-right">
                                            <?php next_post_link('%link','<div class="next-post">Next Post &nbsp;&nbsp;&nbsp; <span class="fa fa-long-arrow-right"></span> </div>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
            <!--Content Side-->

            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) : ?>
                    <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar default-sidebar">
                            <?php dynamic_sidebar( $sidebar ); ?>
                        </aside>
                    </div>
                <?php endif; ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
