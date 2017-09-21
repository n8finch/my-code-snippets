
<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the speak your mind title in comments
add_filter( 'comment_form_defaults', 'sp_comment_form_defaults' );
function sp_comment_form_defaults( $defaults ) {

	$defaults['title_reply'] = __( 'Leave a Comment' );
	return $defaults;

}