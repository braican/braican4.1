<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package braican
 */

if(!function_exists('braican_body_classes')) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function braican_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'braican_body_classes' );
endif;

