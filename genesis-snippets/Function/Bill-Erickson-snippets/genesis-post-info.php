<?php
/**
 * Modify Post Info
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/genesis-post-info/
 *
 * @param string original post info
 * @return string modified post info
 */
function be_post_info_filter($post_info) {
	$post_info = '[ post_date ] by [ post_author_posts_link ] at [ post_time ] [ post_comments ] [ post_edit ]';
	return $post_info;
}
add_filter('genesis_post_info', 'be_post_info_filter');