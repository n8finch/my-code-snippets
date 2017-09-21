<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Modify the author says text in comments
add_filter( 'comment_author_says_text', 'sp_comment_author_says_text' );
function sp_comment_author_says_text() {
	return 'author says';
}