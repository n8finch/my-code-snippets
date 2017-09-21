<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the entry meta in the entry footer (requires HTML5 theme support)
add_filter( 'genesis_post_meta', 'sp_post_meta_filter' );
function sp_post_meta_filter($post_meta) {
	$post_meta = '[post_categories] [post_tags]';
	return $post_meta;
}