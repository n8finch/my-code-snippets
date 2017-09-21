<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the header URL - HTML5 Version
add_filter( 'genesis_seo_title', 'child_header_title', 10, 3 );
function child_header_title( $title, $inside, $wrap ) {
    $inside = sprintf( '<a href="http://example.com/" title="%s">%s</a>', esc_attr( get_bloginfo( 'name' ) ), get_bloginfo( 'name' ) );
    return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, $inside );
}