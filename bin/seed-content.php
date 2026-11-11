<?php
/**
 * Idempotent content seed script for the Martin Aerospace theme.
 * Run via: tools\php\php.exe tools\wp-cli.phar eval-file bin\seed-content.php --path=.
 * Safe to re-run (checks for existing pages/menus by slug/name before creating).
 */

if ( ! defined( 'WP_CLI' ) ) {
	echo "This script must be run via WP-CLI eval-file.\n";
	return;
}

$data_file = get_template_directory() . '/inc/content-data.php';
$data      = require $data_file;
$contact   = $data['contact'];

/**
 * Creates (or updates) a page by slug, returns its ID.
 */
function martin_seed_page( $slug, $title, $content ) {
	$existing = get_page_by_path( $slug );
	$postarr  = array(
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_content' => $content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
	);

	if ( $existing ) {
		$postarr['ID'] = $existing->ID;
		wp_update_post( $postarr );
		WP_CLI::log( "Updated page: {$title} ({$slug})" );
		return $existing->ID;
	}

	$id = wp_insert_post( $postarr );
	WP_CLI::log( "Created page: {$title} ({$slug})" );
	return $id;
}

// ---- Pages ----
// Home page content is rendered entirely by front-page.php from content-data.php,
// so its post_content is intentionally left empty — it's a placeholder for routing only.
$home_id      = martin_seed_page( 'home', 'Home', '' );
$off_shelf_id = martin_seed_page( 'off-the-shelf', 'Off the Shelf', '' );
$about_id     = martin_seed_page( 'about-us', 'About Us', '' );
$quality_id   = martin_seed_page( 'quality', 'Quality', '' );
$engineering_id = martin_seed_page( 'engineering', 'Engineering', '' );
$careers_id   = martin_seed_page( 'careers', 'Careers', '' );
$fittings_id  = martin_seed_page( 'fittings', 'Fittings', '' );
$chemicals_id = martin_seed_page( 'chemicals', 'Chemicals', '' );
$fasteners_id = martin_seed_page( 'fasteners-hardware', 'Fasteners & Hardware', '' );
$rfq_id       = martin_seed_page( 'request-a-quote', 'Request a Quote', '' );

// ---- Static front page ----
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_id );
WP_CLI::log( 'Set static front page to Home.' );

// ---- Site title / tagline ----
update_option( 'blogname', $contact['company'] );
update_option( 'blogdescription', 'Aerospace Fittings, Chemicals & Fasteners' );

// ---- Primary menu ----
$menu_name = 'Primary Menu';
$menu      = wp_get_nav_menu_object( $menu_name );
if ( ! $menu ) {
	$menu_id = wp_create_nav_menu( $menu_name );
	WP_CLI::log( "Created menu: {$menu_name}" );
} else {
	$menu_id = $menu->term_id;
	// Clear existing items so re-running doesn't duplicate.
	$existing_items = wp_get_nav_menu_items( $menu_id );
	if ( $existing_items ) {
		foreach ( $existing_items as $item ) {
			wp_delete_post( $item->ID, true );
		}
	}
	WP_CLI::log( "Reusing menu: {$menu_name} (cleared existing items)" );
}

function martin_add_menu_item( $menu_id, $title, $object_id = 0, $url = '', $parent = 0 ) {
	$args = array(
		'menu-item-title'  => $title,
		'menu-item-status' => 'publish',
		'menu-item-parent-id' => $parent,
	);
	if ( $object_id ) {
		$args['menu-item-object-id'] = $object_id;
		$args['menu-item-object']    = 'page';
		$args['menu-item-type']      = 'post_type';
	} else {
		$args['menu-item-url']  = $url;
		$args['menu-item-type'] = 'custom';
	}
	return wp_update_nav_menu_item( $menu_id, 0, $args );
}

martin_add_menu_item( $menu_id, 'Home', $home_id );
martin_add_menu_item( $menu_id, 'Off the Shelf', $off_shelf_id );
martin_add_menu_item( $menu_id, 'About Us', $about_id );
martin_add_menu_item( $menu_id, 'Quality', $quality_id );
martin_add_menu_item( $menu_id, 'Engineering', $engineering_id );
martin_add_menu_item( $menu_id, 'Careers', $careers_id );

$products_parent = martin_add_menu_item( $menu_id, 'Products', 0, '#' );
martin_add_menu_item( $menu_id, 'Fittings', $fittings_id, '', $products_parent );
martin_add_menu_item( $menu_id, 'Chemicals', $chemicals_id, '', $products_parent );
martin_add_menu_item( $menu_id, 'Fasteners & Hardware', $fasteners_id, '', $products_parent );

martin_add_menu_item( $menu_id, 'Request a Quote', $rfq_id );

$locations = get_theme_mod( 'nav_menu_locations', array() );
$locations['primary'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );

WP_CLI::log( 'Primary menu built and assigned.' );

// ---- Footer menu ----
$footer_menu_name = 'Footer Menu';
$footer_menu      = wp_get_nav_menu_object( $footer_menu_name );
if ( ! $footer_menu ) {
	$footer_menu_id = wp_create_nav_menu( $footer_menu_name );
} else {
	$footer_menu_id = $footer_menu->term_id;
	$existing_items = wp_get_nav_menu_items( $footer_menu_id );
	if ( $existing_items ) {
		foreach ( $existing_items as $item ) {
			wp_delete_post( $item->ID, true );
		}
	}
}

martin_add_menu_item( $footer_menu_id, 'About Us', $about_id );
martin_add_menu_item( $footer_menu_id, 'Quality', $quality_id );
martin_add_menu_item( $footer_menu_id, 'Engineering', $engineering_id );
martin_add_menu_item( $footer_menu_id, 'Careers', $careers_id );
martin_add_menu_item( $footer_menu_id, 'Request a Quote', $rfq_id );

$locations['footer'] = $footer_menu_id;
set_theme_mod( 'nav_menu_locations', $locations );

WP_CLI::log( 'Footer menu built and assigned.' );

WP_CLI::success( 'Content seeding complete.' );
