<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the previous page link
add_filter ( 'genesis_prev_link_text' , 'sp_previous_page_link' );
function sp_previous_page_link ( $text ) {
    return '&#x000AB; Custom Previous Page Link';
}