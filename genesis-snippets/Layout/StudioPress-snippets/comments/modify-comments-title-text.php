<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify comments title text in comments
add_filter( 'genesis_title_comments', 'sp_genesis_title_comments' );
function sp_genesis_title_comments() {
	$title = '<h3>Discussion</h3>';
	return $title;
}