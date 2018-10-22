<?php

/**
 * Plugin Name:     Mai Demo Importer
 * Plugin URI:      https://maitheme.com
 * Description:     Easily import Mai Theme demo content and settings.
 * Version:         0.1.0
 *
 * Author:          Mike Hemberger, BizBudding Inc
 * Author URI:      https://bizbudding.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin Folder Path.
if ( ! defined( 'MAI_DEMO_IMPORTER_DIR' ) ) {
	define( 'MAI_DEMO_IMPORTER_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'MAI_DEMO_IMPORTER_URL' ) ) {
	define( 'MAI_DEMO_IMPORTER_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Includes Path.
if ( ! defined( 'MAI_DEMO_IMPORTER_INCLUDES_DIR' ) ) {
	define( 'MAI_DEMO_IMPORTER_INCLUDES_DIR', MAI_DEMO_IMPORTER_DIR . 'includes/' );
}

// Plugin Includes URL.
if ( ! defined( 'MAI_DEMO_IMPORTER_INCLUDES_URL' ) ) {
	define( 'MAI_DEMO_IMPORTER_INCLUDES_URL', MAI_DEMO_IMPORTER_URL . 'includes/' );
}

add_action( 'plugins_loaded', function() {

	if ( ! class_exists( 'Mai_Theme_Engine' ) ) {
		return;
	}

	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'tgmpa/class-tgm-plugin-activation.php';
	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'tgmpa-config.php';
	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin/vendor/autoload.php';
	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin/class-merlin.php';
	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin-config.php';
	require_once MAI_DEMO_IMPORTER_INCLUDES_DIR . 'merlin-filters.php';
});
