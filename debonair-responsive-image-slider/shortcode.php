<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_shortcode( 'CIS', 'Wpfrank_CIS_Shortcode' );
function Wpfrank_CIS_Shortcode( $Id ) {

	ob_start();
	// slider JS CSS scripts
	wp_enqueue_script('wpfrank-cis-jquery-sliderPro-js', CIS_PLUGIN_URL.'assets/js/jquery.sliderPro.js', array('jquery'), '1.5.0', true);
	wp_enqueue_style('wpfrank-cis-slider-css', CIS_PLUGIN_URL.'assets/css/slider-pro.css');

	//Load Saved debonair Responsive Image Slider Settings
	if(!isset($Id['id'])) {
		$Id['id'] = "";
	} else {
		$WCIS_Id = $Id['id'];
		$WCIS_Gallery_Settings_Key = "WCIS_Gallery_Settings_".$WCIS_Id;

		$WCIS_Gallery_Settings = get_post_meta( $WCIS_Id, $WCIS_Gallery_Settings_Key, true);
		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slide_Title']))
			$WCIS_L3_Slide_Title				= $WCIS_Gallery_Settings['WCIS_L3_Slide_Title'];
		else
			$WCIS_L3_Slide_Title				= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Show_Slide_Title']))
			$WCIS_L3_Show_Slide_Title			= $WCIS_Gallery_Settings['WCIS_L3_Show_Slide_Title'];
		else
			$WCIS_L3_Show_Slide_Title			= 0;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Show_Slide_Desc']))
			$WCIS_L3_Show_Slide_Desc			= $WCIS_Gallery_Settings['WCIS_L3_Show_Slide_Desc'];
		else
			$WCIS_L3_Show_Slide_Desc			= 0;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Auto_Slideshow']))
			$WCIS_L3_Auto_Slideshow				= $WCIS_Gallery_Settings['WCIS_L3_Auto_Slideshow'];
		else
			$WCIS_L3_Auto_Slideshow				= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Transition']))
			$WCIS_L3_Transition					= $WCIS_Gallery_Settings['WCIS_L3_Transition'];
		else
			$WCIS_L3_Transition					= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Transition_Speed']))
			$WCIS_L3_Transition_Speed			= $WCIS_Gallery_Settings['WCIS_L3_Transition_Speed'];
		else
			$WCIS_L3_Transition_Speed			= 5000;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slide_Order']))
			$WCIS_L3_Slide_Order				= $WCIS_Gallery_Settings['WCIS_L3_Slide_Order'];
		else
			$WCIS_L3_Slide_Order				= "ASC";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slide_Distance']))
			$WCIS_L3_Slide_Distance				= $WCIS_Gallery_Settings['WCIS_L3_Slide_Distance'];
		else
			$WCIS_L3_Slide_Distance				= 5;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Sliding_Arrow']))
			$WCIS_L3_Sliding_Arrow				= $WCIS_Gallery_Settings['WCIS_L3_Sliding_Arrow'];
		else
			$WCIS_L3_Sliding_Arrow				= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slider_Navigation']))
			$WCIS_L3_Slider_Navigation			= $WCIS_Gallery_Settings['WCIS_L3_Slider_Navigation'];
		else
			$WCIS_L3_Slider_Navigation			= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Navigation_Position']))
			$WCIS_L3_Navigation_Position		= $WCIS_Gallery_Settings['WCIS_L3_Navigation_Position'];
		else
			$WCIS_L3_Navigation_Position		= "bottom";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Style']))
			$WCIS_L3_Thumbnail_Style			= $WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Style'];
		else
			$WCIS_L3_Thumbnail_Style			= "border";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Width']))
			$WCIS_L3_Thumbnail_Width			= $WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Width'];
		else
			$WCIS_L3_Thumbnail_Width			= 120;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Height']))
			$WCIS_L3_Thumbnail_Height			= $WCIS_Gallery_Settings['WCIS_L3_Thumbnail_Height'];
		else
			$WCIS_L3_Thumbnail_Height			= 120;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Navigation_Button']))
			$WCIS_L3_Navigation_Button			= $WCIS_Gallery_Settings['WCIS_L3_Navigation_Button'];
		else
			$WCIS_L3_Navigation_Button			= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Width']))
			$WCIS_L3_Width						= $WCIS_Gallery_Settings['WCIS_L3_Width'];
		else
			$WCIS_L3_Width						= "custom";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slider_Width']))
			$WCIS_L3_Slider_Width				= $WCIS_Gallery_Settings['WCIS_L3_Slider_Width'];
		else
			$WCIS_L3_Slider_Width				= 1000;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Height']))
			$WCIS_L3_Height						= $WCIS_Gallery_Settings['WCIS_L3_Height'];
		else
			$WCIS_L3_Height						= "custom";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slider_Height']))
			$WCIS_L3_Slider_Height				= $WCIS_Gallery_Settings['WCIS_L3_Slider_Height'];
		else
			$WCIS_L3_Slider_Height				= 500;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slider_Scale_Mode']))
			$WCIS_L3_Slider_Scale_Mode			= $WCIS_Gallery_Settings['WCIS_L3_Slider_Scale_Mode'];
		else
			$WCIS_L3_Slider_Scale_Mode			= "cover";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Slider_Auto_Scale']))
			$WCIS_L3_Slider_Auto_Scale			= $WCIS_Gallery_Settings['WCIS_L3_Slider_Auto_Scale'];
		else
			$WCIS_L3_Slider_Auto_Scale			= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Font_Style']))
			$WCIS_L3_Font_Style					= $WCIS_Gallery_Settings['WCIS_L3_Font_Style'];
		else
			$WCIS_L3_Font_Style					= "Arial";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Title_Color']))
			$WCIS_L3_Title_Color				= $WCIS_Gallery_Settings['WCIS_L3_Title_Color'];
		else
			$WCIS_L3_Title_Color				= "#FFFFFF";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Title_BgColor']))
			$WCIS_L3_Title_BgColor				= $WCIS_Gallery_Settings['WCIS_L3_Title_BgColor'];
		else
			$WCIS_L3_Title_BgColor				= "#000000";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Desc_Color']))
			$WCIS_L3_Desc_Color					= $WCIS_Gallery_Settings['WCIS_L3_Desc_Color'];
		else
			$WCIS_L3_Desc_Color					= "#FFFFFF";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Desc_BgColor']))
			$WCIS_L3_Desc_BgColor				= $WCIS_Gallery_Settings['WCIS_L3_Desc_BgColor'];
		else
			$WCIS_L3_Desc_BgColor				= "#00000";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Navigation_Color']))
			$WCIS_L3_Navigation_Color			= $WCIS_Gallery_Settings['WCIS_L3_Navigation_Color'];
		else
			$WCIS_L3_Navigation_Color			= "#FFFFFF";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Fullscreeen']))
			$WCIS_L3_Fullscreeen				= $WCIS_Gallery_Settings['WCIS_L3_Fullscreeen'];
		else
			$WCIS_L3_Fullscreeen				= 1;

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Custom_CSS']))
			$WCIS_L3_Custom_CSS					= $WCIS_Gallery_Settings['WCIS_L3_Custom_CSS'];
		else
			$WCIS_L3_Custom_CSS					= "";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Navigation_Bullets_Color']))
			$WCIS_L3_Navigation_Bullets_Color	= $WCIS_Gallery_Settings['WCIS_L3_Navigation_Bullets_Color'];
		else
			$WCIS_L3_Navigation_Bullets_Color	= "#000000";

		if(isset($WCIS_Gallery_Settings['WCIS_L3_Navigation_Pointer_Color']))
			$WCIS_L3_Navigation_Pointer_Color	= $WCIS_Gallery_Settings['WCIS_L3_Navigation_Pointer_Color'];
		else
			$WCIS_L3_Navigation_Pointer_Color	= "#000000";
	}
	//Load Slider Layout Output
	require("layout.php");
	wp_reset_query();
	return ob_get_clean();
}
?>
