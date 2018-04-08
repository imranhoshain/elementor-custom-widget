<?php
/*
Plugin Name: Thenobility Toolkit
Plugin URI: http://wordpress.org/plugins/thenobility/
Description: This is not just a plugin, This plugin for thenobility  theme.
Author: w3codex
Version: 1.0
Author URI: http://w3codex.com/
Text Domain: thenobility
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_THENOBILITY__FILE__', __FILE__ );

/**
 * Load Thenobility Toolkit
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function thenobility_load() {
	// Load localization file
	load_plugin_textdomain( 'thenobility-toolkit' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'thenobility_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'thenobility_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'thenobility_load' );


//Add Elementor Widget Categories
function thenobility_elementor_widget_categories( $elements_manager ) {
    
	$elements_manager->add_category(
		'thenobility',
		[
			'title' => __( 'Thenobility Category', 'thenobility-toolkit' ),
			'icon' => 'fa fa-plug',
		]
	);	

}
add_action( 'elementor/elements/categories_registered', 'thenobility_elementor_widget_categories' );

function thenobility_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor Thenobility Toolkit is not working because you are using an old version of Elementor.', 'thenobility-toolkit' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'thenobility-toolkit' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}



//Plugin Css And JS
function thenobility_toolkit_include_files() {
    wp_enqueue_style('owl-carousel', plugins_url( '/assets/css/owl.carousel.min.css', __FILE__ ) ); 
    wp_enqueue_style('thenobility-toolkit', plugins_url( '/assets/css/thenobility-toolkit.css', __FILE__ ) );
    wp_enqueue_script('owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), array('jquery'), '2.2.1', 'true' );
    
}
add_action( 'wp_enqueue_scripts','thenobility_toolkit_include_files');

// If your string has a custom filter, add its tag name in an applicable add_filter function
add_filter( 'widget_text', 'do_shortcode' ); //For WP old version


/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/find-me-shortcode.php');

/**
 * Implement Find me Addons.
 */
include_once ('shortcodes/rt_heading.php');