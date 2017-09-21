<?php
/**
 * Two column tablet classes
 *
 */
function be_two_column_tablet( $classes ) {
	// First, we make sure we're in the grid loop.
	if( ! apply_filters( 'is_genesis_grid_loop', false ) )
  		return $classes;
	// Add this to all posts
	$classes[] = 'tablet-one-half';

	// Every other post gets this
	global $wp_query;
	if( 0 == $wp_query->current_post % 2 )
		$classes[] = 'tablet-first';

	return $classes;
}
add_filter( 'post_class', 'be_two_column_tablet' );