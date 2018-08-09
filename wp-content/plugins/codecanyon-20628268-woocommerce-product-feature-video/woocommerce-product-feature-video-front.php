<?php if ( ! defined( 'ABSPATH' ) ) exit; 
// FEATURE VIDEO MAIN FRONT CLASS
class front_product_feature_video extends main_product_feature_video {
	
	public function __construct() {

		// ENQUEUE SCRIPTS
		add_action('wp_loaded', array( $this, 'fv_scripts_styles_front_enqueue'));
		// SINGLE PRODUCT PAGE IMAGES REMVOVE ONLY VIDEO DISPLAY
		add_action( 'woocommerce_before_single_product', array($this, 'fv_show_video_not_image' ));
		// SHOW VIDEO ON SHOP PAGE
		add_action( 'woocommerce_before_shop_loop_item', array($this, 'fv_show_video_shop_page'), 9 );
		// ADD CLASS FOR VIDEO IF WE HAVE ON SINGLE PAGE
		add_filter( 'body_class', array($this, 'fv_add_video_class_ifvideo_exist'));
	}

	// add body class if we have any video 
	public function fv_add_video_class_ifvideo_exist( $classes ) {
 		
 		global $post;

 		if ( is_product() ) {

 			$video_type_motif = get_post_meta(  $post->ID, 'motif_video_type', true );

 			if(!empty($video_type_motif) && $video_type_motif == "youtube" || $video_type_motif == "vimo" || $video_type_motif == "dailymo") {

 				$classes[] = 'motif_'.$video_type_motif;
 			}
		     
		    return $classes;
 		} 
	}

	// shop page video thumbnail
	public function fv_show_video_shop_page() {
  
		global $product;
	 	
	 	$id = $product->get_id();

		$video_type_motif = get_post_meta(  $id, 'motif_video_type', true );

		$youtube_v = get_post_meta( $id, 'motif_video_youtube', true );

		$vimeo_v = get_post_meta( $id, 'motif_video_vimo', true );

		$dailymo_v = get_post_meta( $id, 'motif_video_daily', true );

		$self_v = get_post_meta( $id, 'moti_video_selfhosted', true );

		if(!empty($youtube_v) && ($video_type_motif == 'youtube')  ) {

			$utube = get_option('motif_youtube_video_settings');

		   	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>

		  		<div class='motif_shop_page_video'>
		  			<iframe width="100%" height="<?php echo $utube['motif_hshopyou']; ?>" src="https://www.youtube.com/embed/<?php echo $youtube_v; ?>?<?php echo $utube['motif_autoplay_you'];?>&<?php echo $utube['motif_controls_you']; ?>&<?php echo $utube['motif_related_you']; ?>&<?php echo $utube['motif_title_you']; ?>" allow="autoplay" frameborder="0" <?php echo $utube['motif_allowfull_you'];?> ></iframe>
		  		</div>

		  		<?php if($utube['motif_upopup'] == '1' ) { ?>

			  		<a href="javascript:void(0)" class="button vvdiopopup_btn" id="popup_utube<?php echo $id; ?>" data-video-id="<?php echo $youtube_v; ?>" >
			  			<?php echo __('Youtube Video Popup', 'woocommerce-product-feature-video'); ?>
			  		</a>

			  		<script type="text/javascript">
			  		 	jQuery("#popup_utube<?php echo $id; ?>").modalVideo({
							youtube:{
								controls:0,
								nocookie: true,
								autoplay:1,
								showinfo:0
							}
						});
			  		</script>

		  		<?php } ?>

			<?php } else if (!empty($vimeo_v) && $video_type_motif == 'vimo')  { 

				$vimeo_s_shop = get_option('motif_vimeo_video_settings');

				remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>

				<div class='motif_shop_page_video_vimo'>
		  			<iframe width="100%" height="<?php echo $vimeo_s_shop['motif_hshop_vimo']; ?>" frameborder='0' webkitAllowFullScreen mozallowfullscreen src="https://player.vimeo.com/video/<?php echo $vimeo_v ?>?<?php echo $vimeo_s_shop['motif_autoplay_vimo'] ?>" allow="autoplay" <?php echo $vimeo_s_shop['motif_allfull_vimo'];?> ></iframe>
		  		</div>

		  		<?php if( $vimeo_s_shop['motif_popup_vimo'] == '1' ) { ?>

			  		<a href="javascript:void(0)" class="button vvdiopopup_btn" id="popup_vimo" data-video-id="<?php echo $vimeo_v; ?>" >
			  			<?php echo __('Vimeo Popup', 'woocommerce-product-feature-video'); ?>
			  		</a>

			  		<script type="text/javascript">
			  		 	jQuery("#popup_vimo").modalVideo({
							channel:'vimeo'
						});
			  		</script>

		  		<?php } ?>

				<?php } else if (!empty($dailymo_v) && $video_type_motif == 'dailymo') {

					$daily_s_shop = get_option('motif_daily_video_settings');

					remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>

					<div class='motif_shop_page_video_daily'>
			  			<iframe width="100%" height="<?php echo $daily_s_shop['motif_hshop_daily']; ?>" frameborder='0' src="http://www.dailymotion.com/embed/video/<?php echo $dailymo_v ?>?<?php echo $dailys['motif_mute_daily']; ?>&<?php echo $dailys['motif_info_daily']; ?>&<?php echo $dailys['motif_rel_daily']; ?>&<?php echo $dailys['motif_autoplay_daily']; ?>" <?php echo $dailys['motif_allfull_daily']; ?> autoplay="true" ></iframe>
			  		</div>

			  		<?php if( $daily_s_shop['motif_popup_daily'] == '1' ) { ?>

				  		<a id="fv_popu_dailymo" href="http://www.dailymotion.com/video/<?php echo $dailymo_v ?>" class="button vvdiopopup_btn">
				  			<?php echo __('Daily Motion Popup', 'woocommerce-product-feature-video'); ?>
				  		</a>

				  		<script type="text/javascript">
				  		 	jQuery("#fv_popu_dailymo").magnificPopup({type:"iframe",iframe:{patterns:{dailymotion:{index:"dailymotion.com",id:function(i){var o=i.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);return null!==o?void 0!==o[4]?o[4]:o[2]:null},src:"https://www.dailymotion.com/embed/video/%id%"}}}});
				  		</script>

			  		<?php } ?>

				<?php } else if(!empty($self_v) && $video_type_motif == 'selfhosted') {

					$self_settings = get_option('motif_self_video_settings');

					remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); ?>

						<video id="fv_selfhost<?php echo $id; ?>" class="video-js" width="<?php echo $self_settings['motif_wshop_self']; ?>" height="<?php echo $self_settings['motif_hshop_self']; ?>" >
						    <source src="<?php echo $self_v; ?>" type='video/mp4'>
						</video>
						<script type="text/javascript">
					        jQuery("#fv_selfhost<?php echo $id; ?>").show(), options = {
					            autoplay: <?php echo $self_settings['motif_autoplay_self']; ?>,
					            muted: <?php echo $self_settings['motif_mute_self']; ?>,
					            loop: <?php echo $self_settings['motif_loop_self']; ?>,
					            controls: <?php echo $self_settings['motif_controls_self']; ?>,
					            fluid: <?php echo $self_settings['motif_fluid_self']; ?>
					        }, video = videojs("fv_selfhost<?php echo $id; ?>", options);
						</script>

						<?php if( $self_settings['motif_popup_self'] == '1' ) { ?>

				  			<a href="#" id="fv_popu_self<?php echo $id; ?>" class="js-video-button button vvdiopopup_btn" data-channel="video" data-video-url="<?php echo $self_v ?>">
				  				<?php echo __('Self Hosted Popup', 'woocommerce-product-feature-video'); ?>
				  			</a>

				  			<script type="text/javascript">
				  				jQuery("#fv_popu_self<?php echo $id; ?>").modalVideo();
				  			</script>

			  			<?php } ?>

					<?php } else {

				add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
			}
	}

	// show video not images remvoe feature image 
	public function fv_show_video_not_image() {
	  	
	  	global $product;
	 	
	 	$id = $product->get_id();
		
		$video_type_motif = get_post_meta(  $id, 'motif_video_type', true );

		$youtube = get_post_meta( $id, 'motif_video_youtube', true );

		$vimo = get_post_meta( $id, 'motif_video_vimo', true );

		$daily = get_post_meta( $id, 'motif_video_daily', true );

		$self = get_post_meta( $id, 'moti_video_selfhosted', true );

		if(!empty($youtube) && ($video_type_motif == 'youtube')  ) {
			
			if ( is_single() ) {
			 
				remove_action( 'woocommerce_before_single_product_summary','woocommerce_show_product_images', 20 );
				remove_action( 'woocommerce_product_thumbnails','woocommerce_show_product_thumbnails', 20 );
				add_action( 'woocommerce_before_single_product_summary', array($this,'fv_show_product_youtube'), 20 );
			}

		} else if(!empty($vimo) && ($video_type_motif == 'vimo')  ) {

			if ( is_single()) {

				remove_action( 'woocommerce_before_single_product_summary','woocommerce_show_product_images', 20 );
				remove_action( 'woocommerce_product_thumbnails','woocommerce_show_product_thumbnails', 20 );
				add_action( 'woocommerce_before_single_product_summary', array($this,'fv_show_product_vimo'), 20 );

			}

		} else if(!empty($daily) && ($video_type_motif == 'dailymo') ) {

			if ( is_single()) {

				remove_action( 'woocommerce_before_single_product_summary','woocommerce_show_product_images', 20 );
				remove_action( 'woocommerce_product_thumbnails','woocommerce_show_product_thumbnails', 20 );
				add_action( 'woocommerce_before_single_product_summary', array($this,'fv_show_product_daily'), 20 );

			}

		} else if(!empty($self) && ($video_type_motif == 'selfhosted') ) {

			if ( is_single()) {

				remove_action( 'woocommerce_before_single_product_summary','woocommerce_show_product_images', 20 );
				remove_action( 'woocommerce_product_thumbnails','woocommerce_show_product_thumbnails', 20 );
				add_action( 'woocommerce_before_single_product_summary', array($this,'fv_show_product_self'), 20 );

			}

		}
	}
	
	// <!-- Motif Product Feature video Youtube Block -->
	public function fv_show_product_youtube() {

		global $product;
  		
	    $product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids();

  		$motif_videourl = get_post_meta( $product->get_id(), 'motif_video_youtube', true );

		$product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids(); 

	    $utube = get_option('motif_youtube_video_settings'); ?>

	    	<div class="feature_video_container" style="width: <?php echo $utube['motif_wyou']; ?> ">

				<div class='fv_frontend_embed'>
					<iframe width="auto" height="<?php echo $utube['motif_hyou']; ?>" src="https://www.youtube.com/embed/<?php echo $motif_videourl; ?>?<?php echo $utube['motif_autoplay_you'];?>&<?php echo $utube['motif_controls_you']; ?>&<?php echo $utube['motif_related_you']; ?>&<?php echo $utube['motif_title_you']; ?>" allow="autoplay" frameborder="0" <?php echo $utube['motif_allowfull_you'];?> ></iframe>
				</div>

				<div class="motif_gall_images <?php echo $video_exi; ?>">
			    	<ul>
			    		<?php foreach( $attachment_ids as $attachment_id ) { ?>
			    			<li>
						        <a class="fancybox" href="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
									<img class="fancy_box_self_style" width="100px" src="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
								</a>
							</li>
			        	<?php } ?>
		        	</ul>
		        </div>

			</div>

		<script type="text/javascript">
			jQuery(document).ready(function() {
		     	jQuery('.fancybox').fancybox();
		    });
		</script>

	<?php }
	// <!-- Motif Product Feature video Youtube Block -->


	// <!-- Motif Product Feature video vimo Block -->
	public function fv_show_product_vimo() {

		global $product;
  		
	    $product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids();

  		$motif_videovimeo = get_post_meta( $product->get_id(), 'motif_video_vimo', true );

		$product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids(); 

	    $vimo = get_option('motif_vimeo_video_settings'); ?>


		<div class="feature_video_container" style="width: <?php echo $vimo['motif_wcontain_vimo'] ?>; ">

	    	<div class='fv_frontend_embed'>
				<iframe width="100%" height="<?php echo $vimo['motif_hsingle_vimo']; ?>" frameborder='0' webkitAllowFullScreen mozallowfullscreen src="https://player.vimeo.com/video/<?php echo $motif_videovimeo ?>?<?php echo $vimo['motif_autoplay_vimo'] ?>" allow="autoplay" <?php echo $vimo['motif_allfull_vimo'];?> ></iframe>
			</div>
			<div class="motif_gall_images <?php echo $video_exi; ?>">
		    	<ul>
		    		<?php foreach( $attachment_ids as $attachment_id ) { ?>
		    			<li>
					        <a class="fancybox" href="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
								<img class="fancy_box_self_style" width="100px" src="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
							</a>
						</li>
		        	<?php } ?>
	        	</ul>
	        </div>

	    </div>

	    <script type="text/javascript">
			jQuery(document).ready(function() {
		     	jQuery('.fancybox').fancybox();
		    });
		</script>

	<?php }
	// <!-- Motif Product Feature video vimo Block -->


	// <!-- Motif Product Feature video dailymotion Block -->
	public function fv_show_product_daily() {

		global $product;
  		
	    $product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids();

  		$motif_videodaily = get_post_meta( $product->get_id(), 'motif_video_daily', true );

		$product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids(); 

	    $dailys = get_option('motif_daily_video_settings'); ?>

		<div class="feature_video_container" style="width: <?php echo $dailys['motif_wconsingle_daily'] ?>; ">

	    	<div class='fv_frontend_embed'>
				<iframe width="100%" height="<?php echo $dailys['motif_hsingle_daily']; ?>" frameborder='0' src="http://www.dailymotion.com/embed/video/<?php echo $motif_videodaily ?>?<?php echo $dailys['motif_mute_daily']; ?>&<?php echo $dailys['motif_info_daily']; ?>&<?php echo $dailys['motif_rel_daily']; ?>&<?php echo $dailys['motif_autoplay_daily']; ?>" <?php echo $dailys['motif_allfull_daily']; ?> autoplay="true" ></iframe>
			</div>
			<div class="motif_gall_images <?php echo $video_exi; ?>">
		    	<ul>
		    		<?php foreach( $attachment_ids as $attachment_id ) { ?>
		    			<li>
					        <a class="fancybox" href="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
								<img class="fancy_box_self_style" width="100px" src="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
							</a>
						</li>
		        	<?php } ?>
	        	</ul>
	        </div>

	    </div>

	    <script type="text/javascript">
			jQuery(document).ready(function() {
		     	jQuery('.fancybox').fancybox();
		    });
		</script>

	<?php }
	// <!-- Motif Product Feature video dailymotion Block -->


	// <!-- Motif Product Feature video selfhosted Block -->
	public function fv_show_product_self() {

		global $product;
  		
	    $product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids();

  		$motif_videoself = get_post_meta( $product->get_id(), 'moti_video_selfhosted', true );

		$product = new WC_product($product->get_id());
	    $attachment_ids = $product->get_gallery_image_ids(); 

	    $selfh = get_option('motif_self_video_settings'); ?>

		<div class="feature_video_container" style="width: <?php echo $selfh['motif_wcontain_self'] ?>; ">
	    	
	    	<div class='fv_frontend_embed'>
				
				<video id="fv_selfhostshop<?php echo $product->get_id(); ?>" class="video-js" width="<?php echo $selfh['motif_wsingle_self']; ?>" height="<?php echo $selfh['motif_hsingle_self']; ?>" >
				    <source src="<?php echo $motif_videoself; ?>" type='video/mp4'>
				</video>

			</div>
			
			<div class="motif_gall_images <?php echo $video_exi; ?>">
		    	<ul>
		    		<?php foreach( $attachment_ids as $attachment_id ) { ?>
		    			<li>
					        <a class="fancybox" href="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
								<img class="fancy_box_self_style" width="100px" src="<?php echo wp_get_attachment_url($attachment_id, 'thumbnail'); ?>">
							</a>
						</li>
		        	<?php } ?>
	        	</ul>
	        </div>

	    </div>

	    <script type="text/javascript">

	    	jQuery("#fv_selfhostshop<?php echo $product->get_id(); ?>").show(), options = {
	            autoplay: <?php echo $selfh['motif_autoplay_self']; ?>,
	            muted: <?php echo $selfh['motif_mute_self']; ?>,
	            loop: <?php echo $selfh['motif_loop_self']; ?>,
	            controls: <?php echo $selfh['motif_controls_self']; ?>,
	            fluid: <?php echo $selfh['motif_fluid_self']; ?>
	        }, video = videojs("fv_selfhostshop<?php echo $product->get_id(); ?>", options);

			jQuery(document).ready(function() {
		     	jQuery('.fancybox').fancybox();
		    });
		</script>

	<?php }
	// <!-- Motif Product Feature video selfhosted Block -->


	// enqueue scripts and styles for front
	public function fv_scripts_styles_front_enqueue() { 

		wp_enqueue_script('jquery');

		wp_enqueue_style( 'fv-front-css', plugins_url( 'styles/fontend-style.css', __FILE__ ), false );

		wp_enqueue_style( 'fv-fancybox-css', plugins_url( 'styles/jquery.fancybox.css', __FILE__ ), false );

		wp_enqueue_style( 'fv-videomodal-css', plugins_url( 'styles/modal-video.min.css', __FILE__ ), false );

		wp_enqueue_script( 'fv-fancybox-js', plugins_url( 'scripts/jquery.fancybox.js', __FILE__ ), false );

		wp_enqueue_script( 'fv-videomodal-js', plugins_url( 'scripts/jquery-modal-video.min.js', __FILE__ ), false );

		wp_enqueue_style( 'fv-mgf-css', plugins_url( 'styles/magnific-popup.css', __FILE__ ), false );

		wp_enqueue_script( 'fv-mgf-js', plugins_url( 'scripts/jquery.magnific-popup.min.js', __FILE__ ), false );

		wp_enqueue_style( 'fv-video-css', plugins_url( 'styles/video-js.css', __FILE__ ), false );

		wp_enqueue_script( 'fv-video-js', plugins_url( 'scripts/video.js', __FILE__ ), false );
	} 

}
new front_product_feature_video();