<?php
/**
 * Martin Aerospace theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MARTIN_THEME_VERSION', '1.0.0' );

function martin_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 335,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'martin-aerospace' ),
		'footer'  => __( 'Footer Links', 'martin-aerospace' ),
	) );
}
add_action( 'after_setup_theme', 'martin_theme_setup' );

function martin_enqueue_assets() {
	wp_enqueue_style( 'martin-google-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'martin-style', get_stylesheet_uri(), array(), MARTIN_THEME_VERSION );
	wp_enqueue_script( 'martin-main', get_template_directory_uri() . '/assets/js/main.js', array(), MARTIN_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'martin_enqueue_assets' );

/**
 * Returns the shared content-data.php array.
 */
function martin_content_data() {
	static $data = null;
	if ( null === $data ) {
		$data = require get_template_directory() . '/inc/content-data.php';
	}
	return $data;
}

require get_template_directory() . '/inc/rfq-form-handler.php';

/**
 * Log every outgoing wp_mail() call to debug.log for local verification
 * (no SMTP relay configured yet in local dev — see go-live checklist).
 */
function martin_log_wp_mail( $args ) {
	if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
		error_log( 'RFQ wp_mail fired: to=' . $args['to'] . ' subject=' . $args['subject'] );
	}
	return $args;
}
add_filter( 'wp_mail', 'martin_log_wp_mail' );

/**
 * Simple breadcrumb-free page title helper for inner-page headers.
 */
function martin_page_eyebrow( $text ) {
	echo '<span class="eyebrow">' . esc_html( $text ) . '</span>';
}
