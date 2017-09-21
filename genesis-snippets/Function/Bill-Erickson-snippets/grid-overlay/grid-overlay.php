<?php
/**
 * Grid Overlay
 * @link http://www.billerickson.net/overlay-css-grid
 */
function be_grid_overlay() {
	if( ! isset( $_GET['grid'] ) || 'true' !== $_GET['grid'] )
		return;

	$columns = 16;

	echo '<div class="grid-overlay"><div class="wrap"><div class="gutter"></div>';
	for( $i = 0; $i < $columns; $i++ ) {
		echo '<div class="col"></div><div class="gutter"></div>';
	}
	echo '</div></div>';
}
add_action( 'wp_footer', 'be_grid_overlay' );