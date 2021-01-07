<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ciat_foresight_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ciat_foresight_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ciat_foresight_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ciat_foresight_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ciat_foresight_theme_pingback_header' );

/**
 * This foreach will be in charge of registering the fields of the ACF.
 */
foreach ( glob( dirname( __FILE__ ). '/acf-init/*.php' ) as $filename ) {
	require $filename;
}
