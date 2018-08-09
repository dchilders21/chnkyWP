<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
// FEATURE VIDEO ADMIN CLASS
class admin_product_feature_video extends main_product_feature_video {
	
	public function __construct() {

		// ENQUEUE SCRIPTS FOR ADMIN CLASS
		add_action( 'wp_loaded', array( $this, 'fv_scripts_styles_enqueue_admin' ));
		// ADDING PRODUCT DATA PANALS
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'motif_admin_add_product_data_tab' ));
		// CALLBACK PRODUCT DATA PANALS
		add_action( 'woocommerce_product_data_panels', array( $this, 'fv_woo_product_data_fields' ));
		// SAVING META IF SIMPLE 
		add_action( 'woocommerce_process_product_meta_simple', array( $this, 'motif_save_paintcal_product_data_fields'  ));
	}

	// ADD PRODUCT DATA TAB
	public function motif_admin_add_product_data_tab( $product_data_tabs ) {
	    $product_data_tabs['motif_video'] = array(
	        'label' => __( 'Feature Video ', 'woocommerce-product-feature-video' ),
	        'target' => 'motif_video_option'
	    );
	    return $product_data_tabs;
	}

	// ADD UI FOR PRODUCT DATA TAB
	public function fv_woo_product_data_fields() {
   		
   		global $post; 

   		$video_type_motif = get_post_meta( $post->ID, 'motif_video_type', true );

   		$fv_youtube = get_post_meta( $post->ID, 'motif_video_youtube', true ); 

   		$fv_vimo = get_post_meta( $post->ID, 'motif_video_vimo', true );

   		$fv_daily = get_post_meta( $post->ID, 'motif_video_daily', true );

   		$fv_self = get_post_meta( $post->ID, 'moti_video_selfhosted', true ); ?> 

   		<div id="motif_video_option" class="panel woocommerce_options_panel">
   			<div class="bootstrap-iso main-feature-video">
   				<div class="row">
   						
   					<div class="col-md-8 col-md-offset-2">
   						<div class="form-group">
		   					<select id="motif_video_type" name="motif_video_type" class="form-control">
								<option value="none"><?php _e('Select Video Type', 'woocommerce-product-feature-video'); ?></option>
								<option value="youtube" <?php selected( $video_type_motif, 'youtube' ); ?>><?php _e('Youtube', 'woocommerce-product-feature-video'); ?></option>
								<option value="vimo" <?php selected( $video_type_motif, 'vimo' ); ?>><?php _e('Vimeo', 'woocommerce-product-feature-video'); ?></option>
								<option value="dailymo" <?php selected( $video_type_motif, 'dailymo' ); ?>><?php _e('Daily Motion', 'woocommerce-product-feature-video'); ?></option>
								<option value="selfhosted" <?php selected( $video_type_motif, 'selfhosted' ); ?>><?php _e('Self Hosted', 'woocommerce-product-feature-video'); ?></option>
							</select>
   						</div>
   					</div>

   				</div>
   				<!-- end of row -->

   				<div class="row motif_video_container">
   					
   					<div id="video_del_alert" style="display: none;" class="alert alert-success">
					    <strong>Success!</strong> Video Deleted Successuflly...
					</div>

					<div id="video_upload_self" style="display: none;" class="alert alert-success">
					    <strong>Success!</strong> Video Uploaded Successuflly...
					</div>

					<!-- youtube video starts here -->
   					<div class="youtube box">
   						<div class="col-md-8">
							<div class="form-group">
								<label for="motif_video_youtube"><?php echo __( 'Add Youtube Video Here', 'woocommerce-product-feature-video' ); ?></label>
							    <input type="text" class="form-control" name="motif_video_youtube" value="<?php echo $fv_youtube; ?>">
							    <small id="fileHelp" class="form-text text-muted"><?php echo __('Please Add Youtube Video Id here e.g https://www.youtube.com/watch?v=<span style="color:red;">j_jvPsdfrs4</span>', 'woocommerce-product-feature-video'); ?></small>
							</div>

	   						<?php if(!empty($fv_youtube)) { ?>
	   							<button type="button" onclick="mo_delete_video('<?php echo $post->ID; ?>','<?php echo $video_type_motif; ?>');" class="btn btn-danger"><?php echo __('Delete Video', 'woocommerce-product-feature-video'); ?>
	   							</button>
	   						<?php } ?>

   						</div>
	   					<div class="col-md-4">
	   						<div class='fv_backend_embed'>
	   							<?php if(!empty($fv_youtube)) { ?>
	   								<iframe src='https://www.youtube.com/embed/<?php echo $fv_youtube; ?>'></iframe>
	   							<?php } ?>
	   						</div>
	   					</div>
   					</div>
   					<!-- end of youtube -->

   					<!-- vimeo video starts here -->
   					<div class="vimo box">
   						<div class="col-md-8">
							<div class="form-group">
								<label for="motif_video_vimo"><?php echo __( 'Add Vimeo Video Here', 'woocommerce-product-feature-video' ); ?></label>
							    <input type="text" class="form-control" name="motif_video_vimo" value="<?php echo $fv_vimo; ?>">
							    <small id="fileHelp" class="form-text text-muted"><?php echo __('Please Add Vimeo Video Id here e.g https://www.vimeo.com/video/=<span style="color:red;">34423456</span>', 'woocommerce-product-feature-video'); ?></small>
							</div>

	   						<?php if(!empty($fv_vimo)) { ?>
	   							<button type="button" onclick="mo_delete_video('<?php echo $post->ID; ?>','<?php echo $video_type_motif; ?>');" class="btn btn-danger"><?php echo __('Delete Video', 'woocommerce-product-feature-video'); ?>
	   							</button>
	   						<?php } ?>

   						</div>
	   					<div class="col-md-4">
	   						<div class='fv_backend_embed'>
	   							<?php if(!empty($fv_vimo)) { ?>
	   								<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen src='https://player.vimeo.com/video/<?php echo $fv_vimo; ?>'></iframe>
	   							<?php } ?>
	   						</div>
	   					</div>
   					</div>
   					<!-- vimeo video ends here -->

   					<!-- daily motion video starts here -->
   					<div class="dailymo box">
   						<div class="col-md-8">
							<div class="form-group">
								<label for="motif_video_daily"><?php echo __( 'Add Dailymotion Video Here', 'woocommerce-product-feature-video' ); ?></label>
							    <input type="text" class="form-control" name="motif_video_daily" value="<?php echo $fv_daily; ?>">
							    <small id="fileHelp" class="form-text text-muted"><?php echo __('Please Add DailyMotion Video Id here e.g http://www.dailymotion.com/embed/video/=<span style="color:red;">34423456</span>', 'woocommerce-product-feature-video'); ?></small>
							</div>

	   						<?php if(!empty($fv_daily)) { ?>
	   							<button type="button" onclick="mo_delete_video('<?php echo $post->ID; ?>','<?php echo $video_type_motif; ?>');" class="btn btn-danger"><?php echo __('Delete Video', 'woocommerce-product-feature-video'); ?>
	   							</button>
	   						<?php } ?>

   						</div>
	   					<div class="col-md-4">
	   						<div class='fv_backend_embed'>
	   							<?php if(!empty($fv_daily)) { ?>
	   								<iframe frameborder="0" allowfullscreen src='http://www.dailymotion.com/embed/video/<?php echo $fv_daily; ?>'></iframe>
	   							<?php } ?>
	   						</div>
	   					</div>
   					</div>
   					<!-- end of daily motion -->

   					<!-- selfhosted video starts here -->
   					<div class="selfhosted box">
   						<div class="col-md-8">
							<div class="form-group">
								<label for="motif_video_selfhosted"><?php echo __( 'Add Self Hosted Video Here', 'woocommerce-product-feature-video' ); ?></label>
							    <input id="moti_video_self" type="text" class="form-control" name="motif_video_selfhosted" value="<?php echo $fv_self; ?>">
								<input type="hidden" name="moti_video_selfhosted" id="moti_video_selfhosted" value="<?php echo $fv_self; ?>">
							</div>
   						</div>
	   					<div class="col-md-4">
	   						<button id="motif_self_hosted" type="button" class="fv_selfupload_btn btn btn-primary"><?php echo __('Upload Video', 'woocommerce-product-feature-video'); ?>
	   						</button>
	   					</div>
	   					<?php if(!empty($fv_self)) { ?>
   							<div class="col-md-4">
	   							<button type="button" onclick="mo_delete_video('<?php echo $post->ID; ?>','<?php echo $video_type_motif; ?>');" class="fv_selfupload_btn btn btn-danger"><?php echo __('Delete Video', 'woocommerce-product-feature-video'); ?>
	   							</button>
   							</div>
   						<?php } ?>
   					</div>
   					<!-- end of selfhosted here -->
   				
   				</div>
   				<!-- row container end here -->

   			</div><!-- Bootstraps end here -->
		</div><!-- Main end here start here -->

		<script type="text/javascript">
   			jQuery(document).ready(function(){
			    jQuery("#motif_video_type").change(function(){
			        jQuery(this).find("option:selected").each(function(){
			            if(jQuery(this).attr("value")=="youtube"){
			                jQuery(".box").not(".youtube").hide();
			                jQuery(".youtube").show();
			            }
			            else if(jQuery(this).attr("value")=="youtube"){
			                jQuery(".box").not(".youtube").hide();
			                jQuery(".youtube").show();
			            }
			            else if(jQuery(this).attr("value")=="vimo"){
			                jQuery(".box").not(".vimo").hide();
			                jQuery(".vimo").show();
			            }
			            else if(jQuery(this).attr("value")=="dailymo"){
			                jQuery(".box").not(".dailymo").hide();
			                jQuery(".dailymo").show();
			            }
			            else if(jQuery(this).attr("value")=="selfhosted"){
			                jQuery(".box").not(".selfhosted").hide();
			                jQuery(".selfhosted").show();
			            }
			            else{
			                jQuery(".box").hide();
			            }
			        });
			    }).change();
			});

   			function mo_delete_video($id, $vido_type) {
   				
   				var ajaxurl = "<?php echo admin_url( 'admin-ajax.php'); ?>";
   				var video_type = jQuery("#motif_video_type").val();
				var condition = 'remove_video_motif';
				var id = $id;
				jQuery.ajax({
					url : ajaxurl,
					type : 'post',
					data : {
						action : 'remove_video_action',
						condition : condition,
						video_type : video_type,
						id : id,
					},
					success : function(response) {
						jQuery("#video_del_alert").show().delay(3000).fadeOut("slow");
					}
				});
   			}

   			jQuery(document).ready(function($){
			    jQuery('#motif_self_hosted').click(function(e) {
			        e.preventDefault();
			        var image = wp.media({ 
			            title: 'Upload Image',
			            multiple: false
			        }).open()
			        .on('select', function(e){
			     
			         	var uploaded_image = image.state().get('selection').first();
			            var image_url = uploaded_image.toJSON().url;

			        	jQuery('#moti_video_selfhosted').val(image_url);
			        	jQuery('#moti_video_self').val(image_url);
			        	jQuery("#video_upload_self").show().delay(3000).fadeOut("slow");

			        });
			    });
			});

   		</script>

    <?php }

    // SAVING PRODUCT DATA 
	public function motif_save_paintcal_product_data_fields($post_id) {
		
		if ( isset( $_POST['motif_video_type'] ) ) :
			update_post_meta( $post_id, 'motif_video_type', sanitize_text_field( $_POST['motif_video_type'] ) );
		endif;

		if ( isset( $_POST['motif_video_youtube'] ) && !empty($_POST['motif_video_youtube']) ) :
			update_post_meta( $post_id, 'motif_video_youtube', sanitize_text_field( $_POST['motif_video_youtube'] ) );
		endif;

		if ( isset( $_POST['motif_video_vimo'] ) && !empty($_POST['motif_video_vimo']) ) :
			update_post_meta( $post_id, 'motif_video_vimo', sanitize_text_field( $_POST['motif_video_vimo'] ) );
		endif;

		if ( isset( $_POST['motif_video_daily'] ) && !empty($_POST['motif_video_daily']) ) :
			update_post_meta( $post_id, 'motif_video_daily', sanitize_text_field( $_POST['motif_video_daily'] ) );
		endif;

		if ( isset( $_POST['moti_video_selfhosted'] ) && !empty($_POST['moti_video_selfhosted']) ) :
			update_post_meta( $post_id, 'moti_video_selfhosted', sanitize_text_field( $_POST['moti_video_selfhosted'] ) );
		endif;
		
	}

	// SCRIPTS AND STYLES FOR ADMIN CLASS
	public function fv_scripts_styles_enqueue_admin() { 

		wp_enqueue_style( 'fv-backend-styles-css', plugins_url( '/styles/backend-style.css', __FILE__ ), false );
		
	} 	

}
new admin_product_feature_video();