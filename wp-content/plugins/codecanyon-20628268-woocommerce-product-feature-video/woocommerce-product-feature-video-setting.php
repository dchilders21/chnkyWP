<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
// FEATURE VIDEO SETTINGS CLASS
class settings_product_feature_video extends main_product_feature_video {
	
	public function __construct() {

		// ENQUEUE SETTINGS OPTIONS SCRIPTS AND STYLES
		add_action('wp_loaded', array($this,'fv_scripts_styles_settings'));
		// SETTINGS PAGE
		add_action('admin_menu', array($this, 'motif_feature_video_pages'));

	}

	// CREATING PAGE CALLBACK ADMIN MENU
	public function motif_feature_video_pages() {

	  	add_menu_page(
	            'Mofit Settings', __('Feature Video Setting', 'woocommerce-product-feature-video'), 'manage_options','motif-support',
	             array($this,'motif_admin_setting_callback'),
	              fv_plugin_url.'images/motif-menu-cion.png', 10
	        );
 	}

 	// CALLBACK SETTING OPTIONS
 	public function motif_admin_setting_callback() { ?>
	    
		<div id="extedndons-tabs">

			<div class="motif-tabs-ulli">
				
				<div class="motif-logo-ui">
					<div class="motif_logo"><?php _e('Plugin Options - Powered by Motif Creatives Group', 'woocommerce-product-feature-video'); ?></div>
				</div>

				<ul class="motif_tab_ul">

			        <li>
			            <a href="#m_youtube">
			            	<span class="dashicons dashicons-video-alt3"></span>
			            	<?php _e('Youtube Video Settings', 'woocommerce-product-feature-video'); ?></a>
			        </li>

			        <li>
			            <a href="#m_vimo">
			            	<span class="dashicons dashicons-video-alt3"></span>
			            	<?php _e('Vimeo Video Settings', 'woocommerce-product-feature-video'); ?></a>
			        </li>

			        <li>
			            <a href="#m_daily">
			            	<span class="dashicons dashicons-video-alt3"></span>
			            	<?php _e('Daily Motion Video Settings', 'woocommerce-product-feature-video'); ?></a>
			        </li>

			        <li>
			            <a href="#m_self">
			            	<span class="dashicons dashicons-video-alt3"></span>
			            	<?php _e('Self Hosted Video Settings', 'woocommerce-product-feature-video'); ?></a>
			        </li>
			   
				</ul>
			
			</div>
			 
			<div class="motif-tabs-content">
				
				<!-- form starts from here -->
				<form id="motiffaq_setting_optionform" action="" method="">

				<div class="motif-top-content">
					
					<h1><?php _e('Motif Feature Video Woocommerce Plugin.', 'woocommerce-product-feature-video'); ?></h1>

					<div id="option-success"><p><?php _e('Settings Saved!', 'woocommerce-product-feature-video'); ?></p></div>
					
					<div class="motif-support-actions">
			
						<div class="actions motif-submit">
							<span id="motif-spinner"></span>
							<input onclick="motifsettopt()" class="button button-primary" type="button" name="" value="<?php _e('Save Changes', 'woocommerce-product-feature-video') ?>">
							<?php wp_nonce_field(); ?>
						</div>
					</div>

				</div>

				<div class="motif-singletab" id="m_youtube">
					
					<?php $youtube_settings = get_option('motif_youtube_video_settings'); ?>

					<h2><?php _e('Youtube Settings', 'woocommerce-product-feature-video'); ?></h2>
					
					<table class="motif-table-optoin">
						
						<tbody>

							<!-- Allow FullScreen to video -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Allow FullScreen Play', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Check to hide full screen Video option', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_allowfull_you'], 'allowFullScreen') ?> type="checkbox" id="fullscreen_you"><label for="fullscreen_you"></label>
									</p>
								</td>
							</tr>


							<!-- Auto play video -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Auto Play', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Check to Autoplay Video on Product Single Page when your vist', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_autoplay_you'], 'autoplay=1') ?> type="checkbox" id="checkboxID"><label for="checkboxID"></label>
									</p>
								</td>
							</tr>

							<!-- Controls video -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Show Video Controls', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Hide Or Show video Controls in Single Page', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_controls_you'], 'controls=1') ?> type="checkbox" id="myoucontrls"><label for="myoucontrls"></label>
									</p>
								</td>
							</tr>

							<!-- Show related video -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Show Related Videos', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Show related video at the end of video', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_related_you'], 'rel=1') ?> type="checkbox" id="myurelated"><label for="myurelated"></label>
									</p>
								</td>
							</tr>

							<!-- Show title video -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Show title on Videos', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Show/Hide video title on videos..?', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_title_you'], 'showinfo=1') ?> type="checkbox" id="myutitle"><label for="myutitle"></label>
									</p>
								</td>
							</tr>

							<!-- Height of youtube -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height of youtube frame', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Youtube Video Frame height in pixels (300px)', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<input value="<?php echo $youtube_settings['motif_hyou']; ?>" id="motif_you_h" class="motif-input-field" type="text">
								</td>
							</tr>

							<!-- Width of youtube -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Width of youtube Container', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Container of Single product page youtube video in % (default 40%)', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<input value="<?php echo $youtube_settings['motif_wyou'];; ?>" id="motif_you_w" class="motif-input-field" type="text">
								</td>
							</tr>

							<!-- Height of youtube (shop page) -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height of Youtube Shop Page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Height of youtube video on shop/catalog page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $youtube_settings['motif_hshopyou']; ?>" id="motif_you_hshop" class="motif-input-field" type="text">
								</td>
							</tr>

							<!-- youtube video popup disable/enable -->
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Youtube Video Popup Enable/Disable', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Show video popup on shop page or not', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $youtube_settings['motif_upopup'], '1') ?> type="checkbox" id="myupopup"><label for="myupopup"></label>
									</p>
								</td>
							</tr>

							<tr class="submit-motif motif-option-field">
								<th></th>
								<td>
									<div class="actions motif-submit">
										<input onclick="motifsettopt()" class="button button-primary" type="button" name="" value="<?php _e('Save Changes', 'woocommerce-product-feature-video'); ?>">
									</div>
								</td>
							</tr>

						</tbody>

					</table>
				
				</div>

				<div class="motif-singletab" id="m_vimo">
					
					<?php $vimeo_settings = get_option('motif_vimeo_video_settings'); ?>

					<h2><?php _e('Vimeo Settings', 'woocommerce-product-feature-video'); ?></h2>
					
					<table class="motif-table-optoin">
						
					<tbody>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Allow FullScreen Play', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Allow vimeo video to fullscreen control enable/disable', 'woocommerce-product-feature-video'); ?></p>
								</span>
							</th>
							<td>
								<p class="onoff">
									<input <?php echo checked( $vimeo_settings['motif_allfull_vimo'], 'allowFullScreen') ?> type="checkbox" id="myvimo_fullscreen"><label for="myvimo_fullscreen"></label>
								</p>
							</td>
						</tr>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Allow Autoplay', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Allow auto play vimeo video on shop or single product page', 'woocommerce-product-feature-video'); ?></p>
								</span>
							</th>
							<td>
								<p class="onoff">
									<input <?php echo checked( $vimeo_settings['motif_autoplay_vimo'], 'autoplay=1') ?> type="checkbox" id="myvimo_autoplay"><label for="myvimo_autoplay"></label>
								</p>
							</td>
						</tr>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Height of Vimeo Shop Page', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Height of vimeo video on shop/catalog page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
								</span>
							</th>
							<td>
								<input value="<?php echo $vimeo_settings['motif_hshop_vimo']; ?>" id="motif_vimo_hshop" class="motif-input-field" type="text">
							</td>
						</tr>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Width of Vimeo Container', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Container of Single product page vimeo video in % (default 40%)', 'woocommerce-product-feature-video'); ?></p>
								</span>
							</th>
							<td>
								<input value="<?php echo $vimeo_settings['motif_wcontain_vimo']; ?>" id="motif_vimo_wcontin" class="motif-input-field" type="text">
							</td>
						</tr>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Height of Vimeo Single Product Page', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Height of vimeo video on single product page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
								</span>
							</th>
							<td>
								<input value="<?php echo $vimeo_settings['motif_hsingle_vimo']; ?>" id="motif_vimo_hsingle" class="motif-input-field" type="text">
							</td>
						</tr>

						<tr class="motif-option-field">
							<th>
								<div class="option-head">
									<h3><?php _e('Vimeo video popup Enable/Disable', 'woocommerce-product-feature-video'); ?></h3>
								</div>
								<span class="description">
									<p><?php _e('Enable the video popu on shop page', 'woocommerce-product-feature-video'); ?></p> 
								</span>
							</th>
							<td>
								<p class="onoff">
									<input <?php echo checked( $vimeo_settings['motif_popup_vimo'], '1') ?> type="checkbox" id="motif_vimo_popup"><label for="motif_vimo_popup"></label>
								</p>
							</td>
						</tr>

					</tbody>

					</table>

				</div>

				<div class="motif-singletab" id="m_daily">
					
					<?php $daily_settings = get_option('motif_daily_video_settings'); ?>

					<h2><?php _e('Daily Motion Settings', 'woocommerce-product-feature-video'); ?></h2>

					<table class="motif-table-optoin">
						
						<tbody>
							
							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Allow FullScreen Play', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Allow Dailymotion video to fullscreen control enable/disable', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_allfull_daily'], 'allowFullScreen'); ?> type="checkbox" id="mydaily_fullscreen"><label for="mydaily_fullscreen"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Allow auto Play', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Allow Dailymotion video to autoplay', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_autoplay_daily'], 'autoplay=1'); ?> type="checkbox" id="mydaily_autoplay"><label for="mydaily_autoplay"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Mute Volume on load', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Allow Dailymotion video to mute once load', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_mute_daily'], 'mute=1'); ?> type="checkbox" id="mydaily_mute"><label for="mydaily_mute"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Show Video Information', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Show video information once play', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_info_daily'], 'info=1'); ?> type="checkbox" id="mydaily_info"><label for="mydaily_info"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Show Related video', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Show related video once play', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_rel_daily'], 'related=1'); ?> type="checkbox" id="mydaily_related"><label for="mydaily_related"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height of Dailymotion Single Product Page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Height of dailymotion video on single product page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $daily_settings['motif_hsingle_daily']; ?>" id="mydaily_hsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Container Width single product page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Width of container for daiilymotion video single product page', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $daily_settings['motif_wconsingle_daily']; ?>" id="mydaily_wcontainsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height of Video Shop page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Height of video on shop page', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $daily_settings['motif_hshop_daily']; ?>" id="mydaily_hshop" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Daily Motion video popup Enable/Disable', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Enable the video popup on shop page', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $daily_settings['motif_popup_daily'], '1'); ?> type="checkbox" id="motif_daily_popup"><label for="motif_daily_popup"></label>
									</p>
								</td>
							</tr>

						</tbody>

					</table>

				</div>
			
				<div class="motif-singletab" id="m_self">
					
					<?php $self_settings = get_option('motif_self_video_settings'); ?>

					<h2><?php _e('Self hosted Settings', 'woocommerce-product-feature-video'); ?></h2>

					<table class="motif-table-optoin">
						
						<tbody>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Allow Autoplay', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Allow SelfHosted video to autoplay', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_autoplay_self'], '1'); ?> type="checkbox" id="myself_autoplay"><label for="myself_autoplay"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Mute Video', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Mute selfhosted video', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_mute_self'], '1'); ?> type="checkbox" id="myself_mute"><label for="myself_mute"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Video Loop', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Loop for video', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_loop_self'], '1'); ?> type="checkbox" id="myself_loop"><label for="myself_loop"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Video Controls', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Hide video controls selfhosted', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_controls_self'], '1'); ?> type="checkbox" id="myself_controls"><label for="myself_controls"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Fluid (black border removed)', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Remove black border from video', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_fluid_self'], '1'); ?> type="checkbox" id="myself_fluid"><label for="myself_fluid"></label>
									</p>
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height for (video) Single Product Page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Height of selfhosted video on single product page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $self_settings['motif_hsingle_self']; ?>" id="myself_hsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Width for (video) Single Product Page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Width of selfhosted video on single product page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $self_settings['motif_wsingle_self']; ?>" id="myself_wsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Width in shop page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Width of selfhosted video on shop page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $self_settings['motif_wshop_self']; ?>" id="myself_wshopsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Height in shop page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Height of selfhosted video on shop page in pixels ( 300px)', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $self_settings['motif_hshop_self']; ?>" id="myself_hshopsingle" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Container width in shop page', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Width of selfhosted video container on single product page', 'woocommerce-product-feature-video'); ?></p> 
									</span>
								</th>
								<td>
									<input value="<?php echo $self_settings['motif_wcontain_self']; ?>" id="myself_wcontanier" class="motif-input-field" type="text">
								</td>
							</tr>

							<tr class="motif-option-field">
								<th>
									<div class="option-head">
										<h3><?php _e('Enable selfhosted popup', 'woocommerce-product-feature-video'); ?></h3>
									</div>
									<span class="description">
										<p><?php _e('Enable self hosted video popup on shop page', 'woocommerce-product-feature-video'); ?></p>
									</span>
								</th>
								<td>
									<p class="onoff">
										<input <?php echo checked( $self_settings['motif_popup_self'], '1'); ?> type="checkbox" id="myself_popup"><label for="myself_popup"></label>
									</p>
								</td>
							</tr>
						
						</tbody>

					</table>

				</div>

				</form>

			</div>
		
		</div>

		<script type="text/javascript">
			
			jQuery( function() {
				jQuery('#extedndons-tabs').tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
			});

			// ajax function for submitting setting option
		  	function motifsettopt() {
		  		
				var ajaxurl = "<?php echo admin_url( 'admin-ajax.php'); ?>";

				var condition = 'setting_motif';
				
				var motif_utube_fullscreen = jQuery("#fullscreen_you").prop('checked')? 'allowFullScreen' : '';
				var motif_utube_autoplay = jQuery("#checkboxID").prop('checked')?'autoplay=1':'autoplay=0';
				var motif_utube_controls = jQuery("#myoucontrls").prop('checked')?'controls=1':'controls=0';
				var motif_utube_related= jQuery("#myurelated").prop('checked')?'rel=1':'rel=0';
				var motif_utube_showinfo= jQuery("#myutitle").prop('checked')?'showinfo=1':'showinfo=0';
				var motif_utube_height = jQuery('#motif_you_h').val();
				var motif_utube_width = jQuery('#motif_you_w').val();
				var motif_utube_height_shop = jQuery('#motif_you_hshop').val();
				var motif_utube_showpopup= jQuery("#myupopup").prop('checked')? '1' :'0';

				var motif_vimeo_fullscreen = jQuery("#myvimo_fullscreen").prop('checked')? 'allowFullScreen' : '';
				var motif_vimeo_autoplay = jQuery("#myvimo_autoplay").prop('checked')? 'autoplay=1' : 'autoplay=0';
				var motif_vimo_hshop = jQuery('#motif_you_hshop').val();
				var motif_vimo_wcontainer = jQuery('#motif_vimo_wcontin').val();
				var motif_vimo_hsingle = jQuery('#motif_vimo_hsingle').val();
				var motif_vimo_popup = jQuery('#motif_vimo_popup').prop('checked')? '1' : '0';

				var motif_daily_fullscreen = jQuery("#mydaily_fullscreen").prop('checked')? 'allowFullScreen' : '';
				var motif_daily_autoplay = jQuery("#mydaily_autoplay").prop('checked')? 'autoplay=1' : 'autoplay=0';
				var motif_daily_mute = jQuery("#mydaily_mute").prop('checked')? 'mute=1' : 'mute=0';
				var motif_daily_info = jQuery("#mydaily_info").prop('checked')? 'info=1' : 'info=0';
				var motif_daily_rel = jQuery("#mydaily_related").prop('checked')? 'related=1' : 'related=0';
				var motif_daily_hsingle = jQuery("#mydaily_hsingle").val();
				var motif_daily_wconsingle = jQuery("#mydaily_wcontainsingle").val();
				var motif_daily_hshop= jQuery("#mydaily_hshop").val();
				var motif_daily_popup = jQuery("#motif_daily_popup").prop('checked')? '1' : '0';

				var myself_autoplay = jQuery("#myself_autoplay").prop('checked')? '1' : '0';
				var myself_mute = jQuery("#myself_mute").prop('checked')? '1' : '0';
				var myself_loop = jQuery("#myself_loop").prop('checked')? '1' : '0';
				var myself_controls = jQuery("#myself_controls").prop('checked')? '1' : '0';
				var myself_fluid = jQuery("#myself_fluid").prop('checked')? '1' : '0';
				var myself_hsingle= jQuery("#myself_hsingle").val();
				var myself_wsingle= jQuery("#myself_wsingle").val();
				var myself_wshopsingle= jQuery("#myself_wshopsingle").val();
				var myself_hshopsingle= jQuery("#myself_hshopsingle").val();
				var myself_wcontanier= jQuery("#myself_wcontanier").val();
				var myself_popup = jQuery("#myself_popup").prop('checked')? '1' : '0';

				jQuery('#motif-spinner').show();
				
				jQuery.ajax({
					url : ajaxurl,
					type : 'post',
					data : {
						action : 'motif_settingvideo',
						
						condition : condition,
		
						motif_utube_fullscreen : motif_utube_fullscreen,
						motif_utube_autoplay : motif_utube_autoplay,
						motif_utube_controls : motif_utube_controls,
						motif_utube_related : motif_utube_related,
						motif_utube_showinfo : motif_utube_showinfo,
						motif_utube_height : motif_utube_height,
						motif_utube_width : motif_utube_width,
						motif_utube_height_shop : motif_utube_height_shop,
						motif_utube_showpopup : motif_utube_showpopup,

						motif_vimeo_fullscreen : motif_vimeo_fullscreen,
						motif_vimeo_autoplay : motif_vimeo_autoplay,
						motif_vimo_hshop : motif_vimo_hshop,
						motif_vimo_wcontainer : motif_vimo_wcontainer,
						motif_vimo_hsingle : motif_vimo_hsingle,
						motif_vimo_popup : motif_vimo_popup,

						motif_daily_fullscreen : motif_daily_fullscreen,
						motif_daily_autoplay : motif_daily_autoplay,
						motif_daily_mute : motif_daily_mute,
						motif_daily_info : motif_daily_info,
						motif_daily_rel : motif_daily_rel,
						motif_daily_hsingle : motif_daily_hsingle,
						motif_daily_wconsingle : motif_daily_wconsingle,
						motif_daily_hshop : motif_daily_hshop,
						motif_daily_popup : motif_daily_popup,

						myself_autoplay : myself_autoplay,
						myself_mute : myself_mute,
						myself_loop : myself_loop,
						myself_controls : myself_controls,
						myself_fluid : myself_fluid,
						myself_hsingle : myself_hsingle,
						myself_wsingle : myself_wsingle,
						myself_wshopsingle : myself_wshopsingle,
						myself_hshopsingle : myself_hshopsingle,
						myself_wcontanier : myself_wcontanier,
						myself_popup : myself_popup,

					},
					success : function(response) {
						jQuery("#option-success").show().delay(3000).fadeOut("slow");
					},
					complete: function(){
					    jQuery('#motif-spinner').hide();
					}
				});
		  	}

		</script>

	<?php }

	// CALLBACK SCRIPTS AND STYLES SETTIGNS
	public function fv_scripts_styles_settings() {

		wp_enqueue_script('jquery');

		wp_enqueue_script('jquery-ui-tabs');

	}

} new settings_product_feature_video();
