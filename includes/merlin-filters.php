<?php

/**
 * Add the demo import files.
 *
 * @return  array  Data for MerlinWP import.
 */
add_filter( 'merlin_import_files', function() {

	$dir = trailingslashit( MAI_DEMO_IMPORTER_DIR );
	$url = trailingslashit( MAI_DEMO_IMPORTER_URL );

	$files = array(
		array(
			'import_file_name'             => 'Mai Business',
			'local_import_file'            => $dir . 'demos/business/business.xml',
			'local_import_widget_file'     => $dir . 'demos/business/business.wie',
			'local_import_customizer_file' => $dir . 'demos/business/business.dat',
			'import_preview_image_url'     => $url . 'demos/business/business.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/business/',
		),
		array(
			'import_file_name'             => 'Mai Law',
			'local_import_file'            => $dir . 'demos/law/law.xml',
			'local_import_widget_file'     => $dir . 'demos/law/law.wie',
			'local_import_customizer_file' => $dir . 'demos/law/law.dat',
			'import_preview_image_url'     => $url . 'demos/law/law.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/law/',
		),
		array(
			'import_file_name'             => 'Mai Lifestyle',
			'local_import_file'            => $dir . 'demos/lifestyle/lifestyle.xml',
			'local_import_widget_file'     => $dir . 'demos/lifestyle/lifestyle.wie',
			'local_import_customizer_file' => $dir . 'demos/lifestyle/lifestyle.dat',
			'import_preview_image_url'     => $url . 'demos/lifestyle/lifestyle.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://maitheme.com/mai-lifestyle-pro/',
		),
		array(
			'import_file_name'             => 'Mai News',
			'local_import_file'            => $dir . 'demos/news/news.xml',
			'local_import_widget_file'     => $dir . 'demos/news/news.wie',
			'local_import_customizer_file' => $dir . 'demos/news/news.dat',
			'import_preview_image_url'     => $url . 'demos/news/news.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-demo-importer' ),
			'preview_url'                  => 'https://demo.maitheme.com/news/',
		),
	);

	if ( defined( 'CHILD_THEME_NAME' ) ) {

		switch ( CHILD_THEME_NAME ) {
			case 'Mai Law Pro':
				$files = array( $files[1] );
			break;
			case 'Mai Lifestyle Pro':
				$files = array( $files[2] );
			break;
			default:
			$files = $files;
		}
	}

	return $files;
});

/**
 * Set the menus.
 *
 * @return  void
 */
add_action( 'merlin_after_all_import', function( $selected_import_index ) {

	$locations = $nav_menu_locations = array();

	// Get menus.
	$locations['header_left']  = maiconfigurations_get_menu_by_slug( 'header-left' );
	$locations['header_right'] = maiconfigurations_get_menu_by_slug( 'header-right' );
	$locations['primary']      = maiconfigurations_get_menu_by_slug( 'primary' );
	$locations['secondary']    = maiconfigurations_get_menu_by_slug( 'footer' );
	$locations['mobile']       = maiconfigurations_get_menu_by_slug( 'mobile' );

	// Loop through our nav menus.
	foreach ( $locations as $location => $menu ) {

		// Skip if no menu.
		if ( ! $menu ) {
			continue;
		}

		// Set as a valid menu.
		$nav_menu_locations[ $location ] = $menu->term_id;
	}

	// Bail if no menus.
	if ( ! $nav_menu_locations ) {
		return;
	}

	// Set the menus.
	set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
});

/**
 * Set the static blog page.
 */
add_action( 'merlin_after_all_import', function( $selected_import_index ) {

	$page_for_posts = get_option( 'page_for_posts' );
	if ( $page_for_posts ) {
		return;
	}

	$blog_page = get_page_by_title( 'Blog' );
	if ( ! $blog_page ) {
		$blog_page = get_page_by_title( 'News' );
	}

	if ( ! $blog_page ) {
		return;
	}

	update_option( 'page_for_posts', $blog_page->ID );
});


function maiconfigurations_get_menu_by_slug( $slug ) {

	if ( $menu = get_term_by( 'slug', $slug, 'nav_menu' ) ) {
		return $menu;
	}

	if ( $menu = get_term_by( 'slug', $slug . '-nav', 'nav_menu' ) ) {
		return $menu;
	}

	if ( $menu = get_term_by( 'slug', $slug . '-menu', 'nav_menu' ) ) {
		return $menu;
	}

	return false;
}

/**
 * Remove the child theme step.
 * This is for a Genesis child theme.
 *
 * @return  $array  The merlin import steps.
 */
add_filter( 'genesis_merlin_steps', function( $steps ) {
	unset( $steps['child'] );
	return $steps;
});
