<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize search form label
add_filter( 'genesis_search_form_label', 'sp_search_form_label' );
function sp_search_form_label ( $text ) {
	return esc_attr( 'Custom Label' );
}