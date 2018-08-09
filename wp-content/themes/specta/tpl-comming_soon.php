<?php /* Template Name: Comming Soon Page */
	$options = _WSH()->option();
	get_header('comming-soon') ;
	$bg = (specta_set( $options, 'cs_section_img' ) ) ? specta_set( $options, 'cs_section_img' ) : get_template_directory_uri().'/images/background/4.jpg';
    $text_img = (specta_set( $options, 'cs_page_text_img' ) ) ? specta_set( $options, 'cs_page_text_img' ) : get_template_directory_uri().'/images/icons/comming-soon.png';
	$count = specta_set($options, 'cs_section_count');
	$text = specta_set($options, 'cs_section_text');
?>

<div class="comming-soon-page">
    <!--Coming Soon-->
    <section class="comming-soon">
        <!--Image Layer-->
        <div class="bg-image-layer" style="background-image:url(<?php echo esc_url( $bg ); ?>)"></div>

        <div class="auto-container">
            <div class="content">
                <div class="content-inner">
                    <div class="image">
                        <img src="<?php echo esc_url( $text_img ); ?>" alt="<?php esc_attr_e('Images', 'specta'); ?>" />
                    </div>
                    <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="<?php if($count) echo esc_attr($count); else esc_html_e('2019/8/17', 'specta');?>"></div></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer('comming-soon') ; ?>