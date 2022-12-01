<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Plugin Name:       Debonair Team Builder Member
 * Plugin URI:        https://debonairtraining.com/
 * Description:       Create and display your dream team on your WordPress website in few minutes.
 * Version:           0.0.1
 * Requires at least: 6.0.1
 * Requires PHP:      7.2
 * Author:            Abbas Umaru
 * Author URI:        https://debonairtraining.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       debonair-team-builder-member
 * Domain Path:       /languages
 * License:           GPL2

Debonair Team Builder Member is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Debonair Team Builder Member is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Team Builder Member Showcase. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

add_image_size( 'dtbm-custom-300', 300, 300, array( 'top', 'center' ) );
add_image_size( 'dtbm-custom-500', 500, 500, array( 'top', 'center' ) );
add_option( 'awplife_dtbm_plugin_version', '0.0.21' );

if ( ! class_exists( 'DTBM_AWPLIFE' ) ) {
	class DTBM_AWPLIFE {

		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}

		protected function _constants() {
			// Plugin Version
			define( 'DTBM_PLUGIN_VER', '0.0.21' );

			// Plugin Text Domain
			define( 'DTBM_TXTDM', 'debonair-team-builder-member' );

			// Plugin Name
			define( 'DTBM_PLUGIN_NAME', __( 'Team Builder Member Showcase', DTBM_TXTDM ) );

			// Plugin Slug
			define( 'DTBM_PLUGIN_SLUG', 'dtbm_cpt_name' );

			// Plugin Directory Path
			define( 'DTBM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			// Plugin Directory URL
			define( 'DTBM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			define( 'DTBM_SECURE_KEY', md5( NONCE_KEY ) );

		} // end of constructor function

		protected function _hooks() {
			// Load text domain
			add_action( 'plugins_loaded', array( $this, 'dtbm_load_textdomain' ) );

			// create dtbm custom post callback
			add_action( 'init', array( $this, 'dtbm_cpt' ) );

			// add dtbm meta box to custom post
			add_action( 'add_meta_boxes', array( $this, 'dtbm_add_meta_box' ) );

			// loaded during admin init
			add_action( 'admin_init', array( $this, 'dtbm_add_meta_box' ) );

			add_action( 'wp_ajax_dtbm_add_member_li', array( &$this, 'dtbm_ajax_add_member_li_callback' ) );

			add_action( 'save_post', array( &$this, 'dtbm_save_settings' ) );

			// dtbm shortcode compatibility in text widgets
			add_action( 'widget_text', 'do_shortcode' );

			// add dtbm cpt shortcode column - manage_{$post_type}_posts_columns
			add_filter( 'manage_dtbm_cpt_name_posts_columns', array( &$this, 'dtbm_set_shortcode_column_name' ) );

			// add dtbm cpt shortcode column data - manage_{$post_type}_posts_custom_column
			add_action( 'manage_dtbm_cpt_name_posts_custom_column', array( &$this, 'dtbm_shodrcode_column_data' ), 10, 2 );

			add_action( 'wp_enqueue_scripts', array( &$this, 'dtbm_jquery_support' ) );
		}
		// end of hook function

		public function dtbm_jquery_support() {
			wp_enqueue_script( 'jquery' );
		}

		// dtbm cpt shortcode column before date columns
		public function dtbm_set_shortcode_column_name( $defaults ) {
			$new       = array();
			$shortcode = $columns['dtbm_shortcode'];    // save the tags column
			unset( $defaults['tags'] );   // remove it from the columns list

			foreach ( $defaults as $key => $value ) {
				if ( $key == 'date' ) {  // when we find the date column
					$new['dtbm_shortcode'] = __( 'Shortcode', 'debonair-team-builder-member' );  // put the tags column before it
				}
				$new[ $key ] = $value;
			}
			return $new;
		}

		// dtbm cpt shortcode column data
		public function dtbm_shodrcode_column_data( $column, $post_id ) {
			switch ( $column ) {
				case 'responsive_slider_shortcode':
					echo "<input type='text' class='button button-primary' id='dtbm_cpt_name-shortcode-" . esc_attr( $post_id ) . "' value='[DTBM id=" . esc_attr( $post_id ) . "]' style='font-weight:bold; background-color:#32373C; color:#FFFFFF; text-align:center;' />";
					echo "<input type='button' class='button button-primary' onclick='return TMCopyShortcode" . esc_attr( $post_id ) . "();' readonly value='Copy' style='margin-left:4px;' />";
					echo "<span id='copy-msg-" . esc_attr( $post_id ) . "' class='button button-primary' style='display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;'>copied</span>";
					echo '<script>
						function TMCopyShortcode' . esc_attr( $post_id ) . "() {
							var copyText = document.getElementById('dtbm_cpt_name-shortcode-" . esc_attr( $post_id ) . "');
							copyText.select();
							document.execCommand('copy');

							//fade in and out copied message
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeIn('1000', 'linear');
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeOut(2500,'swing');
						}
						</script>
					";
					break;
			}
		}


		public function dtbm_load_textdomain() {
			load_plugin_textdomain( 'debonair-team-builder-member', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		public function dtbm_cpt() {
			$labels = array(
				'name'               => __( 'DTBM', 'debonair-team-builder-member' ),
				'singular_name'      => __( 'DTBM', 'debonair-team-builder-member' ),
				'menu_name'          => __( 'DTBM', 'debonair-team-builder-member' ),
				'name_admin_bar'     => __( 'DTBM', 'debonair-team-builder-member' ),
				'add_new'            => __( 'Add Team', 'debonair-team-builder-member' ),
				'add_new_item'       => __( 'Add Team', 'debonair-team-builder-member' ),
				'new_item'           => __( 'New Team', 'debonair-team-builder-member' ),
				'edit_item'          => __( 'Edit Team', 'debonair-team-builder-member' ),
				'view_item'          => __( 'View Team', 'debonair-team-builder-member' ),
				'all_items'          => __( 'All Team', 'debonair-team-builder-member' ),
				'search_items'       => __( 'Search Team', 'debonair-team-builder-member' ),
				'parent_item_colon'  => __( 'Parent Team', 'debonair-team-builder-member' ),
				'not_found'          => __( 'No Team', 'debonair-team-builder-member' ),
				'not_found_in_trash' => __( 'No Team found in Trash', 'debonair-team-builder-member' ),
			);

			$args = array(
				'labels'             => __( 'DTBM', 'debonair-team-builder-member' ),
				'description'        => __( 'Description.', 'debonair-team-builder-member' ),
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'capability_type'    => 'page',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_icon'          => 'dashicons-groups',
				'menu_position'      => null,
				'supports'           => array( 'title' ),
			);
			register_post_type( 'dtbm_cpt_name', $args );
		}

		public function dtbm_add_meta_box() {
			add_meta_box( __( 'Create Team Shortcode And Configure Settings', 'debonair-team-builder-member' ), __( 'Create Team Shortcode And Configure Settings', 'debonair-team-builder-member' ), array( &$this, 'dtbm_team_upload' ), 'dtbm_cpt_name', 'normal', 'default' );
			add_meta_box( __( 'Team Shortcode', 'debonair-team-builder-member' ), __( 'Team Shortcode', 'debonair-team-builder-member' ), array( &$this, 'dtbm_maker_shortcode' ), 'dtbm_cpt_name', 'side', 'default' );
			add_meta_box( __( 'Configure Settings', 'debonair-team-builder-member' ), __( 'Configure Settings', 'debonair-team-builder-member' ), array( &$this, 'dtbm_settings' ), 'dtbm_cpt_name', 'side', 'default' );
			//add_meta_box( __( 'Upgrade Team Builder Showcase', 'debonair-team-builder-member' ), __( 'Upgrade Team Builder Showcase', 'debonair-team-builder-member' ), array( &$this, 'dtbm_upgrade_pro' ), 'dtbm_cpt_name', 'side', 'default' );
			//add_meta_box( __( 'Rate Our Plugin', 'debonair-team-builder-member' ), __( 'Rate Our Plugin', 'debonair-team-builder-member' ), array( &$this, 'dtbm_rate_plugin' ), 'dtbm_cpt_name', 'side', 'default' );
		}

		// meta upgrade pro
		public function dtbm_upgrade_pro() { ?>
			<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'include/image/Untitled-1.png');?>"/ width="250" height="280">
			<a href="https://awplife.com/demo/debonair-team-builder-member-premium/" target="_new" class="button button-primary button-large" style="text-shadow: none; margin-top:10px"><span class="dashicons dashicons-search" style="line-height:1.4;" ></span> Live Demo</a>
			<a href="https://awplife.com/wordpress-plugins/debonair-team-builder-member-premium/" target="_new" class="button button-primary button-large" style="text-shadow: none; margin-top:10px"><span class="dashicons dashicons-unlock" style="line-height:1.4;" ></span> Upgrade Pro</a>
			<?php
		}
		// meta rate us
		public function dtbm_rate_plugin() {
			?>
		<div style="text-align:center">
			<p>If you like our plugin then please <b>Rate us</b> on WordPress</p>
		</div>
		<div style="text-align:center">
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</div>
		<br>
		<div style="text-align:center">
			<a href="https://wordpress.org/support/plugin/debonair-team-builder-member/reviews/?filter=5" target="_new" class="button button-primary button-large" style="text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;" ></span> Please Rate Us</a>
		</div>
			<?php
		}

		public function dtbm_maker_shortcode( $post ) {
			?>
			<div class="team-shortcode">
				<input type="text" name="dtbm_cpt_name-shortcode" id="dtbm_cpt_name-shortcode" value="<?php echo esc_attr("[DTBM id=".$post->ID."]"); ?>" readonly style="height: 60px; text-align: center; width:100%;  font-size: 24px; border: 2px dashed;">
				<p id="dtbm-copt-code">Shortcode copied to clipboard!</p>
				<p style="margin-top: 10px"><?php esc_html_e( 'Copy & Embed shortcode into any Page / Post to display your Team on site.', 'debonair-team-builder-member' ); ?><br></p>
			</div>
			<span onclick="dtbmCopyToClipboard('#dtbm_cpt_name-shortcode')" class="dtbm-copy dashicons dashicons-clipboard"></span>
			<style>
			.dtbm-copy {
				position: absolute;
				top: 9px;
				right: 24px;
				font-size: 26px;
				cursor: pointer;
			}
			</style>
			<script>
			jQuery( "#dtbm-copt-code" ).hide();
			function dtbmCopyToClipboard(element) {
				var $temp = jQuery("<input>");
				jQuery("body").append($temp);
				$temp.val(jQuery(element).val()).select();
				document.execCommand("copy");
				$temp.remove();
				jQuery( "#dtbm_cpt_name-shortcode" ).select();
				jQuery( "#dtbm-copt-code" ).fadeIn();
			}
			</script>
			<?php
		}
		public function dtbm_settings( $post ) {
			require_once 'include/settings.php';
		}

		public function dtbm_team_upload( $post ) {
			// Meta content js
			wp_enqueue_script( 'jquery' );

			// Meta content css
			wp_enqueue_style( 'awplife-dtbm-setting-css', DTBM_PLUGIN_URL . 'assets/css/team-setting.css' );

			require_once 'include/add-team.php';
			wp_nonce_field( 'dtbm_save_settings_nonce_action', 'dtbm_save_settings_nonce_name' );
		}

		// Plugin
		public function dtbm_ajax_plugin_add_member( $id ) {
			$attachment              = get_post( $id ); // get all of image
			$dtbm_member_image       = wp_get_attachment_image_src( $id, 'dtbm-custom-300', true ); // return is array	medium image URL
			$dtbm_member_image_alt   = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
			$dtbm_member_name        = $attachment->post_title; // attachment title
			$dtbm_member_description = $attachment->post_content;
			?>
			<div id="dtbm-member-<?php echo esc_attr( $id ); ?>" class="team-panel-body">
				<div class="t-panel-body" style="position:relative">
					<div class="team-panel-class">
						<ul>
							<li>
								<div class="row">
									<div class="col-md-3">
										<img class="team-thumbnail-upload" src="<?php echo esc_url( $dtbm_member_image[0] ); ?>" alt="<?php echo esc_html( $dtbm_member_image_alt ); ?>">
										<input type="hidden" id="dtbm_template_column_ids[]" name="dtbm_template_column_ids[]" value="<?php echo esc_attr( $id ); ?>" />
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6 ">
												<input type="text" id="dtbm_member_name[]" name="dtbm_member_name[]" class="form-control team-style" placeholder="<?php esc_html_e( 'Member Name', 'debonair-team-builder-member' ); ?>" value="<?php echo esc_html( $dtbm_member_name ); ?>">
												<input type="text" id="dtbm_designation[]" name="dtbm_designation[]" class="form-control team-style" placeholder="<?php esc_html_e( 'Member Designation', 'debonair-team-builder-member' ); ?>" value="<?php echo esc_html( $dtbm_designation ); ?>">
												<textarea type="text" id="dtbm_member_description[]" name="dtbm_member_description[]" class="form-control"  placeholder="<?php esc_html_e( 'Member Bio', 'debonair-team-builder-member' ); ?>" rows="6"><?php echo esc_html( $dtbm_member_description ); ?></textarea>
											</div>
											<div class="col-md-6">
												<input type="text" class="form-control team-style-two" id="dtbm_icon_link_url_first[]" name="dtbm_icon_link_url_first[]" placeholder="<?php esc_html_e( 'Facebook URL', 'debonair-team-builder-member' ); ?>" value="#">
												<input type="text" id="dtbm_icon_link_url_second[]" name="dtbm_icon_link_url_second[]" class="form-control team-style-two" placeholder="<?php esc_html_e( 'Twitter URL', 'debonair-team-builder-member' ); ?>" value="#">
												<input type="text" id="dtbm_icon_link_url_third[]" name="dtbm_icon_link_url_third[]" class="form-control team-style-two" placeholder="<?php esc_html_e( 'LinkedIn URL', 'debonair-team-builder-member' ); ?>" value="#">
												<button class="btn btn-block btn-danger" id="team_column_delete" name="team_column_delete" value="dtbm-member-<?php echo esc_attr( $id ); ?>">
													<i class="fa fa-trash"></i> &nbsp; <?php esc_html_e( 'Delete Team Member', 'debonair-team-builder-member' ); ?>
												</button>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<script>
			function DTBMgetRandomColor() {
				var letters = '0123456789ABCDEF';
				var color = '#';
				for (var i = 0; i < 6; i++) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				return color;
			}
			jQuery('.t-panel-body').each(function( val, i ) {
				jQuery(this).css("border-left", "5px solid "+ DTBMgetRandomColor() + "");
			});
			</script>
			<?php
		} //end of if

		public function dtbm_ajax_add_member_li_callback() {
			echo esc_attr( $this->dtbm_ajax_plugin_add_member( $_POST['slideId'] ) );
			die;
		}

		public function dtbm_save_settings( $post_id ) {
			if ( isset( $_POST['dtbm_save_settings_nonce_name'] ) ) {
				if ( ! isset( $_POST['dtbm_save_settings_nonce_name'] ) || ! wp_verify_nonce( $_POST['dtbm_save_settings_nonce_name'], 'dtbm_save_settings_nonce_action' ) ) {
					print 'Sorry, your nonce did not verify.';
					exit;
				} else {
					$dtbm_template_design       = sanitize_text_field( $_POST['dtbm_template_design'] );
					$dtbm_image_size            = sanitize_text_field( $_POST['dtbm_image_size'] );
					$dtbm_total_column          = sanitize_text_field( $_POST['dtbm_total_column'] );
					$dtbm_background_team_color = sanitize_hex_color( $_POST['dtbm_background_team_color'] );
					$dtbm_decription_color      = sanitize_hex_color( $_POST['dtbm_decription_color'] );
					$dtbm_link_tab              = sanitize_text_field( $_POST['dtbm_link_tab'] );
					$dtbm_custom_css            = sanitize_text_field( $_POST['dtbm_custom_css'] );
					$i                          = 0;

					$dtbm_image_ids_val = array_map( 'sanitize_text_field', $_POST['dtbm_template_column_ids'] );
					foreach ( $dtbm_image_ids_val as $image_id ) {
						$dtbm_image_ids[]          = sanitize_text_field( $_POST['dtbm_template_column_ids'][ $i ] );
						$dtbm_member_designation[] = sanitize_text_field( $_POST['dtbm_designation'][ $i ] );
						$dtbm_member_link_frst[]   = sanitize_text_field( $_POST['dtbm_icon_link_url_first'][ $i ] );
						$dtbm_member_link_second[] = sanitize_text_field( $_POST['dtbm_icon_link_url_second'][ $i ] );
						$dtbm_member_link_third[]  = sanitize_text_field( $_POST['dtbm_icon_link_url_third'][ $i ] );

						// update member image name and bio
						$dtbm_member_image_details = array(
							'ID'           => sanitize_text_field( $image_id ),
							'post_title'   => sanitize_text_field( $_POST['dtbm_member_name'][ $i ] ),
							'post_content' => sanitize_text_field( $_POST['dtbm_member_description'][ $i ] ),
						);
						wp_update_post( $dtbm_member_image_details );
						$i++;
					}

					$dtbm_settings = array(
						'dtbm_template_column_ids'   => $dtbm_image_ids,
						'dtbm_designation'           => $dtbm_member_designation,
						'dtbm_image_size'            => $dtbm_image_size,
						'dtbm_icon_link_url_first'   => $dtbm_member_link_frst,
						'dtbm_icon_link_url_second'  => $dtbm_member_link_second,
						'dtbm_icon_link_url_third'   => $dtbm_member_link_third,
						'dtbm_template_design'       => $dtbm_template_design,
						'dtbm_total_column'          => $dtbm_total_column,
						'dtbm_background_team_color' => $dtbm_background_team_color,
						'dtbm_decription_color'      => $dtbm_decription_color,
						'dtbm_link_tab'              => $dtbm_link_tab,
						'dtbm_custom_css'            => $dtbm_custom_css,
					);

					$dtbm_settings_meta_key = 'dtbm_post_data_' . $post_id;
					update_post_meta( $post_id, $dtbm_settings_meta_key, $dtbm_settings );
				}
			}//// end save setting
		}//end dtbm_save_settings()
	}

	$dtbm_object = new DTBM_AWPLIFE();
	require_once 'shotcode.php';
}
?>
