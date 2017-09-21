
<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.

//* Customize search form input button text
add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
function sp_search_button_text( $text ) {
	return esc_attr( 'Go' );
}