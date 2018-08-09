<?php $options = _WSH()->option();
	get_header();
	$settings  = specta_set(specta_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
	$layout = specta_set( $meta, 'layout', 'right' );
	$sidebar = specta_set( $meta, 'sidebar', 'default-sidebar' );
	$layout = ( $layout ) ? $layout : 'right';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	$classes = ( !$layout || $layout == 'full' || specta_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$title = specta_set($meta, 'header_title');
?>
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="inner-container">
            <h2><?php if( $title ) echo wp_kses_post( $title ); else wp_title('');?></h2>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page-->
<div class="sidebar-page-container">
	<div class="auto-container">
        <div class="row clearfix">
            
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar default-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                <section class="blog-right-sidebar blog-sidebar-page right-padd">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
						<?php while( have_posts() ): the_post();?>
                            <!-- blog post item -->
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php comments_template(); ?><!-- end comments -->
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'specta'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
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
                        <?php endwhile;?>
                    </div>
                    <!--Pagination-->
                    <?php specta_the_pagination(); ?>
                </section>
            </div>
            <!--Content Side-->
            
            <!--Sidebar-->	
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar default-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            <!--Sidebar-->
            
        </div>
    </div>
</div>

<?php get_footer(); ?>