<?php $options = _WSH()->option();
$hide_whole_footer = specta_set( $options, 'hide_whole_footer' );
$hide_upper_footer = specta_set( $options, 'hide_upper_footer' );
$hide_bottom_footer = specta_set( $options, 'hide_bottom_footer' );
$footer_logo = specta_set( $options, 'footer_logo' );
$hide_footer_menu = specta_set( $options, 'hide_footer_menu' );
$hide_footer_social = specta_set( $options, 'hide_footer_social' );
$copyright = specta_set( $options, 'copyright' );
?>

<div class="clearfix"></div>
<!--Main Footer-->
<?php if ( !$hide_whole_footer ) : ?>
    <footer class="main-footer">
        <?php if (! $hide_upper_footer ) : ?>
            <!--Upper Box-->
            <div class="upper-box">
                <div class="auto-container">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php if( $footer_logo ) echo esc_url( $footer_logo ); else echo esc_url(get_template_directory_uri(). '/images/footer-logo.png') ?>" alt="<?php esc_attr_e( 'Footer Logo', 'specta' ); ?>" />
                        </a>
                    </div>
                    <?php if ( !$hide_footer_menu ) : ?>
                        <ul class="footer-nav">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false, 
								'items_wrap' => '%3$s', 
								'depth' => 1,
								'container'=>false,
								'walker'=> new Bootstrap_walker()  
                            ) ); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if ( !$hide_footer_social ) : ?>
                        <ul class="social-icon-two">
                            <?php echo wp_kses_post(specta_get_social_icons()); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( !$hide_bottom_footer ) : ?>
            <!--Copyright-->
            <div class="copyright"><?php echo wp_kses_post( $copyright ); ?></div>
        <?php endif; ?>
    </footer>
<?php endif; ?>
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<?php wp_footer(); ?>

</body>
</html>