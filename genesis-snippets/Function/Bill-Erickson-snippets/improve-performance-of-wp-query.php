
<?php
$args = array(
	// Normal query goes here //
	'no_found_rows' => true, // counts posts, remove if pagination required
	'update_post_term_cache' => false, // grabs terms, remove if terms required (category, tag...)
	'update_post_meta_cache' => false, // grabs post meta, remove if post meta required
);
$loop = new WP_Query( $args );