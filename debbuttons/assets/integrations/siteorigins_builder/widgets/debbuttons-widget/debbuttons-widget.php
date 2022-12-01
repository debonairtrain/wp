<?php
/*
Widget Name: DebButtons
Description: DebButtons widget
Author: Max Foundry
Author URI: https://debbuttons.com
*/
namespace DebButtons;
defined('ABSPATH') or die('No direct access permitted');

//use \SiteOrigin_Widget as SiteOrigin_Widget;

class Widget_DebButtons_Widget extends \SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-debbutton',
			__('DebButtons', 'debbuttons'),
			array(
				'description' => __('DebButtons for the page builder.', 'debbuttons'),
				'panels_groups' => array('debbuttons'),
 				'has_preview' => false,
			),
			array(

			),
			array(
				'id' => array('type' => 'DebButton',
							  'label' => __('Select a debbutton','debbuttons'),
							//  'library' => 'debbuttons',
				),

			 	'text' => array(
					'type' => 'text',
					'label' => __('Button text [optional]', 'debbuttons'),
				),

				'url' => array(
					'type' => 'link',
					'label' => __('Destination URL [optional]', 'debbuttons'),
				),

				'window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window [optional]', 'debbuttons'),
				),

			),
			plugin_dir_path(__FILE__)
		);

	//	MB()->load_media_script();


	}

	function get_template_name($instance) {
		return 'base';
	}

    function get_style_name($instance) {
        return '';
    }

}

siteorigin_widget_register('sow-debbutton', __FILE__, maxUtils::namespaceit('Widget_DebButtons_Widget') );
