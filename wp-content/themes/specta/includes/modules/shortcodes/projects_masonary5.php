<?php $count = 0;
$args = array( 'post_type' => 'bunch_projects', 'showposts' => $num, 'orderby' => $sort, 'order' => $order );
$terms_array = explode( ",", $exclude_cats );
if ( $exclude_cats  ) $args['tax_query'] = array( array( 'taxonomy' => 'projects_category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN' ) );
$query = new WP_Query( $args );
$t = $GLOBALS['_bunch_base'];
?>

<?php 
if ( $query->have_posts() ) :
ob_start();
$fliteration = array();

while( $query->have_posts() ) : $query->the_post();
$portfolio_meta = _WSH()->get_meta();
$term_list = wp_get_post_terms( get_the_id(), 'projects_category', array( "fields" => "names" ) );
global  $post;
$post_terms = get_the_terms( get_the_id(), 'projects_category' );
foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
$temp_category = get_the_term_list( get_the_id(), 'projects_category', '', ', ' );
$post_terms = wp_get_post_terms( get_the_id(), 'projects_category' );
$term_slug = '';
if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
if ( $count > 6 ) {
     $count = 0;
 }
 if( $count == 0 ) { 
    $image_size = 'specta_570x514';
    $class ="col-md-6 col-sm-12 col-xs-12";
    $delay_time = '0ms';
 } elseif( $count == 1 || $count == 3 || $count == 4 || $count == 6 ) {
    $image_size = 'specta_270x241';
    $class ="col-md-3 col-sm-6 col-xs-12";
    $delay_time = '300ms';
 } elseif( $count == 2 ) {
    $image_size = 'specta_270x515';
    $class ="col-md-3 col-sm-6 col-xs-12";
    $delay_time = '600ms';
 } elseif( $count == 5 ) {
    $image_size = 'specta_570x241';
    $class ="col-md-6 col-sm-6 col-xs-12";
    $delay_time = '900ms';
 } else {
    $image_size = 'specta_270x241';
    $class ="col-md-3 col-sm-6 col-xs-12";
    $delay_time = '300ms';
 }
?>


<!--Gallery Item Four-->
<div class="gallery-item-two style-two masonry-item all <?php echo esc_attr( $term_slug ); ?> <?php echo esc_attr( $class ); ?>">
    <div class="inner-box wow fadeIn">
        <div class="image">
            <?php the_post_thumbnail( $image_size, array( 'class' => 'img-responsive' ) ); ?>
            <div class="overlay-box">
                <div class="overlay-inner">
                    <div class="content">
                        <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span class="theme_color">.</span></a></h3>
                        <div class="designation"><?php echo implode( ', ', (array)$term_list );?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $count++; endwhile;?>
<?php wp_reset_postdata();
$data_posts = ob_get_contents();
ob_end_clean();

endif ;
ob_start(); ?>

<?php $terms = get_terms( array( 'portfolio_category' ) ); ?>

<!--Gallery Mixitup Section-->
<section class="gallery-masonry-section">
    <div class="auto-container">
        <!--MixitUp Galery-->
        <div class="sortable-masonry">

            <!--Filter-->
            <div class="filters clearfix">

                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter=".all"><?php esc_html_e( 'Show All Works', 'specta' );?></li>
                    <?php foreach ( $fliteration as $t ) : ?>
                        <li class="filter" data-filter=".<?php echo esc_attr(specta_set( $t, 'slug' ) ); ?>"><?php echo wp_kses_post( specta_set( $t, 'name' ) ); ?></li>
                    <?php endforeach;?>
                </ul>

            </div>

            <div class="items-container row clearfix">

                <!--Gallery Item Four-->
                <?php echo wp_kses_post( $data_posts ); ?>


            </div>

        </div>

    </div>
</section>
<!--End Gallery Mixitup Section-->