<?php
//* Do NOT include the opening php tag
//* Display author box on archive pages
add_filter( 'get_the_author_genesis_author_box_archive', '__return_true' );