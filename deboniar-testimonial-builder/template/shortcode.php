<?php
// shortcode calling
if ( ! defined( 'ABSPATH' ) ) exit;
add_shortcode( 'DEB_T', 'DEBShortCode' );
function DEBShortCode( $Id ) {
	ob_start();
	if(!isset($Id['id']))
	 {
		$WPSM_TEST_ID = "";
	 }
	else
	{
		$WPSM_TEST_ID = $Id['id'];
	}
	require("content.php");
	wp_reset_query();
    return ob_get_clean();
}
?>
