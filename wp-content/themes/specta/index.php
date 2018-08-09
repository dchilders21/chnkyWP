<?php specta_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	if( $wp_query->is_posts_page ) {
		$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
		$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
		if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
		$layout = specta_set( $meta, 'layout', 'right' );
		$sidebar = specta_set( $meta, 'sidebar', 'default-sidebar' );
		$title = specta_set($meta1, 'header_title');
	} else {
		$settings  = _WSH()->option(); 
		if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
		$layout = specta_set( $settings, 'archive_page_layout', 'right' );
		$sidebar = specta_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
		$title = specta_set($settings, 'archive_page_header_title');
	}
	$layout = specta_set( $_GET, 'layout' ) ? specta_set( $_GET, 'layout' ) : $layout;
	$layout = ( $layout ) ? $layout : 'right';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || specta_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	?>
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="inner-container">
                <h2><?php if( $title ) echo wp_kses_post( $title ); else esc_html_e('Blog', 'specta');?></h2>
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
                        <?php specta_the_pagination(); ?>
                        
                    </section>
                </div>
                <!--Content Side-->
                
                <!--Sidebar-->	
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
                <!--Sidebar-->
            </div>
        </div>
    </div>
<?php get_footer(); ?>