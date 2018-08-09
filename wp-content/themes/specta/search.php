<?php specta_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
	$layout = specta_set( $settings, 'search_page_layout', 'right' );
	$sidebar = specta_set( $settings, 'search_page_sidebar', 'default-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$layout = ( $layout ) ? $layout : 'right';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	$classes = ( !$layout || $layout == 'full' || specta_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$title = specta_set($settings, 'search_page_header_title');
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
            
            <?php if(have_posts()):?>
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                <section class="blog-right-sidebar blog-sidebar-page right-padd">
                    <!--Blog Post-->
                    <div class="thm-unit-test">
					<?php while( have_posts() ): the_post();?>
						<!-- blog post item -->
						<!-- Post -->
						<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
							<?php get_template_part( 'blog' ); ?>
						<!-- blog post item -->
						</div><!-- End Post -->
					<?php endwhile;?>
                    </div>
                    <br><br>
                    <!--Pagination-->
                    <?php specta_the_pagination(); ?>
                </section>
			<?php else : ?>
                <div class="<?php echo esc_attr($classes);?> blog_post_area eco-search">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'specta' ); ?></p>
                    <aside class="sidebar">
                    <?php get_search_form(); ?>
                    </aside>
                </div>
			<?php endif; ?>
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