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
function hello_world_load() {
	// Load localization file
	load_plugin_textdomain( 'hello-world' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'hello_world_fail_load' );
		return;
	}

	// Check required version
	$elementor_version_required = '1.8.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'hello_world_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'hello_world_load' );


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




function hello_world_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor Hello World is not working because you are using an old version of Elementor.', 'hello-world' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'hello-world' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}