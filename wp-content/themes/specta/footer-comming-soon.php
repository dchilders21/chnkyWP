<?php $options = _WSH()->option(); ?>        
<!--Comming Soon Nav-->
        <section class="comming-soon-nav">
            <div class="auto-container">
                <ul>
                    <?php $social_icons = specta_set( $options, 'cs_social_media' );
                            if ( $social_icons ) :
                            foreach( specta_set( $social_icons, 'cs_social_media' ) as $social_icon ):
                            if( isset( $social_icon['tocopy' ] ) ) continue; ?>
                            <li><a href="<?php echo esc_url(specta_set( $social_icon, 'social_link' ) ); ?>"><?php echo wp_kses_post( specta_set( $social_icon, 'title' ) ); ?></a></li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
        </section>
        <!--End Comming Soon Nav-->
    </div>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<?php wp_footer(); ?>
</body>
</html>