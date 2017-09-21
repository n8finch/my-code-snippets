<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Display a custom Gravatar
add_filter( 'avatar_defaults', 'sp_gravatar' );
function sp_gravatar ($avatar) {
	$custom_avatar = get_stylesheet_directory_uri() . '/images/gravatar.png';
	$avatar[$custom_avatar] = "Custom Gravatar";
	return $avatar;
}