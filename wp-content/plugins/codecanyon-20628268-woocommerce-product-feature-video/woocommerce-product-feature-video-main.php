<?php 

/*
Plugin Name: Woocommerce Product Feature Video
Plugin URI: http://motif-creatives.com
Description: This Motif awesome plugin can add the youtube video as a feature thumbnail instead of picture
Author: motifcreatives
Version: 1.0.8
Developed By: motifcreatives
Author URI: http://motif-creatives.com/
Support: http://support@motifsolution.com
textdomain: woocommerce-product-feature-video
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit; 
	
//Exit if woocommerce not installed
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function motif_check_woocommerce() {

		// Deactivate the plugin
		deactivate_plugins(__FILE__);
		$error_message = __('<div class="error notice"><p>This plugin requires <a href="http://wordpress.org/extend/plugins/woocommerce/">WooCommerce</a> plugin to be installed and active!</p></div>', 'woocommerce-product-feature-video');
		die($error_message);
	}

	add_action( 'admin_notices', 'motif_check_woocommerce' );
}
	
// FEATURE VIDEO MAIN CLASS
class main_product_feature_video {
	
	public function __construct() {
		
		// FEATURE VIDEO MODULE CONSTANT
		$this->fv_plugin_constant();

		// ADDING CONDITIONAL LOGICS FOR ADDING FILES
		if(is_admin()) {
			require_once(fv_plugin_dir.'woocommerce-product-feature-video-admin.php');
			require_once(fv_plugin_dir.'woocommerce-product-feature-video-setting.php');
		} else {
			require_once(fv_plugin_dir.'woocommerce-product-feature-video-front.php');
		}

		// ENQUEUE SCRIPTS AND STYLES FOR MAIN
		add_action( 'wp_loaded', array( $this, 'fv_scripts_styles_enqueue' ));

		// SAVING SETTINGS 
		add_action( 'wp_ajax_motif_settingvideo', array($this,'motif_setting_saveing_callback' ));
  		add_action( 'wp_ajax_nopriv_motif_settingvideo', array($this,'motif_setting_saveing_callback' ));

  		// DELETE SAVE VIDEO META
  		add_action( 'wp_ajax_remove_video_action', array($this,'motif_remove_video_callback' ));
  		add_action( 'wp_ajax_nopriv_remove_video_action', array($this,'motif_remove_video_callback' ));

	}

	// CALLBACK REMVOVE PRODUCT VIDEO AJAX
	public function motif_remove_video_callback() {

		if(isset($_POST['condition']) && $_POST['condition'] == "remove_video_motif") {

			$video_type = $_POST['video_type'];

			if(!empty($video_type) && $video_type == "youtube") {
				delete_post_meta($_POST['id'], 'motif_video_type');
				delete_post_meta($_POST['id'], 'motif_video_youtube');
			}

			if(!empty($video_type) && $video_type == "vimo") {
				delete_post_meta($_POST['id'], 'motif_video_type');
				delete_post_meta($_POST['id'], 'motif_video_vimo');
			}

			if(!empty($video_type) && $video_type == "dailymo") {
				delete_post_meta($_POST['id'], 'motif_video_type');
				delete_post_meta($_POST['id'], 'motif_video_daily');
			}

			if(!empty($video_type) && $video_type == "selfhosted") {
				delete_post_meta($_POST['id'], 'motif_video_type');
				delete_post_meta($_POST['id'], 'moti_video_selfhosted');
			}

		} die();
	}

	// SAVING VIDEO SETTINGS OPTIONS
	public function motif_setting_saveing_callback() {
  
	  	if(isset($_POST['condition']) && $_POST['condition'] == "setting_motif") {

	  		// ----------------------------
			// Youtube video settings options
			// ----------------------------

			$youtube_vido_settings = array(
				"motif_allowfull_you" => $_POST['motif_utube_fullscreen'],
				"motif_autoplay_you" => $_POST['motif_utube_autoplay'],
				"motif_controls_you" => $_POST['motif_utube_controls'],
				"motif_related_you" => $_POST['motif_utube_related'],
				"motif_title_you" => $_POST['motif_utube_showinfo'],
				"motif_hyou" => $_POST['motif_utube_height'],
				"motif_wyou" => $_POST['motif_utube_width'],
				"motif_hshopyou" => $_POST['motif_utube_height_shop'],
				"motif_upopup" => $_POST['motif_utube_showpopup'],
			);

			update_option('motif_youtube_video_settings',$youtube_vido_settings);

			// ----------------------------
			// Vimeo video settings options
			// ----------------------------

			$vimo_vido_settings = array(
				"motif_allfull_vimo" => $_POST['motif_vimeo_fullscreen'],
				"motif_autoplay_vimo" => $_POST['motif_vimeo_autoplay'],
				"motif_hshop_vimo" => $_POST['motif_vimo_hshop'],
				"motif_wcontain_vimo" => $_POST['motif_vimo_wcontainer'],
				"motif_hsingle_vimo" => $_POST['motif_vimo_hsingle'],
				"motif_popup_vimo" => $_POST['motif_vimo_popup'],
			);

			update_option('motif_vimeo_video_settings',$vimo_vido_settings);

			// ----------------------------
			// Dailymotion video settings options
			// ----------------------------

			$daily_vido_settings = array(
				"motif_allfull_daily" => $_POST['motif_daily_fullscreen'],
				"motif_autoplay_daily" =>$_POST['motif_daily_autoplay'],
				"motif_mute_daily" =>$_POST['motif_daily_mute'],
				"motif_info_daily" =>$_POST['motif_daily_info'],
				"motif_rel_daily" =>$_POST['motif_daily_rel'],
				"motif_hsingle_daily" =>$_POST['motif_daily_hsingle'],
				"motif_wconsingle_daily" =>$_POST['motif_daily_wconsingle'],
				"motif_hshop_daily" =>$_POST['motif_daily_hshop'],
				"motif_popup_daily" =>$_POST['motif_daily_popup'],
			);

			update_option('motif_daily_video_settings',$daily_vido_settings);

			// ----------------------------
			// Selfhosted video settings options
			// ----------------------------

			$self_vido_settings = array(
				"motif_autoplay_self" => $_POST['myself_autoplay'],
				"motif_mute_self" => $_POST['myself_mute'],
				"motif_loop_self" => $_POST['myself_loop'],
				"motif_controls_self" => $_POST['myself_controls'],
				"motif_fluid_self" => $_POST['myself_fluid'],
				"motif_hsingle_self" => $_POST['myself_hsingle'],
				"motif_wsingle_self" => $_POST['myself_wsingle'],
				"motif_wshop_self" => $_POST['myself_wshopsingle'],
				"motif_hshop_self" => $_POST['myself_hshopsingle'],
				"motif_wcontain_self" => $_POST['myself_wcontanier'],
				"motif_popup_self" => $_POST['myself_popup'],
			);

			update_option('motif_self_video_settings', $self_vido_settings);

	  	}

	  die();
	}

	// MODULE CONSTANT
	public function fv_plugin_constant() {

		if ( !defined( 'fv_plugin_url' ) )
	    define( 'fv_plugin_url', plugin_dir_url( __FILE__ ) );

	    if ( !defined( 'fv_plugin_basename' ) )
	    define( 'fv_plugin_basename', plugin_basename( __FILE__ ) );

	    if ( ! defined( 'fv_plugin_dir' ) )
	    define( 'fv_plugin_dir', plugin_dir_path( __FILE__ ) );
	}

	// SCRIPTS AND STYLES FOR MAIN CLASS
	public function fv_scripts_styles_enqueue() { 

		wp_enqueue_script('jquery');

		wp_enqueue_style( 'fv-bootstrap-css', plugins_url( '/styles/bootstrap-iso.css', __FILE__ ), false );

		wp_enqueue_script( 'fv-bootstrap-js', plugins_url( '/scripts/bootstrap.min.js', __FILE__ ), false);
		
		if ( function_exists( 'load_plugin_textdomain' ) )
				load_plugin_textdomain( 'motif-woo-product-tabs', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );	
	} 	

} new main_product_feature_video();

