<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// code
$dtbm_team_post_settings = get_post_meta( $post->ID, 'dtbm_post_data_' . $post->ID, true );
// uploader
wp_enqueue_script( 'media-upload' );
wp_enqueue_media();
wp_enqueue_script( 'awplife-dtbm-multi-uploader-js', DTBM_PLUGIN_URL . 'assets/js/dtbm-multi-uploader.js', array( 'jquery' ) );
wp_enqueue_script( 'awplife-dtbm-color-picker-js', DTBM_PLUGIN_URL . 'assets/js/dtbm-color-picker.js', array( 'jquery', 'wp-color-picker' ), '', true );
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_style( 'awplife-dtbm-media-uploader-css', DTBM_PLUGIN_URL . 'assets/css/team-media-uploader.css' );
wp_enqueue_style( 'awplife-dtbm-font-awesome-min-css', DTBM_PLUGIN_URL . 'assets/css/font-awesome.css' );
wp_enqueue_style( 'awplife-dtbm-bootstrap-css', DTBM_PLUGIN_URL . 'assets/css/bootstrap.css' );
?>
<div class="card">
	<div class="card-header">
		<strong><?php esc_html_e( 'Select A Template Design', 'debonair-team-builder-member' ); ?></strong>
	</div>
	<div class="card-body team-image-size">
		<div class="row">
			<?php
			if ( isset( $dtbm_team_post_settings['dtbm_template_design'] ) ) {
				$dtbm_template_design = $dtbm_team_post_settings['dtbm_template_design'];
			} else {
				$dtbm_template_design = 'template1';
			}
			?>
			<div class="col-md-2">
				<input type="radio" name="dtbm_template_design" id="team_maker_design_one" value="template1"
				<?php
				if ( $dtbm_template_design == 'template1' ) {
					echo 'checked=checked';}
				?>
				 >
				<label for="team_maker_design_one" class="team_layout_one"><img style="width:100%" src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'image/template-one.png'); ?>"/>
				</label>
			</div>
			<div class="col-md-2">
				<input type="radio" name="dtbm_template_design" id="team_maker_design_two" value="template2"
				<?php
				if ( $dtbm_template_design == 'template2' ) {
					echo 'checked=checked';}
				?>
				 >
				<label for="team_maker_design_two" class="team_layout_two" ><img style="width:100%" src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'image/template-two.png'); ?>"/>
				</label>
			</div>
			<div class="col-md-2">
				<input type="radio" name="dtbm_template_design" id="team_maker_design_three" value="template3"
				<?php
				if ( $dtbm_template_design == 'template3' ) {
					echo 'checked=checked';}
				?>
				 >
				<label for="team_maker_design_three" class="team_layout_three" ><img style="width:100%" src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'image/template-three.png'); ?>"/>
				</label>
			</div>
			<div class="col-md-3">
				<input type="radio" name="dtbm_template_design" id="team_maker_design_four" value="template4"
				<?php
				if ( $dtbm_template_design == 'template4' ) {
					echo 'checked=checked';}
				?>
				 >
				<label for="team_maker_design_four" class="team_layout_four" ><img style="width:100%" src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'image/template-four.gif'); ?>"/>
				</label>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div align="left">
			<div class="btn btn-rounded peach-gradient btn-lg" id="team_column_button" name="team_column_button">
				<i class="fa fa-user-circle"></i> &nbsp; <?php esc_html_e( 'Add New Team Member', 'debonair-team-builder-member' ); ?>
			</div>
			<div class="btn btn-danger btn-lg float-right" id="team_column_delete_all" name="team_column_delete_all">
				<i class="fa fa-trash"></i> &nbsp; <?php esc_html_e( 'Delete All Team Members', 'debonair-team-builder-member' ); ?>
			</div>
		</div>
	</div>
	<!-- dtbm Add Member -->

	<div id="media-slider-gallery">
		<div id="remove-media-slides" class="plugin-template-mediabox">
			<?php
			if ( isset( $dtbm_team_post_settings['dtbm_template_column_ids'] ) ) {
				$count = 0;
				foreach ( $dtbm_team_post_settings['dtbm_template_column_ids'] as $id ) {
					$dtbm_icon_link_url_first  = $dtbm_team_post_settings['dtbm_icon_link_url_first'][ $count ];
					$dtbm_icon_link_url_second = $dtbm_team_post_settings['dtbm_icon_link_url_second'][ $count ];
					$dtbm_icon_link_url_third  = $dtbm_team_post_settings['dtbm_icon_link_url_third'][ $count ];
					$dtbm_designation          = $dtbm_team_post_settings['dtbm_designation'][ $count ];

					// get member image name and bio
					$attachment = get_post( $id ); // get all of image
					if ( isset( $dtbm_team_post_settings['dtbm_image_size'] ) ) {
						$dtbm_image_size = $dtbm_team_post_settings['dtbm_image_size'];
					} else {
						$dtbm_image_size = 'dtbm-custom-300';
					}
					$dtbm_member_image       = wp_get_attachment_image_src( $id, $dtbm_image_size, true ); // return is URL as array[0]
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
														<input type="text" id="dtbm_icon_link_url_first[]" name="dtbm_icon_link_url_first[]" class="form-control team-style-two" placeholder="<?php esc_html_e( 'Facebook URL', 'debonair-team-builder-member' ); ?>" value="<?php echo esc_url( $dtbm_icon_link_url_first ); ?>">
														<input type="text" id="dtbm_icon_link_url_second[]" name="dtbm_icon_link_url_second[]" class="form-control team-style-two" placeholder="<?php esc_html_e( 'Twitter URL', 'debonair-team-builder-member' ); ?>" value="<?php echo esc_url( $dtbm_icon_link_url_second ); ?>">
														<input type="text" id="dtbm_icon_link_url_third[]" name="dtbm_icon_link_url_third[]" class="form-control team-style-two" placeholder="<?php esc_html_e( 'LinkedIn URL', 'debonair-team-builder-member' ); ?>" value="<?php echo esc_url( $dtbm_icon_link_url_third ); ?>">
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
					<?php
					$count++; } // end of for each
			} //end of if
			?>
		</div>
	</div>
</div>
<!-- team maker Add end  -->
<script>
var alwselectedlayout = jQuery('[name=dtbm_template_design]:checked').val();
if(alwselectedlayout == 'template1') {
	jQuery('.team_layout_one').addClass('team_layout');
} else {
	jQuery('.team_layout_one').removeClass('team_layout');
}
if(alwselectedlayout == 'template2') {
	jQuery('.team_layout_two').addClass('team_layout');
} else {
	jQuery('.team_layout_two').removeClass('team_layout');
}
if(alwselectedlayout == 'template3') {
	jQuery('.team_layout_three').addClass('team_layout');
} else {
	jQuery('.team_layout_three').removeClass('team_layout');
}
if(alwselectedlayout == 'template4') {
	jQuery('.team_layout_four').addClass('team_layout');
} else {
	jQuery('.team_layout_four').removeClass('team_layout');
}

jQuery(document).ready(function() {
	jQuery('input[type=radio][name=dtbm_template_design]').change(function() {
		var alwselectedlayout = jQuery('[name=dtbm_template_design]:checked').val();
		if(alwselectedlayout == 'template1') {
			jQuery('.team_layout_one').addClass('team_layout');
			jQuery('#dtbm_background_team_color').iris('color', '#34495e');
			jQuery('#dtbm_decription_color').iris('color', '#ffffff');
		} else {
			jQuery('.team_layout_one').removeClass('team_layout');
		}

		if(alwselectedlayout == 'template2') {
			jQuery('.team_layout_two').addClass('team_layout');
			jQuery('#dtbm_background_team_color').iris('color', '#1e73be');
			jQuery('#dtbm_decription_color').iris('color', '#000000');

		} else {
			jQuery('.team_layout_two').removeClass('team_layout');
		}

		if(alwselectedlayout == 'template3') {
			jQuery('.team_layout_three').addClass('team_layout');
			jQuery('#dtbm_background_team_color').iris('color', '#dd3333');
			jQuery('#dtbm_decription_color').iris('color', '#000000');
		} else {
			jQuery('.team_layout_three').removeClass('team_layout');
		}

		if(alwselectedlayout == 'template4') {
			jQuery('.team_layout_four').addClass('team_layout');
			jQuery('#dtbm_background_team_color').iris('color', '#1e73be');
			jQuery('#dtbm_decription_color').iris('color', '#000000');
		} else {
			jQuery('.team_layout_four').removeClass('team_layout');
		}
	});
});
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

//color-picker
(function( jQuery ) {
	jQuery(function() {
		// Add Color Picker
		jQuery('#dtbm_background_team_color').wpColorPicker();
		jQuery('#dtbm_decription_color').wpColorPicker();
	});
})( jQuery );
jQuery(document).ajaxComplete(function() {
	jQuery('#dtbm_background_team_color').wpColorPicker();
	jQuery('#dtbm_decription_color').wpColorPicker();
});
</script>
