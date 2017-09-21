<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Add custom body class to the head
add_filter( 'body_class', 'sp_body_class' );
function sp_body_class( $classes ) {

	if ( is_category( 'sample-category' ) )
		$classes[] = 'custom-class';
		return $classes;

}