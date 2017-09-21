<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Display a custom favicon
add_filter( 'genesis_pre_load_favicon', 'sp_favicon_filter' );
function sp_favicon_filter( $favicon_url ) {
	return 'http://www.mydomain.com/wp-content/themes/genesis/images/favicon.ico';
}