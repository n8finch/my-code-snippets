<?php
//* Do NOT include the opening php tag shown above. Copy the code shown below.
//* Add a comment policy box in comments
add_action( 'genesis_after_comments', 'sp_comment_policy' );
function sp_comment_policy() {
	if ( is_single() && !is_user_logged_in() && comments_open() ) {
	?>
	<div class="comment-policy-box">
		<p class="comment-policy"><small><strong>Comment Policy:</strong>Your words are your own, so be nice and helpful if you can. Please, only use your real name and limit the amount of links submitted in your comment. We accept clean XHTML in comments, but don't overdo it please.</small></p>
	</div>
	<?php
	}
}