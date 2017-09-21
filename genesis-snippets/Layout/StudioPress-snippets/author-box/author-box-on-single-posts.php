
<?php
//* Do NOT include the opening php tag
//* Display author box on single posts
add_filter( 'get_the_author_genesis_author_box_single', '__return_true' );