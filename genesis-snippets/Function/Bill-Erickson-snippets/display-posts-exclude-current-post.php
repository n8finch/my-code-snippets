<?php
/**
 * Display Posts - Exclude Current Post
 *
 * @author Bill Erickson
 * @link http://wordpress.org/extend/plugins/display-posts-shortcode/
 *
 * @param array $args
 * @return array
 */
function be_exclude_current_post( $args ) {
	if( is_singular() && !isset( $args['post__in'] ) )
		$args['post__not_in'] = array( get_the_ID() );
	return $args;
}
add_filter( 'display_posts_shortcode_args', 'be_exclude_current_post' );