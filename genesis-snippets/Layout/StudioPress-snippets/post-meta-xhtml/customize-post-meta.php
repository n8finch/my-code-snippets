<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the post meta function
add_filter( 'genesis_post_meta', 'sp_post_meta_filter' );
function sp_post_meta_filter($post_meta) {
if ( !is_page() ) {
	$post_meta = '[post_categories before="Filed Under: "] [post_tags before="Tagged: "]';
	return $post_meta;
}}