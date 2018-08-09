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
    <!--Main Footer-->
    <footer class="footer-style-two">
    	<div class="auto-container">
        
        	<!--Widgets Section-->
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                <div class="widgets-section">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>                    
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </footer>
    <!--End Main Footer-->
<?php endif; ?>
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<?php wp_footer(); ?>

</body>
</html>