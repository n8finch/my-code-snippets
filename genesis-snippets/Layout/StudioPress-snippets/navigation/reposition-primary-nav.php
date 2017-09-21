<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );