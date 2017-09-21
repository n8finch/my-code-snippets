<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the return to top of page text
add_filter( 'genesis_footer_backtotop_text', 'sp_footer_backtotop_text' );
function sp_footer_backtotop_text($backtotop) {
	$backtotop = '[footer_backtotop text="Return to Top"]';
	return $backtotop;
}