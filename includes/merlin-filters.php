<?php


add_filter( 'merlin_import_files', function() {

	$files = array(
		array(
			'import_file_name'             => 'Mai Business',
			'local_import_file'            => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/business/business.xml',
			'local_import_widget_file'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/business/business.wie',
			'local_import_customizer_file' => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/business/business.dat',
			'import_preview_image_url'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_URL ) . 'demos/business/business.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-configurations' ),
			'preview_url'                  => 'https://demo.maitheme.com/business/',
		),
		array(
			'import_file_name'             => 'Mai Law',
			'local_import_file'            => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/law/law.xml',
			'local_import_widget_file'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/law/law.wie',
			'local_import_customizer_file' => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/law/law.dat',
			'import_preview_image_url'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_URL ) . 'demos/law/law.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-configurations' ),
			'preview_url'                  => 'https://demo.maitheme.com/law/',
		),
		array(
			'import_file_name'             => 'Mai Lifestyle',
			'local_import_file'            => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/lifestyle/lifestyle.xml',
			'local_import_widget_file'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/lifestyle/lifestyle.wie',
			'local_import_customizer_file' => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/lifestyle/lifestyle.dat',
			'import_preview_image_url'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_URL ) . 'demos/lifestyle/lifestyle.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-configurations' ),
			'preview_url'                  => 'https://maitheme.com/mai-lifestyle-pro/',
		),
		array(
			'import_file_name'             => 'Mai News',
			'local_import_file'            => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/news/news.xml',
			'local_import_widget_file'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/news/news.wie',
			'local_import_customizer_file' => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_DIR ) . 'demos/news/news.dat',
			'import_preview_image_url'     => trailingslashit( MAI_CONFIGURATIONS_INCLUDES_URL ) . 'demos/news/news.png',
			'import_notice'                => __( 'A special note for this import.', 'mai-configurations' ),
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
 * Set the static front page and blog..
 */
add_action( 'merlin_after_all_import', function( $selected_import_index ) {

	return;

	/**
	 * Assign front page and posts page (blog page).
	 * This is needed when people may import options/settings only, not content.
	 */
	$front_page = get_page_by_title( 'Home' );
	$blog_page  = get_page_by_title( 'Blog' );

	// Bail if no pages.
	if ( ! ( $front_page || $blog_page ) ) {
		return;
	}

	update_option( 'show_on_front', 'page' );

	if ( $front_page ) {
		update_option( 'page_on_front', $front_page->ID );

		// $submission   = trim( $_POST['mai_sections_json_import'] );
		// $section_data = json_decode( stripslashes( $submission ), true );
		// if ( ! $section_data ) {
		// 	return;
		// }

		// // Update.
		// mai_update_sections_template( $section_data, $object_id, $import_images );
	}

	if ( $blog_page ) {
		update_option( 'page_for_posts', $blog_page->ID );
	}
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
