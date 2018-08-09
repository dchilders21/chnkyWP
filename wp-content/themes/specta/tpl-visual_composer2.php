<?php /* Template Name: Footer Style Two Page */
	get_header() ;
	$meta = _WSH()->get_meta( '_bunch_header_settings' );
	$title = specta_set( $meta, 'header_title' );
?>
<?php if( specta_set( $meta, 'breadcrumb' ) ) :  ?>

    <!--Page Title-->
    <section class="page-title">
    	<div class="auto-container">
        	<div class="inner-container">
            	<h2><?php if( $title ) echo wp_kses_post( $title ); else wp_title('');?> <span class="theme_color">.</span></h2>
            </div>
        </div>
    </section>
    <!--End Page Title-->

<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer( 'second-style' ) ; ?>