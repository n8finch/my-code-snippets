<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the size of the Gravatar in comments
add_filter( 'genesis_comment_list_args', 'sp_comments_gravatar' );
function sp_comments_gravatar( $args ) {
	$args['avatar_size'] = 96;
	return $args;
}