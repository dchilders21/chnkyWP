<?php
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
?>


<!--Gallery Item Four-->
<div class="gallery-item mix all <?php echo esc_attr( $term_slug ); ?> col-md-4 col-sm-6 col-xs-12">
    <div class="inner-box">
        <div class="image">
            <a href="<?php echo esc_url( $post_thumbnail_url ); ?>" data-fancybox="gallery" class="lightbox-image popup-box" title="<?php esc_attr_e( 'Image Title Here', 'specta' ); ?>">
                <?php the_post_thumbnail( 'specta_528x330', array( 'class' => 'img-responsive' ) ); ?>
            </a>
            
            <div class="overlay-box">
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?> <span>.</span> </a><?php echo implode( ', ', (array)$term_list );?></h3>
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
<section class="gallery-section-five fullwidth-section load-more-gallery">
    
    <!--MixitUp Galery-->
    <div class="mixitup-gallery load-more-gallery-two">
        <div class="auto-container">
            <!--Filter-->
            <div class="filters clearfix">

                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all"><?php esc_html_e( 'Show All Works', 'specta' );?></li>
                    <?php foreach ( $fliteration as $t ) : ?>
                        <li class="filter" data-filter=".<?php echo esc_attr(specta_set( $t, 'slug' ) ); ?>"><?php echo wp_kses_post( specta_set( $t, 'name' ) ); ?></li>
                    <?php endforeach;?>
                </ul>

            </div>
        </div>

        <div class="filter-gallery row clearfix">

            <!--Gallery Item Four-->
            <?php echo wp_kses_post( $data_posts ); ?>


        </div>

        <!--Load More Btn-->
        <div class="loadmore"></div>

    </div>
        
</section>
<!--End Gallery Mixitup Section-->