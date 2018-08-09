<?php /* Template Name: King Composer Without Footer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = (specta_set($meta, 'header_img')) ? specta_set($meta, 'header_img') : get_template_directory_uri().'/images/background/10.jpg';
	$title = specta_set($meta, 'header_title');
	$tagline = (specta_set($meta, 'header_tagline')) ? specta_set($meta, 'header_tagline') : '';
	$style_two = specta_set($meta, 'header_banner_styles');
?>
<?php if(specta_set($meta, 'breadcrumb')):?>

<?php if($style_two == 'style_two'):?>

    <!--Page Title-->
    <section class="page-title style-two" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
        <div class="auto-container">
            <h2><?php echo wp_kses_post($tagline); ?></h2>
            <h4><?php if($title) echo wp_kses_post($title); else wp_title('');?></h4>
        </div>
    </section>

<?php else:?>

    <!--Page Title-->
    <section class="page-title" <?php if($bg):?>style="background-image:url(<?php echo esc_url($bg)?>);"<?php endif;?>>
        <div class="auto-container">
            <h3><?php echo wp_kses_post($tagline); ?></h3>
            <h2><?php if($title) echo wp_kses_post($title); else wp_title('');?></h2>
        </div>
    </section>

<?php endif;?>

<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer( 'empty-style' ) ; ?>