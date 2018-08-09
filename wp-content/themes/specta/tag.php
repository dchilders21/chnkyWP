<?php specta_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	if(specta_set($_GET, 'layout_style')) $layout = specta_set($_GET, 'layout_style'); else
	$layout = specta_set( $meta, 'layout', 'right' );
	$sidebar = specta_set( $meta, 'sidebar', 'blog-sidebar' );
	$view = specta_set( $meta, 'view', 'list' ) ? specta_set( $meta, 'view', 'list' ) : 'list';
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12' : ' content-side col-lg-9 col-md-8 col-sm-12 col-xs-12 ';
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
<!-- Sidebar Page -->
<div class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">
			<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<aside class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">        
						<div class="sidebar default-sidebar">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
				</aside>
				<?php } ?>
			<?php endif; ?>
			<!-- Left Content -->
			<section class="<?php echo esc_attr($classes);?>">
                <div class="blog-right-sidebar blog-sidebar-page right-padd">
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
                </div>
				<!-- Pagination -->
				<?php specta_the_pagination(); ?>
			</section>
			<!-- sidebar area -->
			<!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<aside class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">       
						<div class="sidebar default-sidebar">
							<?php dynamic_sidebar( $sidebar ); ?>
						</div>
					</aside>
				<?php }?>
			<?php endif; ?>
			<!-- sidebar area -->
		</div>
	</div>
</div>
<?php get_footer(); ?>