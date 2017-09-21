
<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the Genesis content limit read more link
add_filter( 'get_the_content_more_link', 'sp_read_more_link' );
function sp_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">[Continue Reading]</a>';
}