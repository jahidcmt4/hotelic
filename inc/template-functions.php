<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package hotelic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hotelic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'hotelic-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}
	$theme = wp_get_theme(); // gets the current theme
	if ( 'hotelic' == $theme->name || 'hotelic' == $theme->parent_theme ) {
		$classes[] = 'hotelic-body-class';
	}

	return $classes;
}
add_filter( 'body_class', 'hotelic_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hotelic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hotelic_pingback_header' );