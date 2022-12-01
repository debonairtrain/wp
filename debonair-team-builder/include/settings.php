<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wp_enqueue_style( 'awplife-dtbm-toogle-css', DTBM_PLUGIN_URL . 'assets/css/toogle-button.css' );
wp_enqueue_script( 'awplife-dtbm-popper-min-js', DTBM_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ) );
wp_enqueue_script( 'awplife-dtbm-bootstrap-js', DTBM_PLUGIN_URL . 'assets/js/bootstrap.js', array( 'jquery' ) );

// code
$dtbm_post_settings = get_post_meta( $post->ID, 'dtbm_post_data_' . $post->ID, true );
?>
<div class="team-titles"><?php esc_html_e( 'Member Image Size', 'debonair-team-builder-member' ); ?> </div>
<?php
if ( isset( $dtbm_post_settings['dtbm_image_size'] ) ) {
	$dtbm_image_size = $dtbm_post_settings['dtbm_image_size'];
} else {
	$dtbm_image_size = 'dtbm-custom-300';
}
?>
<select id="dtbm_image_size" name="dtbm_image_size" class="form-control dtbm-tooltips" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e( 'Note: Custom cropped image will be available when you upload new images after plugin installation.', 'debonair-team-builder-member' ); ?>">
	<option value="thumbnail"
	<?php
	if ( $dtbm_image_size == 'thumbnail' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Thumbnail', 'debonair-team-builder-member' ); ?></option>
	<option value="medium"
	<?php
	if ( $dtbm_image_size == 'medium' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Medium', 'debonair-team-builder-member' ); ?></option>
	<option value="large"
	<?php
	if ( $dtbm_image_size == 'large' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Large', 'debonair-team-builder-member' ); ?></option>
	<option value="full"
	<?php
	if ( $dtbm_image_size == 'full' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Full', 'debonair-team-builder-member' ); ?></option>
	<option value="dtbm-custom-300"
	<?php
	if ( $dtbm_image_size == 'dtbm-custom-300' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Custom 300x300', 'debonair-team-builder-member' ); ?></option>
	<option value="dtbm-custom-500"
	<?php
	if ( $dtbm_image_size == 'dtbm-custom-500' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Custom 500x500', 'debonair-team-builder-member' ); ?></option>
</select>
<div class="team-titles"><?php esc_html_e( 'Team Members Per Row', 'debonair-team-builder-member' ); ?></div>
<?php
if ( isset( $dtbm_post_settings['dtbm_total_column'] ) ) {
	$dtbm_total_column = $dtbm_post_settings['dtbm_total_column'];
} else {
	$dtbm_total_column = 'col-md-3';
}
?>
<select id="dtbm_total_column" name="dtbm_total_column" class="form-control">
	<option value="col-md-3"
	<?php
	if ( $dtbm_total_column == 'col-md-3' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Four Member', 'debonair-team-builder-member' ); ?></option>
	<option value="col-md-4"
	<?php
	if ( $dtbm_total_column == 'col-md-4' ) {
		echo 'selected=selected';}
	?>
	><?php esc_html_e( 'Three Member', 'debonair-team-builder-member' ); ?></option>
</select>

<div class="team-titles"><?php esc_html_e( 'Background & Image Hover Color', 'debonair-team-builder-member' ); ?></div>
<?php
if ( isset( $dtbm_post_settings['dtbm_background_team_color'] ) ) {
	$dtbm_background_team_color = $dtbm_post_settings['dtbm_background_team_color'];
} else {
	$dtbm_background_team_color = '#34495e';
}
?>
<input type="text" id="dtbm_background_team_color" name="dtbm_background_team_color" value="<?php echo esc_html( $dtbm_background_team_color ); ?>" default-color="<?php echo esc_html( $dtbm_background_team_color ); ?>">

<div class="team-titles"><?php esc_html_e( 'Member Bio Color', 'debonair-team-builder-member' ); ?></div>
<?php
if ( isset( $dtbm_post_settings['dtbm_decription_color'] ) ) {
	$dtbm_decription_color = $dtbm_post_settings['dtbm_decription_color'];
} else {
	$dtbm_decription_color = '#ffffff';
}
?>
<input type="text" id="dtbm_decription_color" name="dtbm_decription_color" value="<?php echo esc_html( $dtbm_decription_color ); ?>" default-color="<?php echo esc_html( $dtbm_decription_color ); ?>">

<div class="team-titles"><?php esc_html_e( 'Open Link In', 'debonair-team-builder-member' ); ?></div>
<p class="switch-field em_size_field">
	<?php
	if ( isset( $dtbm_post_settings['dtbm_link_tab'] ) ) {
		$dtbm_link_tab = $dtbm_post_settings['dtbm_link_tab'];
	} else {
		$dtbm_link_tab = '_blank';
	}
	?>
	<input type="radio" name="dtbm_link_tab" id="team_link_tab1" value="_blank"
	<?php
	if ( $dtbm_link_tab == '_blank' ) {
		echo 'checked=checked';}
	?>
	>
	<label for="team_link_tab1"><?php esc_html_e( 'New Tab', 'debonair-team-builder-member' ); ?></label>
	<input type="radio" name="dtbm_link_tab" id="team_link_tab2" value="_self"
	<?php
	if ( $dtbm_link_tab == '_self' ) {
		echo 'checked=checked';}
	?>
	>
	<label for="team_link_tab2"><?php esc_html_e( 'Same Tab', 'debonair-team-builder-member' ); ?></label>
</p>
<div class="team-titles"><?php esc_html_e( 'Custom Css', 'debonair-team-builder-member' ); ?></div>
<?php
if ( isset( $dtbm_post_settings['dtbm_custom_css'] ) ) {
	$dtbm_custom_css = $dtbm_post_settings['dtbm_custom_css'];
} else {
	$dtbm_custom_css = '';
}
?>
<p>
<textarea type="text" id="dtbm_custom_css" name="dtbm_custom_css" class="form-control" placeholder="<?php esc_html_e( 'Custom Css', 'debonair-team-builder-member' ); ?>" rows="3"><?php echo $dtbm_custom_css; ?></textarea>
</p>

<script>
jQuery(document).ready(function(){
	// bootstrap tooltips
	jQuery('.dtbm-tooltips').tooltip();
});
</script>
