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
if ( ! defined( 'MAI_CONFIGURATIONS_DIR' ) ) {
	define( 'MAI_CONFIGURATIONS_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Includes Path.
if ( ! defined( 'MAI_CONFIGURATIONS_INCLUDES_DIR' ) ) {
	define( 'MAI_CONFIGURATIONS_INCLUDES_DIR', MAI_CONFIGURATIONS_DIR . 'includes/' );
}

// Plugin Folder URL.
if ( ! defined( 'MAI_CONFIGURATIONS_PLUGIN_URL' ) ) {
	define( 'MAI_CONFIGURATIONS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'MAI_CONFIGURATIONS_INCLUDES_URL' ) ) {
	define( 'MAI_CONFIGURATIONS_INCLUDES_URL', MAI_CONFIGURATIONS_PLUGIN_URL . 'includes/' );
}

add_action( 'plugins_loaded', function() {

	if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
		return;
	}

	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'tgmpa/class-tgm-plugin-activation.php';
	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'tgmpa-config.php';
	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'merlin/vendor/autoload.php';
	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'merlin/class-merlin.php';
	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'merlin-config.php';
	require_once MAI_CONFIGURATIONS_INCLUDES_DIR . 'merlin-filters.php';
});
