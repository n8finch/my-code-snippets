<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify Home breadcrumb link.
add_filter ( 'genesis_home_crumb', 'sp_breadcrumb_home_link' ); // Genesis >= 1.5
add_filter ( 'genesis_breadcrumb_homelink', 'sp_breadcrumb_home_link' ); // Genesis =< 1.4.1
function sp_breadcrumb_home_link( $crumb ) {
	return preg_replace('/href="[^"]*"/', 'href="http://example.com/home"', $crumb);
}