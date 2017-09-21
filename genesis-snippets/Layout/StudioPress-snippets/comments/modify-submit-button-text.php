<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Customize the submit button text in comments
add_filter( 'comment_form_defaults', 'sp_comment_submit_button' );
function sp_comment_submit_button( $defaults ) {

        $defaults['label_submit'] = __( 'Submit', 'custom' );
        return $defaults;

}