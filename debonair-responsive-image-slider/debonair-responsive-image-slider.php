<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Debonair Responsive Image Slider - 3.5.7
Plugin URI: https://wordpress.org/plugins/Debonair-responsive-image-slider/
Description: Add unlimited image slides using Debonair Responsive Image Slider in any Page and Post content to give an attractive mode to represent contents.
Version: 1.0.1
Author: Abbas Umaru
Author URI: http://debonairtraining.com/
Text Domain: debonair-responsive-image-slider
Domain Path: /languages
License: GPL2

Debonair Responsive Image Slider is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or any later version.

Debonair Responsive Image Slider is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Debonair Responsive Image Slider. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/

//Constant Variable
define("CIS_PLUGIN_URL", plugin_dir_url(__FILE__));

// Apply default settings on activation
register_activation_hook( __FILE__, 'WCIS_DefaultSettingsPro' );
function WCIS_DefaultSettingsPro() {
	$DefaultSettingsProArray = serialize( array(
		//layout 3 settings
		"WCIS_L3_Slide_Title"			=> 1,
		"WCIS_L3_Show_Slide_Title"		=> 0,
		"WCIS_L3_Show_Slide_Desc"		=> 0,
		"WCIS_L3_Auto_Slideshow"		=> 1,
		"WCIS_L3_Transition"			=> 1,
		"WCIS_L3_Transition_Speed"		=> 5000,
		"WCIS_L3_Sliding_Arrow"			=> 1,
		"WCIS_L3_Slider_Navigation"		=> 1,
		"WCIS_L3_Navigation_Button"		=> 1,
		"WCIS_L3_Slider_Width"			=> "1000",
		"WCIS_L3_Slider_Height"			=> "500",
		"WCIS_L3_Font_Style"			=> "Arial",
		"WCIS_L3_Title_Color"			=> "#FFFFFF",
		"WCIS_L3_Slider_Scale_Mode"		=> "cover",
		"WCIS_L3_Slider_Auto_Scale"		=> 1,
		"WCIS_L3_Title_BgColor"			=> "#FFFFFF",
		"WCIS_L3_Desc_Color"			=> "#000000",
		"WCIS_L3_Desc_BgColor"			=> "#FFFFFF",
		"WCIS_L3_Navigation_Color"		=> "#000000",
		"WCIS_L3_Fullscreeen"			=> 1,
		"WCIS_L3_Custom_CSS"			=> "",
		'WCIS_L3_Slide_Order'			=> "ASC",
		'WCIS_L3_Navigation_Position'	=> "bottom",
		'WCIS_L3_Slide_Distance'		=> 5,
		'WCIS_L3_Thumbnail_Style'		=> "border",
		'WCIS_L3_Thumbnail_Width'		=> 120,
		'WCIS_L3_Thumbnail_Height'		=> 120,
		'WCIS_L3_Width'					=> "custom",
		'WCIS_L3_Height'					=> "custom",
		'WCIS_L3_Navigation_Bullets_Color' => "#000000",
		'WCIS_L3_Navigation_Pointer_Color' => "#000000",
	));
	add_option("WCIS_Settings", $DefaultSettingsProArray);
}

// Add settings link on Plugins page
function ccis_links($links) {
	$ccis_pro_link = ('<a href="http://debonairtraining.com/demo/debonair-responsive-image-slider-pro/" target="_blank">Try Pro</a>');
	array_unshift($links, $ccis_pro_link);
	$ccis_settings_link = ('<a href="edit.php?post_type=ccis_gallery">Settings</a>');
	array_unshift($links, $ccis_settings_link);
	return $links;
}
$cis_plugin_name = plugin_basename(__FILE__);
add_filter("plugin_action_links_$cis_plugin_name", 'ccis_links' );

// Slider Text Widget Support
add_filter( 'widget_text', 'do_shortcode' );

class CIS {

	private static $instance;
	private $admin_thumbnail_size = 150;
	private $thumbnail_size_w = 150;
	private $thumbnail_size_h = 150;
	var $counter;

	public static function forge() {
		if (!isset(self::$instance)) {
			$className = __CLASS__;
			self::$instance = new $className;
		}
		return self::$instance;
	}

	private function __construct() {
		$this->counter = 0;
		// image crop function
		add_image_size('rpg_gallery_admin_thumb', $this->admin_thumbnail_size, $this->admin_thumbnail_size, true);
		add_image_size('rpg_gallery_thumb', $this->thumbnail_size_w, $this->thumbnail_size_h, true);
		// Translate plugin
		add_action('plugins_loaded', array(&$this, 'CIS_Translate'), 1);
		// CPT Function
		add_action('init', array(&$this, 'ResponsiveImageSlider'),1);
		// generate meta box function
		add_action('add_meta_boxes', array(&$this, 'add_all_ccis_meta_boxes'));
		add_action('admin_init', array(&$this, 'add_all_ccis_meta_boxes'), 1);
		// meta box setting save function
		add_action('save_post', array(&$this, 'add_image_meta_box_save'), 9, 1);
		add_action('save_post', array(&$this, 'ccis_settings_meta_save'), 9, 1);
		// add new slide function
		add_action('wp_ajax_cis_get_thumbnail', array(&$this, 'ajax_get_thumbnail_cis'));

		// only for admin dashboard clone slider ajax JS
		add_action( 'admin_enqueue_scripts', array(&$this, 'cis_scripts'));

		//clone slider ajax call back, its required localize ajax object
		add_action('wp_ajax_cis_clone_slider', array(&$this, 'cis_clone_slider'));
	}

	/**
	 * Scripts and styles should not be registered or enqueued until the wp_enqueue_scripts, admin_enqueue_scripts, or login_enqueue_scripts hooks.
	 */
	public function cis_scripts() {
		wp_enqueue_script( 'ajax-script', CIS_PLUGIN_URL. 'assets/js/cis-ajax-script.js', array('jquery'));
		wp_localize_script( 'ajax-script', 'cis_ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' )));
	}

	//Clone slider call back
	public function cis_clone_slider() {
		if ( current_user_can( 'manage_options' ) ) {
			if ( isset( $_POST['cis_clone_nonce'] ) && wp_verify_nonce( $_POST['cis_clone_nonce'], 'cis_clone_nonce' ) ) {
				$ursi_clone_post_id = sanitize_text_field($_POST['ursi_clone_post_id']);
				// get all required data for cloning
				$post_title = get_the_title($ursi_clone_post_id)." - Clone";
				$post_type = sanitize_text_field("ccis_gallery");
				$post_status = sanitize_text_field("publish");
				// get all slide ids for cloning
				$CIS_All_Slide_Ids = get_post_meta( $ursi_clone_post_id, 'ccis_all_photos_details', true);

				// get slider post meta settings for cloning
				$WCIS_Gallery_Settings_Key = sanitize_text_field("WCIS_Gallery_Settings_".$ursi_clone_post_id);
				$WCIS_Gallery_Settings = get_post_meta( $ursi_clone_post_id, $WCIS_Gallery_Settings_Key, true);

				//cloning post
				$cis_cloning_post_array =  array(
					'post_title' => $post_title,
					'post_type' => $post_type,
					'post_status' => $post_status,
					'meta_input' => array(
						// post meta key => value
						'ccis_all_photos_details' => $CIS_All_Slide_Ids,
					),
				);

				$cloned_post_id = wp_insert_post($cis_cloning_post_array);
				// slider post meta settings cloning
				add_post_meta( $cloned_post_id, "WCIS_Gallery_Settings_".$cloned_post_id, $WCIS_Gallery_Settings);
				die;
			} else {
				die;
			}
		}
	}

	/**
	 * Translate Plugin
	 */
	public function CIS_Translate() {
		load_plugin_textdomain('debonair-responsive-image-slider', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
	}

	// Register Custom Post Type
	public function ResponsiveImageSlider() {
		if ( current_user_can( 'manage_options' ) ) {
			$cis_labels = array(
				'name' => 'Debonair Responsive Image Slider',
				'singular_name' => 'Debonair Responsive Image Slider',
				'add_new' => __( 'Add New Slider', 'debonair-responsive-image-slider' ),
				'add_new_item' => __( 'Add New Slider', 'debonair-responsive-image-slider' ),
				'edit_item' => __( 'Edit Slider', 'debonair-responsive-image-slider' ),
				'new_item' => __( 'New Slider', 'debonair-responsive-image-slider' ),
				'view_item' => __( 'View Slider', 'debonair-responsive-image-slider' ),
				'search_items' => __( 'Search Slider', 'debonair-responsive-image-slider' ),
				'not_found' => __( 'No Slider found', 'debonair-responsive-image-slider' ),
				'not_found_in_trash' => __( 'No Slider Found in Trash', 'debonair-responsive-image-slider' ),
				'parent_item_colon' => __( 'Parent Slider:', 'debonair-responsive-image-slider' ),
				'all_items' => __( 'All Sliders', 'debonair-responsive-image-slider' ),
				'menu_name' => 'Picture Slider',
			);
			$args = array(
				'labels' => $cis_labels,
				'hierarchical' => false,
				'supports' => array( 'title'),
				'public' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 10,
				'menu_icon' => 'dashicons-format-gallery',
				'show_in_nav_menus' => false,
				'publicly_queryable' => false,
				'exclude_from_search' => true,
				'has_archive' => true,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => false,
			);
			register_post_type( 'ccis_gallery', $args );
			add_filter( 'manage_edit-ccis_gallery_columns', array(&$this, 'ccis_gallery_columns' )) ;
			add_action( 'manage_ccis_gallery_posts_custom_column', array(&$this, 'ccis_gallery_manage_columns' ), 10, 2 );
		}
	}

	function ccis_gallery_columns( $columns ){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Picture Slider ' ),
			'shortcode' => __( 'Slider Shortcode' ),
			'date' => __( 'Date' )
		);
		return $columns;
	}

	function ccis_gallery_manage_columns( $column, $post_id ){
		global $post;
		switch( $column ) {
			case 'shortcode' :
				$allowed_shortcode = array('input' => array( 'type' => array(), 'value' => array(), 'readonly' => array() ));
				echo wp_kses('<input type="text" value="[CIS id='.$post_id.']" readonly="readonly" />', $allowed_shortcode);
			break;
			default :
			break;
		}
	}

	public function add_all_ccis_meta_boxes() {
		add_meta_box( __('Add Slides', 'debonair-responsive-image-slider'), __('Add Slides', 'debonair-responsive-image-slider'), array(&$this, 'ccis_generate_add_image_meta_box_function'), 'ccis_gallery', 'normal', 'low' );
		add_meta_box( __('Configure Settings', 'debonair-responsive-image-slider'), __('Configure Settings', 'debonair-responsive-image-slider'), array(&$this, 'ccis_settings_meta_box_function'), 'ccis_gallery', 'normal', 'low');
		//add_meta_box( 'Upgrade To Pro Plugin', 'Upgrade To Pro Plugin', array(&$this, 'ccis_upgrade_to_pro_meta_box_function'), 'ccis_gallery', 'normal', 'low');
		add_meta_box ( __('Slider Shortcode', 'debonair-responsive-image-slider'), __('Slider Shortcode', 'debonair-responsive-image-slider'), array(&$this, 'ccis_shotcode_meta_box_function'), 'ccis_gallery', 'side', 'low');
		//add_meta_box ( __('Try My New Slider Plugin', 'debonair-responsive-image-slider'), __('Try My New Slider Plugin', 'debonair-responsive-image-slider'), array(&$this, 'ccis_new_plugin_meta_box_function'), 'ccis_gallery', 'side', 'low');
		//add_meta_box('Show US Some Love & Rate Us', 'Show US Some Love & Rate Us', array(&$this, 'cis_Rate_us_meta_box_function'), 'ccis_gallery', 'side', 'low');
	}

	//Rate Us Meta Box
	public function cis_Rate_us_meta_box_function() { ?>
		<style>
		.cisp-rate-us span.dashicons {
			width: 30px;
			height: 30px;
		}
		.cisp-rate-us span.dashicons-star-filled:before {
			content: "\f155";
			font-size: 30px;
		}
		.wpf_cis_fivestar{
			width: 80%;
		}
		a.wpf_fs_btn {
			text-decoration: none;
			background-color: #d72323;
			padding-left: 20px;
			padding-right: 20px;
			border-radius: 5px;
			color: #fff;
			padding-top: 8px;
			padding-bottom: 8px;
		}
		a:focus, a:hover {
			color: #fff !important;
			text-decoration: none !important;
		}
		</style>
		<div align="center">
			<p>Please Review & Rate Us On WordPress</p>
			<a class="upgrade-to-pro-demo cisp-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/support/plugin/debonair-responsive-image-slider/reviews/#new-post" target="_blank">
				<img class="wpf_cis_fivestar" src="<?php echo $path = esc_url(CIS_PLUGIN_URL."assets/img/5star.jpg"); ?>">
			</a>
		</div>
		<div class="upgrade-to-pro" style="text-align:center;margin-bottom:10px;margin-top:10px;">
			<a href="https://wordpress.org/support/plugin/debonair-responsive-image-slider/reviews/#new-post" target="_blank" class="wpf_fs_btn">RATE US</a>
		</div>
		<?php
	}

	//Upgrade To Meta Box
	public function ccis_upgrade_to_pro_meta_box_function() { ?>
		<!-- <div class="welcome-panel-column" id="wpfrank-action-metabox">
			<h4>Unlock More Features in Debonair Responsive Image Slider Pro</h4>
			<p>5 Design Layouts, Transition Effect, Color Customizations, 500+ Google Fonts For Slide Title & Description, Slides Ordering, Link On Slides, 2 Light Box Style, Various Slider Control Settings</p>
			<a class="button button-primary button-hero load-customize hide-if-no-customize wpfrank-action-button" target="_blank" href="http://debonairtraining.com/demo/debonair-responsive-image-slider-pro/">Check Pro Plugin Demo</a>
			<a class="button button-primary button-hero load-customize hide-if-no-customize wpfrank-action-button" target="_blank" href="http://debonairtraining.com/account/signup/debonair-responsive-image-slider-pro">Buy Pro Plugin $25</a>
			<h4>Also Try My New Slider Plugin</h4>
			<a class="button button-primary button-hero load-customize hide-if-no-customize wpfrank-action-button" target="_blank" href="https://wordpress.org/plugins/slider-factory/">Slider Factory</a>
		</div> -->
		<?php
	}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
	public function ccis_generate_add_image_meta_box_function($post) { ?>
		<p><a href="edit.php?post_type=ccis_gallery&page=cis-recover-slider" class="button button-primary button-hero">Click To Recover Old Sliders</a> ( ignore if this slider already recovered )</p>
		<div id="cis-container" class="cis-container">
			<input type="hidden" id="cis-save-action" name="cis-save-action" value="cis-save-settings">
			<ul id="cis-slides-container" class="clearfix SortSlides">
				<?php
				/* load all slide into dashboard */
				$CIS_All_Slide_Ids = get_post_meta( $post->ID, 'ccis_all_photos_details', true);
				$TotalSlideIdsArray = get_post_meta( $post->ID, 'ccis_all_photos_details', true );
				if(is_array($TotalSlideIdsArray)) {
					$TotalSlideIds = count($TotalSlideIdsArray);
				} else {
					$TotalSlideIds = 0;
				}

				$i = 0;
				if($TotalSlideIds) {
					if(is_array($CIS_All_Slide_Ids)){
						foreach($CIS_All_Slide_Ids as $CIS_Slide_Id) {
							$slide_id = $CIS_Slide_Id['rpgp_image_id'];
							$attachment = get_post( $slide_id ); // get all slide details
							$slide_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
							$slide_caption = $attachment->post_excerpt;
							$slide_description = $attachment->post_content;
							$slide_src = $attachment->guid; //  full image URL
							$slide_title = $attachment->post_title; // attachment title
							$slide_medium = wp_get_attachment_image_src($slide_id, 'medium', true); // return is array	medium image URL
							$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
							?>
							<li id="<?php echo esc_attr($slide_id); ?>" class="cis-slide" data-position="<?php echo esc_attr($slide_id); ?>">
								<a id="cis-slide-delete-icon" class="cis-slide-delete-icon"><img src="<?php echo  esc_url(CIS_PLUGIN_URL.'assets/img/close-icon.png'); ?>" /></a>
								<div class="cis-slide-meta">
									<p>
										<img src="<?php echo esc_url($slide_medium[0]); ?>" class="cis-slide-image">
									</p>
									<p>
										<label><?php _e('Slide Title', 'debonair-responsive-image-slider'); ?></label>
										<input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo esc_attr($UniqueString); ?>" />
										<input type="hidden" id="rpgp_image_id[]" name="rpgp_image_id[]" value="<?php echo esc_attr($slide_id); ?>">
										<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" class="cis-slide-input-text" value="<?php echo esc_attr( $slide_title ); ?>" placeholder="<?php _e('Enter Slide Title', 'debonair-responsive-image-slider'); ?>" >
									</p>
									<p>
										<label><?php _e('Slide Descriptions', 'debonair-responsive-image-slider'); ?></label>
										<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" class=" cisp_richeditbox_<?php echo esc_attr($i); ?> cis-slide-input-text" placeholder="<?php _e('Enter Slide Description', 'debonair-responsive-image-slider'); ?>"><?php echo htmlentities( $slide_description ); ?></textarea>
										<button type="button" class="btn btn-md btn-info btn-block" data-toggle="modal" data-target="#myModal" onclick="cisp_richeditor(<?php echo esc_attr($i); ?>)"><?php _e('Use Rich Text Editor', 'debonair-responsive-image-slider'); ?> <i class="fa fa-edit"></i></button>
									</p>
									<p>
										<label><?php _e('Slide Alt Text', 'debonair-responsive-image-slider'); ?></label>
										<input type="text" id="rpgp_image_alt[]" name="rpgp_image_alt[]" class="cis-slide-input-text" value="<?php echo esc_attr($slide_alt); ?>" placeholder="<?php _e('Max Length 125 Characters', 'debonair-responsive-image-slider'); ?>">
									</p>
								</div>
							</li>
							<?php
							$i++;
						} // end of for each
					}
				} else {
					$TotalSlideIds = 0;
				}
				?>
			</ul>

			<!--cis editor modal-->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<!-- modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-edit" style="font-size:23px"></i> Rich Editor</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
						  <p>
							<?php
								$cisp_box = '';
								$cisp_editor_id = 'fetch_wpeditor_data';
								$settings  = array( 'media_buttons' => false ,'quicktags' => array( 'buttons' => 'strong,em,del,link,close' ) ); // for remove media button from editor
								wp_editor( $cisp_box, $cisp_editor_id, $settings); // without media button
							?>
							<input type="hidden" value="" id="fetch_wpelement" name="fetch_wpelement" />
						  </p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" onclick="cisp_richeditor_putdata()" data-dismiss="modal">Continue</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
						</div>
					</div>
				</div>
			</div>
			<!--rich editor modal-->
		</div>

		<!--Add New Image Button-->
		<div class="cis-control-buttons">
		<div id="cis-add-new-slide" class="cis-add-new-slide" data-uploader_title="Upload Slide" data-uploader_button_text="Select" >
			<div class="dashicons dashicons-plus"></div>
			<p><?php _e('Add New Slide', 'debonair-responsive-image-slider'); ?></p>
		</div>
		<div id="sort-all-slides" class="cis-clone-slider" onclick="return CISSortSlides('ASC');">
			<div class="dashicons dashicons-sort"></div>
			<p><?php _e("Sort Ascending", 'debonair-responsive-image-slider'); ?></p>
		</div>
		<div id="sort-all-slides" class="cis-clone-slider" onclick="return CISSortSlides('DESC');">
			<div class="dashicons dashicons-sort"></div>
			<p><?php _e("Sort Descending", 'debonair-responsive-image-slider'); ?></p>
		</div>
		<div id="cis-clone-slider" class="cis-clone-slider" onclick="return cis_clone_run(<?php echo esc_attr($post->ID); ?>);">
			<div class="dashicons dashicons-admin-page"></div>
			<?php wp_nonce_field('cis_clone_nonce','cis_clone_nonce' ); ?>
			<p><?php _e("Clone Slider (beta)", 'debonair-responsive-image-slider'); ?></p>
		</div>

		<div id="cis-delete-all-slide" class="cis-delete-all-slide">
			<div class="dashicons dashicons-trash"></div>
			<p><?php _e('Delete All Slides', 'debonair-responsive-image-slider'); ?></p>
		</div>

		<div id="cis-clone-success" class="cis-clone-success">
			<h1><?php _e('Slider clone created successfully.', 'debonair-responsive-image-slider'); ?> <?php _e('Go to', 'debonair-responsive-image-slider'); ?> <a href="edit.php?post_type=ccis_gallery"><?php _e('All Slider', 'debonair-responsive-image-slider'); ?></a> <?php _e('page to edit cloned slider.', 'debonair-responsive-image-slider'); ?></h1>
		</div>

		<div style="clear:left;"></div>
		<style>
		.review-notice {
			background-color: #27A4DD !important;
			color: #FFFFFF !important;
		}
		</style>
		<script>
		function cisp_richeditor(id){
			var richeditdata = jQuery(".cisp_richeditbox_"+id).val();
			jQuery("#fetch_wpeditor_data").val(richeditdata);
			jQuery("#fetch_wpeditor_data-html").click();
			jQuery("#fetch_wpelement").val(id);
		}
		function cisp_richeditor_putdata(){
			jQuery("#fetch_wpeditor_data").click();
			jQuery("#fetch_wpeditor_data-html").click();
			var fetch_wpelement_id = jQuery("#fetch_wpelement").val();
			var fetched_data = jQuery("#fetch_wpeditor_data").val();
			jQuery(".cisp_richeditbox_"+fetch_wpelement_id).val(fetched_data);
		}
		</script>
		<script>
		function CISSortSlides(order){
			if(order == "ASC") {
				jQuery(".SortSlides li").sort(sort_li).appendTo('.SortSlides');
				function sort_li(a, b) {
					return (jQuery(b).data('position')) > (jQuery(a).data('position')) ? 1 : -1;
				}
			}
			if(order == "DESC") {
				jQuery(".SortSlides li").sort(sort_li).appendTo('.SortSlides');
				function sort_li(a, b) {
					return (jQuery(b).data('position')) < (jQuery(a).data('position')) ? 1 : -1;
				}
			}
		}
		</script>
		<?php
	}

	/**
	 * This function display Add New Image interface
	 * Also loads all saved gallery photos into photo gallery
	 */
	public function ccis_settings_meta_box_function($post) {
		wp_enqueue_script('wpfrank-cis-bootstrap-js', CIS_PLUGIN_URL.'assets/js/bootstrap.js');
		wp_enqueue_style('wpfrank-cis-bootstrap-css', CIS_PLUGIN_URL.'assets/css/bootstrap-latest/bootstrap.css');
		wp_enqueue_style('wpfrank-cis-editor-modal', CIS_PLUGIN_URL.'assets/css/editor-modal.css');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('wpfrank-cis-media-uploader-js', CIS_PLUGIN_URL . 'assets/js/wpfrank-cis-multiple-media-uploader.js', array('jquery'));
		wp_enqueue_media();

		//custom add image box CSS
		wp_enqueue_style('wpfrank-cis-settings-css', CIS_PLUGIN_URL.'assets/css/wpfrank-cis-settings.css', array(), '1.0');

		//font awesome CSS
		wp_enqueue_style('wpfrank-cis-font-awesome-all-css', CIS_PLUGIN_URL.'assets/css/font-awesome-latest/css/fontawesome-all.css');

		//tool-tip JS & CSS
		wp_enqueue_script('wpfrank-cis-tool-tip-js',CIS_PLUGIN_URL.'assets/tooltip/jquery.darktooltip.min.js', array('jquery'));
		wp_enqueue_style('wpfrank-cis-tool-tip-css', CIS_PLUGIN_URL.'assets/tooltip/darktooltip.min.css');

		//color-picker CSS n JS
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wpfrank-cis-color-picker-custom-js', plugins_url('assets/js/wpfrank-cis-color-picker-custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

		//code-mirror CSS & JS for custom CSS section
		wp_enqueue_style('wpfrank-cis-code-mirror-css', CIS_PLUGIN_URL.'assets/css/codemirror/codemirror.css');
		wp_enqueue_style('wpfrank-cis-blackboard-css', CIS_PLUGIN_URL.'assets/css/codemirror/blackboard.css');
		wp_enqueue_style('wpfrank-cis-show-hint-css', CIS_PLUGIN_URL.'assets/css/codemirror/show-hint.css');

		wp_enqueue_script('wpfrank-cis-code-mirror-js',CIS_PLUGIN_URL.'assets/css/codemirror/codemirror.js',array('jquery'));
		wp_enqueue_script('wpfrank-cis-css-js',CIS_PLUGIN_URL.'assets/css/codemirror/ccis-css.js',array('jquery'));
		wp_enqueue_script('wpfrank-cis-css-hint-js',CIS_PLUGIN_URL.'assets/css/codemirror/css-hint.js',array('jquery'));
		require_once('settings.php');
	}

	public function ccis_shotcode_meta_box_function() { ?>
		<p><?php _e("Use below shortcode in any Page/Post to publish your slider", 'debonair-responsive-image-slider');?></p>
		<input readonly="readonly" type="text" value="<?php echo esc_attr("[CIS id=".get_the_ID()."]"); ?>" style="width:100%;">

		<p><?php _e("To embed slider in any custom theme template", 'debonair-responsive-image-slider');?></p>
		<?php $cis_shortcode = esc_attr("[CIS id=".get_the_ID()."]"); ?>
		<input readonly="readonly" type="text" value="&#x3c;&#x3f;php do_shortcode&#x28; '<?php echo esc_attr("[CIS id=".get_the_ID()."]"); ?>' &#x29;; &#x3f;&#x3e;" style="width:100%;">
		<?php
	}

	public function ccis_new_plugin_meta_box_function() { ?>
		<p><a href="https://wordpress.org/plugins/slider-factory/" target="_blank"><img src="<?php echo esc_url(CIS_PLUGIN_URL . "assets/img/products/slider-factory-free-wordpress-plugin.jpg"); ?>" width="100%" /></a></p>
		<p style="text-align: center;"><a href="plugin-install.php?s=slider%20factory&tab=search&type=term" class="button button-primary button-hero">Install Plugin</a></p>
		<?php
	}

	public function admin_thumb_cis($id) {
		$attachment = get_post( $id );
		$slide_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
		$slide_caption = $attachment->post_excerpt;
		$slide_description = $attachment->post_content;
		$slide_href = get_permalink( $attachment->ID );
		$slide_src = $attachment->guid;
		$slide_title = $attachment->post_title;
		$slide_medium = wp_get_attachment_image_src($id, 'medium', true);
		$slide_full  = wp_get_attachment_image_src($id, 'full', true);
		$UniqueString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
		?>
		<li id="<?php echo esc_attr($id); ?>" class="cis-slide" data-position="<?php echo esc_attr($id); ?>">
			<a id="cis-slide-delete-icon" class="cis-slide-delete-icon"><img src="<?php echo  esc_url(CIS_PLUGIN_URL.'assets/img/close-icon.png'); ?>" /></a>
			<div>
				<p>
					<img src="<?php echo esc_url($slide_medium[0]); ?>" class="cis-slide-image">
				<p>
					<label><?php _e('Slide Title', 'debonair-responsive-image-slider'); ?></label>
					<input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo esc_attr($UniqueString); ?>" />
					<input type="hidden" id="rpgp_image_id[]" name="rpgp_image_id[]" value="<?php echo esc_attr($id); ?>">
					<input type="text" id="rpgp_image_label[]" name="rpgp_image_label[]" value="<?php echo esc_attr($slide_title); ?>" placeholder="<?php _e('Enter Slide Title Here', 'debonair-responsive-image-slider'); ?>" class="cis-slide-input-text">
				</p>
				<p>
					<label><?php _e('Slide Description', 'debonair-responsive-image-slider'); ?></label>
					<textarea rows="4" cols="50" id="rpgp_image_desc[]" name="rpgp_image_desc[]" placeholder="<?php _e('Enter Slide Description Here', 'debonair-responsive-image-slider'); ?>" class="cisp_richeditbox_<?php echo esc_attr($id); ?> cis-slide-input-text"><?php echo $slide_description; ?></textarea>
					<button type="button" class="btn btn-md btn-info btn-block" data-toggle="modal" data-target="#myModal" onclick="cisp_richeditor(<?php echo esc_attr($id); ?>)"><?php _e('Use Rich Text Editor', 'debonair-responsive-image-slider'); ?> <i class="fa fa-edit"></i></button>
				</p>
				<p>
					<label><?php _e('Slide Alt Text', 'debonair-responsive-image-slider'); ?></label>
					<input type="text" id="rpgp_image_alt[]" name="rpgp_image_alt[]" class="cis-slide-input-text" value="<?php echo esc_attr($slide_alt); ?>" placeholder="<?php _e('Max Length 125 Characters', 'debonair-responsive-image-slider'); ?>">
				</p>
			</div>
		</li>
		<?php
	}

	public function ajax_get_thumbnail_cis() {
		echo esc_html($this->admin_thumb_cis($_POST['imageid']));
		die;
	}

	public function add_image_meta_box_save($PostID) {
		if ( current_user_can( 'manage_options' ) ) {
			if(isset($PostID) && isset($_POST['cis-save-action'])) {
				$TotalSlideIds = count($_POST['rpgp_image_id']);
				$SlideIds = array();
				if($TotalSlideIds) {
					for($i=0; $i < $TotalSlideIds; $i++) {
						$slide_id = sanitize_text_field($_POST['rpgp_image_id'][$i]);
						$slide_title = sanitize_text_field($_POST['rpgp_image_label'][$i]);
						$slide_desc = sanitize_textarea_field($_POST['rpgp_image_desc'][$i]);
						$slide_alt = sanitize_text_field($_POST['rpgp_image_alt'][$i]);
						$SlideIds[] = array(
							'rpgp_image_id' => $slide_id,
						);
						// update attachment image title and description
						$attachment_details = array(
							'ID' => $slide_id,
							'post_title' => $slide_title,
							'post_content' => $slide_desc
						);
						wp_update_post( $attachment_details );

						// update attachment alt text
						update_post_meta( $slide_id, '_wp_attachment_image_alt', $slide_alt );
					}
					update_post_meta($PostID, 'ccis_all_photos_details', $SlideIds);
				} else {
					update_post_meta($PostID, 'ccis_all_photos_details', $SlideIds);
				}
			}
		}
	}

	//save settings meta box values
	public function ccis_settings_meta_save($PostID) {
		if ( current_user_can( 'manage_options' ) ) {
			if(isset($PostID) && isset($_POST['wl_action']) == "wl-save-settings") {
				$WCIS_L3_Slide_Title				=	sanitize_text_field ( $_POST['wl-l3-slide-title'] );
				$WCIS_L3_Show_Slide_Title			=	sanitize_text_field ( $_POST['wl-l3-show-slide-title'] );
				$WCIS_L3_Show_Slide_Desc			=	sanitize_textarea_field ( $_POST['wl-l3-show-slide-desc'] );
				$WCIS_L3_Auto_Slideshow				=	sanitize_text_field ( $_POST['wl-l3-auto-slide'] );
				$WCIS_L3_Transition					=	sanitize_text_field ( $_POST['wl-l3-transition'] );
				$WCIS_L3_Transition					=	sanitize_text_field ( $_POST['wl-l33-transition'] );
				$WCIS_L3_Transition_Speed			=	sanitize_text_field ( $_POST['wl-l3-transition-speed'] );
				$WCIS_L3_Sliding_Arrow				=	sanitize_text_field ( $_POST['wl-l3-sliding-arrow'] );
				$WCIS_L3_Slider_Navigation			=	sanitize_text_field ( $_POST['wl-l3-navigation'] );
				$WCIS_L3_Navigation_Button			=	sanitize_text_field ( $_POST['wl-l3-navigation-button'] );
				$WCIS_L3_Slider_Width				=	sanitize_text_field ( $_POST['wl-l3-slider-width'] );
				$WCIS_L3_Slider_Height				=	sanitize_text_field ( $_POST['wl-l3-slider-height'] );
				$WCIS_L3_Font_Style					=	sanitize_text_field ( $_POST['wl-l3-font-style'] );
				$WCIS_L3_Title_Color				=	sanitize_text_field ( $_POST['wl-l3-title-color'] );
				$WCIS_L3_Slider_Scale_Mode			=	sanitize_text_field ( $_POST['wl-l3-slider_scale_mode'] );
				$WCIS_L3_Slider_Auto_Scale			=	sanitize_text_field ( $_POST['wl-l3-slider-auto-scale'] );
				$WCIS_L3_Title_BgColor				=	sanitize_text_field ( $_POST['wl-l3-title-bgcolor'] );
				$WCIS_L3_Desc_Color					=	sanitize_text_field ( $_POST['wl-l3-desc-color'] );
				$WCIS_L3_Desc_BgColor				=	sanitize_text_field ( $_POST['wl-l3-desc-bgcolor'] );
				$WCIS_L3_Navigation_Color			=	sanitize_text_field ( $_POST['wl-l3-navigation-color'] );
				$WCIS_L3_Fullscreeen				=	sanitize_text_field ( $_POST['wl-l3-fullscreen'] );
				$WCIS_L3_Custom_CSS					=	sanitize_text_field ( $_POST['wl-l3-custom-css'] );
				$WCIS_L3_Slide_Order				= 	sanitize_text_field ( $_POST['wl-l3-slide-order'] );
				$WCIS_L3_Slide_Distance				= 	sanitize_text_field ( $_POST['wl-l3-slide-distance'] );
				$WCIS_L3_Thumbnail_Style			= 	sanitize_text_field ( $_POST['wl-l3-thumbnail-style'] );
				$WCIS_L3_Navigation_Position		= 	sanitize_text_field ( $_POST['wl-l3-navigation-position'] );
				$WCIS_L3_Thumbnail_Width			= 	sanitize_text_field ( $_POST['wl-l3-navigation-width'] );
				$WCIS_L3_Thumbnail_Height			= 	sanitize_text_field ( $_POST['wl-l3-navigation-height'] );
				$WCIS_L3_Width						= 	sanitize_text_field ( $_POST['wl-l3-width'] );
				$WCIS_L3_Height						= 	sanitize_text_field ( $_POST['wl-l3-height'] );
				$WCIS_L3_Navigation_Bullets_Color	= 	sanitize_text_field ( $_POST['wl-l3-navigation-bullets-color'] );
				$WCIS_L3_Navigation_Pointer_Color	=	sanitize_text_field ( $_POST['wl-l3-navigation-pointer-color'] );

				$WCIS_Settings_Array = array(
					'WCIS_L3_Slide_Title'  			=>	$WCIS_L3_Slide_Title,
					'WCIS_L3_Show_Slide_Title'		=>	$WCIS_L3_Show_Slide_Title,
					'WCIS_L3_Show_Slide_Desc'		=>	$WCIS_L3_Show_Slide_Desc,
					'WCIS_L3_Auto_Slideshow'  		=>	$WCIS_L3_Auto_Slideshow,
					'WCIS_L3_Transition'  			=>	$WCIS_L3_Transition,
					'WCIS_L3_Transition_Speed'  	=>	$WCIS_L3_Transition_Speed,
					'WCIS_L3_Sliding_Arrow'  		=>	$WCIS_L3_Sliding_Arrow,
					'WCIS_L3_Slider_Navigation'  	=>	$WCIS_L3_Slider_Navigation,
					'WCIS_L3_Navigation_Button'  	=>	$WCIS_L3_Navigation_Button,
					'WCIS_L3_Slider_Width'  		=>	$WCIS_L3_Slider_Width,
					'WCIS_L3_Slider_Height'  		=>	$WCIS_L3_Slider_Height,
					'WCIS_L3_Font_Style'  			=>	$WCIS_L3_Font_Style,
					'WCIS_L3_Title_Color'   		=>	$WCIS_L3_Title_Color,
					'WCIS_L3_Slider_Scale_Mode'		=>	$WCIS_L3_Slider_Scale_Mode,
					'WCIS_L3_Slider_Auto_Scale'		=>	$WCIS_L3_Slider_Auto_Scale,
					'WCIS_L3_Title_BgColor'   		=>	$WCIS_L3_Title_BgColor,
					'WCIS_L3_Desc_Color'   			=>	$WCIS_L3_Desc_Color,
					'WCIS_L3_Desc_BgColor'  		=>	$WCIS_L3_Desc_BgColor,
					'WCIS_L3_Navigation_Color' 		=>	$WCIS_L3_Navigation_Color,
					'WCIS_L3_Fullscreeen' 			=>	$WCIS_L3_Fullscreeen,
					'WCIS_L3_Custom_CSS'  			=>	$WCIS_L3_Custom_CSS,
					'WCIS_L3_Slide_Order'   		=>	$WCIS_L3_Slide_Order,
					'WCIS_L3_Slide_Distance'   		=>	$WCIS_L3_Slide_Distance,
					'WCIS_L3_Thumbnail_Style'   	=>	$WCIS_L3_Thumbnail_Style,
					'WCIS_L3_Navigation_Position'   =>	$WCIS_L3_Navigation_Position,
					'WCIS_L3_Thumbnail_Width'   	=>	$WCIS_L3_Thumbnail_Width,
					'WCIS_L3_Thumbnail_Height'   	=>	$WCIS_L3_Thumbnail_Height,
					'WCIS_L3_Width'   				=>	$WCIS_L3_Width,
					'WCIS_L3_Height'   				=>	$WCIS_L3_Height,
					'WCIS_L3_Navigation_Bullets_Color'		=>	$WCIS_L3_Navigation_Bullets_Color,
					'WCIS_L3_Navigation_Pointer_Color'		=>	$WCIS_L3_Navigation_Pointer_Color,
				);
				$WCIS_Gallery_Settings = "WCIS_Gallery_Settings_".$PostID;
				update_post_meta($PostID, $WCIS_Gallery_Settings, $WCIS_Settings_Array);
			}
		}
	}
}

global $CIS;
$CIS = CIS::forge();

// All Slider Post Features Box
add_action( "admin_notices", "cis_admin_notice_resport" );
function cis_admin_notice_resport() {
	global $pagenow;
	$cis_screen = get_current_screen();
	if ( $pagenow == 'edit.php' && $cis_screen->post_type == "ccis_gallery" && ! isset( $_GET['page'] ) ) {
		require_once ( 'admin-banner.php' );
	}
}

// upgrade to pro
add_action('admin_menu' , 'cis_menu_pages');
function cis_menu_pages() {
	if ( current_user_can( 'manage_options' ) ) {
		add_submenu_page('edit.php?post_type=ccis_gallery', 'Recover Old Sliders', 'Recover Old Sliders', 'administrator', 'cis-recover-slider', 'cis_recover_slider_page');
		add_submenu_page('edit.php?post_type=ccis_gallery', 'Help & Support', 'Help & Support', 'administrator', 'cis-help-page', 'cis_help_and_support_page');
		function cis_recover_slider_page() {
			require_once('recover-slider.php');
		}
		function cis_help_and_support_page() {
			wp_enqueue_style('bootstrap-admin.css', CIS_PLUGIN_URL.'assets/css/bootstrap-latest/bootstrap-admin.css');
			require_once('help-and-support.php');
		}
	}
}

// CIS Shortcode
require_once("shortcode.php");
require_once('products.php');
?>
