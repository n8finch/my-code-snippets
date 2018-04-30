<?php

//1.First, localize the admin_ajax url
function n8finch_add_localized_script() {
	//Attach to jQuery script, or other handle
	wp_localize_script( 'jquery', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'n8finch_add_localized_script' );


//2. Add ajax via jQuery or XMLHttp
?>
<script type="text/javascript">
	jQuery('some-target').on('click', function( e ) {
		//prevent page reload and set up the vars
		e.preventDefault();
		var ajaxurl = ajax_object.ajax_url;
		var somethingFromTarget = e.target.dataset.thatSomething;
		var data = {
			'action': 'this_ajax_hook',
			'data_thing': somethingFromTarget,
		};

		console.log('Trying to do ajax request...');
		// run the ajax request
		jQuery.post(ajaxurl, data, function(response) {
			if( response ) {
				console.log('The request was a massive success!!!');
			} else {
				console.log('Something went terribly wrong...');
			}
		});
	});
</script>

<?php

//3.Add in the handler
add_action( 'wp_ajax_this_ajax_hook', 'do_some_ajax_action' );

function do_some_ajax_action() {
    // Handle request then generate response using WP_Ajax_Response
	$response = $_POST['data_thing'];

	echo 'The thing you sent over was: ' . $response;
    // Don't forget to stop execution afterward.
    wp_die();
}
