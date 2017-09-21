<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the header URL - XHTML Version
add_filter('genesis_seo_title', 'sp_seo_title', 10, 3);
function sp_seo_title($title, $inside, $wrap) {
	$inside = sprintf( '<a href="http://www.yourdomain.com" title="%s">%s</a>', esc_attr( get_bloginfo('name') ), get_bloginfo('name') );
	$title = sprintf('<%s id="title">%s</%s>', $wrap, $inside, $wrap);
	return $title;
}