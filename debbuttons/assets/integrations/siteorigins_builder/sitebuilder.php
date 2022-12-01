<?php
namespace DebButtons;
defined('ABSPATH') or die('No direct access permitted');
// Add a debbutton widget to the pagebuilder

function debbuttons_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('DebButtons', 'debbuttons'),
        'filter' => array(
            'groups' => array('debbuttons')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', maxUtils::namespaceit('debbuttons_add_widget_tabs'), 20);

function debbuttons_add_widgets($folders)
{
	$folders[] = plugin_dir_path(__FILE__). 'widgets/';

	return $folders;
}
add_filter('siteorigin_widgets_widget_folders', maxUtils::namespaceit('debbuttons_add_widgets'), 20);



function debbuttons_fields_class_paths( $class_paths ) {

    $class_paths[] = plugin_dir_path( __FILE__ ) . "fields/";
    return $class_paths;
}
add_filter( 'siteorigin_widgets_field_class_paths', maxUtils::namespaceit('debbuttons_fields_class_paths'), 20 );

function debbuttons_class_prefixes( $class_prefixes ) {
    $class_prefixes[] = maxUtils::namespaceit('DebButton_Widget_Field_');
    return $class_prefixes;
}
add_filter( 'siteorigin_widgets_field_class_prefixes', maxUtils::namespaceit('debbuttons_class_prefixes'), 20 );
