<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the comment link text in comments
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {
	return '[post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"]';
}