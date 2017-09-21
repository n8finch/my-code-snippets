<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.

//* Modify trackbacks title in comments
add_filter( 'genesis_title_pings', 'sp_title_pings' );
function sp_title_pings() {
echo '<h3>Trackbacks</h3>';
}