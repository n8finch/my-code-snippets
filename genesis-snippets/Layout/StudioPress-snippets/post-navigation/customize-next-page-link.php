<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the next page link
add_filter ( 'genesis_next_link_text' , 'sp_next_page_link' );
function sp_next_page_link ( $text ) {
    return 'Custom Next Page Link &#x000BB;';
}