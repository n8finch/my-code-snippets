<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the length of post excerpts
add_filter( 'excerpt_length', 'sp_excerpt_length' );
function sp_excerpt_length( $length ) {
	return 50; // pull first 50 words
}