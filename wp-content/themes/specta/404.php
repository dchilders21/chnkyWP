<?php
$options = _WSH()->option();
get_header();
$bg_img = specta_set($options, 'error_page_bg');
$error_img = specta_set($options, 'error_page_bg_error');
$heading = specta_set($options, 'error_page_heading');
$text = specta_set($options, 'error_page_text');
$btn_title = specta_set($options, 'error_page_btn_title');
?>

<!--Error Section-->
<section class="error-section" style="background-image:url(<?php if($bg_img) echo esc_url( $bg_img ); else echo esc_url(get_template_directory_uri() . '/images/background/3.jpg');?>)">
    <div class="auto-container">
        <div class="content">
            <div class="error-image">
                <img src="<?php if($error_img) echo esc_url( $error_img ); else echo esc_url(get_template_directory_uri() . '/images/resource/error-img.png'); ?>" />
            </div>
            <h2><?php if($heading) echo wp_kses_post( $heading ); else esc_html_e('ERROR: We cannott seem to find what you are looking for .', 'specta');?></h2>
            <div class="text">
			
            <?php if($text) echo wp_kses_post( $text ); else esc_html_e('Regrud going asininely angelic less lighted bought flung reindeer however irrespective solemnly as here onthe listlessly thus famous.', 'specta');?>
			
            </div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn home-btn btn-style-one"><?php if( $btn_title ) echo wp_kses_post( $btn_title ); else esc_html_e('back to home', 'specta'); ?></a>
        </div>
    </div>
</section>
<!--End Error Section-->

<?php get_footer('error-page'); ?>