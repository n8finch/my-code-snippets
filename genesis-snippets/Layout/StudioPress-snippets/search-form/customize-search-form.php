<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.

//* Customize search form input box text
add_filter( 'genesis_search_text', 'sp_search_text' );
function sp_search_text( $text ) {
	return esc_attr( 'Search my blog...' );
}