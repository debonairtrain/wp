<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_shortcode( 'DTBM', 'dtbm_shortcode' );
function dtbm_shortcode( $post_id ) {

	ob_start();
	$dtbm_post_settings = get_post_meta( $post_id['id'], 'dtbm_post_data_' . $post_id['id'], true );

	$dtbm_post_id = $post_id['id'];

	// fetch all Team
	$dtbm_post_data = array(
		'p'         => $dtbm_post_id,
		'post_type' => 'dtbm_cpt_name',
		'orderby'   => 'ASC',
	);
	$dtbm_loop      = new WP_Query( $dtbm_post_data );

	wp_enqueue_script( 'awplife-dtbm-bootstrap-js', DTBM_PLUGIN_URL . 'assets/js/bootstrap.js', array( 'jquery' ), '', false );
	wp_enqueue_style( 'awplife-dtbm-bootstrap-css', DTBM_PLUGIN_URL . 'assets/css/dtbm-frontend-bootstrap.css' );
	wp_enqueue_style( 'awplife-dtbm-font-awesome-css', DTBM_PLUGIN_URL . 'assets/css/font-awesome.css' );

	// post Setting
	if ( isset( $dtbm_post_settings['dtbm_template_design'] ) ) {
		$dtbm_template_design = $dtbm_post_settings['dtbm_template_design'];
	} else {
		$dtbm_template_design = 'template1';
	}
	if ( isset( $dtbm_post_settings['dtbm_image_size'] ) ) {
		$dtbm_image_size = $dtbm_post_settings['dtbm_image_size'];
	} else {
		$dtbm_image_size = 'medium';
	}
	if ( isset( $dtbm_post_settings['dtbm_total_column'] ) ) {
		$dtbm_total_column = $dtbm_post_settings['dtbm_total_column'];
	} else {
		$dtbm_total_column = '';
	}
	if ( isset( $dtbm_post_settings['dtbm_background_team_color'] ) ) {
		$dtbm_background_team_color = $dtbm_post_settings['dtbm_background_team_color'];
	} else {
		$dtbm_background_team_color = '#34495e';
	}
	if ( isset( $dtbm_post_settings['dtbm_decription_color'] ) ) {
		$dtbm_decription_color = $dtbm_post_settings['dtbm_decription_color'];
	} else {
		$dtbm_decription_color = '#ffffff';
	}
	if ( isset( $dtbm_post_settings['dtbm_link_tab'] ) ) {
		$dtbm_link_tab = $dtbm_post_settings['dtbm_link_tab'];
	} else {
		$dtbm_link_tab = '_blank';
	}
	if ( isset( $dtbm_post_settings['dtbm_custom_css'] ) ) {
		$dtbm_custom_css = $dtbm_post_settings['dtbm_custom_css'];
	} else {
		$dtbm_custom_css = '';
	}
	include 'include/non-carousel/no-owl-shotcode.php';
	if ( $dtbm_template_design == 'template1' ) {
		$template_number = 'template1';
		include 'assets/css/template1.php'; }
	if ( $dtbm_template_design == 'template2' ) {
		$template_number = 'template2';
		include 'assets/css/template2.php'; }
	if ( $dtbm_template_design == 'template3' ) {
		$template_number = 'template3';
		include 'assets/css/template3.php'; }
	if ( $dtbm_template_design == 'template4' ) {
		$template_number = 'template4';
		include 'assets/css/template4.php'; }
	?>
<style>
	<?php echo $dtbm_custom_css; ?>
</style>
	<?php
	wp_reset_query();
	return ob_get_clean();
}
?>
