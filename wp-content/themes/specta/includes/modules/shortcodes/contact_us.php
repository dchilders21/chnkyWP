<!--Contact Page Section-->
<section class="contact-page-section">
    <div class="auto-container">
        <h2><?php echo wp_kses_post( $title ); ?></h2>

        <!--Contact Form-->
        <div class="contact-form">
            <?php if ( $contact_form_7 ) : ?>

                <?php echo do_shortcode( '[contact-form-7 id="'.$contact_form_7.'"]' ); ?>

            <?php endif; ?>
        </div>
        <!--Contact Form-->

    </div>
</section>
<!--End Contact Page Section-->

<!--Contact Info Section-->
<section class="contact-info-section">
    <div class="auto-container">
        <div class="office"><?php echo wp_kses_post( $heading ); ?></div>
        <ul>
            <li><?php echo wp_kses_post( $address ); ?></li>
            <li><?php echo wp_kses_post( $phone ); ?></li>
            <li><?php echo sanitize_email( $email ); ?></li>
        </ul>
    </div>
</section>
<!--End Contact Info Section-->