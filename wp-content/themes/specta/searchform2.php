<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'specta' ); ?></label>
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search', 'specta' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'specta' ); ?>"><span class="icon fa fa-search"></span></button>
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>