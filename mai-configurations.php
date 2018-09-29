<?php

/**
 * Plugin Name:     Mai Configurations
 * Plugin URI:      https://maitheme.com
 * Description:     Easily install demo and preset configurations of Mai Theme
 * Version:         0.1.0
 *
 * Author:          Mike Hemberger, BizBudding Inc
 * Author URI:      https://bizbudding.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin Folder Path.
if ( ! defined( 'MY_PLUGIN_DIR' ) ) {
	define( 'MY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Includes Path.
if ( ! defined( 'MY_PLUGIN_INCLUDES_DIR' ) ) {
	define( 'MY_PLUGIN_INCLUDES_DIR', MY_PLUGIN_DIR . 'includes/' );
}

// Plugin Folder URL.
if ( ! defined( 'MY_PLUGIN_PLUGIN_URL' ) ) {
	define( 'MY_PLUGIN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'MY_PLUGIN_INCLUDES_URL' ) ) {
	define( 'MY_PLUGIN_INCLUDES_URL', MY_PLUGIN_PLUGIN_URL . 'includes/' );
}

add_action( 'plugins_loaded', function() {

	if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
		return;
	}

	require_once dirname( __FILE__ ) . '/includes/merlin/vendor/autoload.php';
	require_once dirname( __FILE__ ) . '/includes/merlin/class-merlin.php';
	require_once dirname( __FILE__ ) . '/includes/merlin-config.php';
	require_once dirname( __FILE__ ) . '/includes/merlin-filters.php';
});
