
<?php
/**
 * Modify Post Meta
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/genesis-post-meta
 *
 * @param string original post meta
 * @return string modified post meta
 */
function be_post_meta_filter($post_meta) {
	$post_meta = '[ post_categories ] Tagged with [ post_tags ]';
	return $post_meta;
}
add_filter('genesis_post_meta', 'be_post_meta_filter');