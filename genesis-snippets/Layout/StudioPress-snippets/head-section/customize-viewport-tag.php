<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Add custom Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sp_viewport_meta_tag' );
function sp_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}