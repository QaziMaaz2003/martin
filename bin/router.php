<?php
/**
 * Router for PHP's built-in dev server (php -S) — enables WordPress pretty permalinks.
 * Usage: php -S localhost:8000 -t . bin/router.php
 */
$root = dirname( __DIR__ );
$path = urldecode( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) );
$file = $root . $path;

if ( $path !== '/' && file_exists( $file ) && ! is_dir( $file ) ) {
	return false; // Serve real files (css/js/images) as-is.
}

chdir( $root );
require_once $root . '/index.php';
