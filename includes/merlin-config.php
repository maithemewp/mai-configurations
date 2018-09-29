<?php

/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'base_path'            => trailingslashit( MY_PLUGIN_INCLUDES_DIR ),
		'base_url'             => trailingslashit( MY_PLUGIN_INCLUDES_URL ),
		'directory'            => 'merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin',  // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => true, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'mai-configurations' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'mai-configurations' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'mai-configurations' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'mai-configurations' ),

		'btn-skip'                 => esc_html__( 'Skip', 'mai-configurations' ),
		'btn-next'                 => esc_html__( 'Next', 'mai-configurations' ),
		'btn-start'                => esc_html__( 'Start', 'mai-configurations' ),
		'btn-no'                   => esc_html__( 'Cancel', 'mai-configurations' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'mai-configurations' ),
		'btn-child-install'        => esc_html__( 'Install', 'mai-configurations' ),
		'btn-content-install'      => esc_html__( 'Install', 'mai-configurations' ),
		'btn-import'               => esc_html__( 'Import', 'mai-configurations' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'mai-configurations' ),
		'btn-license-skip'         => esc_html__( 'Later', 'mai-configurations' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'mai-configurations' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'mai-configurations' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'mai-configurations' ),
		'license-label'            => esc_html__( 'License key', 'mai-configurations' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'mai-configurations' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'mai-configurations' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'mai-configurations' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'mai-configurations' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'mai-configurations' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'mai-configurations' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'mai-configurations' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'mai-configurations' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'mai-configurations' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'mai-configurations' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'mai-configurations' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'mai-configurations' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'mai-configurations' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'mai-configurations' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'mai-configurations' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'mai-configurations' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'mai-configurations' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'mai-configurations' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'mai-configurations' ),

		'import-header'            => esc_html__( 'Import Content', 'mai-configurations' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'mai-configurations' ),
		'import-action-link'       => esc_html__( 'Advanced', 'mai-configurations' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', 'mai-configurations' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'mai-configurations' ),
		'ready-action-link'        => esc_html__( 'Extras', 'mai-configurations' ),
		'ready-big-button'         => esc_html__( 'View your website', 'mai-configurations' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', 'mai-configurations' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://themebeans.com/contact/', esc_html__( 'Get Theme Support', 'mai-configurations' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'mai-configurations' ) ),
	)
);
