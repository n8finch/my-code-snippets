function() {

	var inputsEnabled = $( 'body' ).data( 'inputs' );

	$('input[type=checkbox]').click( function(e) {
		console.log(e.target.checked);
		$('input[type=checkbox]').each( function(e) {
			if( true === this.checked) {
				$(this).siblings('strong').addClass('ticked');
			} else {
				$(this).siblings('strong').removeClass('ticked');
				$('#select-all-messages').removeClass('ticked');
			}
		});
	});


	//Probably don't need all of the below, but will need to test out.

	if ( !inputsEnabled ) {
	    //only few buddypress and bbpress related fields
	    $( '.events input[type="checkbox"], #buddypress table.notifications input, #send_message_form input[type="checkbox"], #profile-edit-form input[type="checkbox"],  #profile-edit-form input[type="radio"], #message-threads input, #settings-form input[type="radio"], #create-group-form input[type="radio"], #create-group-form input[type="checkbox"], #invite-list input[type="checkbox"], #group-settings-form input[type="radio"], #group-settings-form input[type="checkbox"], #new-post input[type="checkbox"], .bbp-form input[type="checkbox"], .bbp-form .input[type="radio"], .register-section .input[type="radio"], .register-section input[type="checkbox"], .message-check, #select-all-messages' ).each( function () {
	        var $this = $( this );
	        $this.addClass( 'styled' );
	        if ( $this.next( "label" ).length == 0 && $this.next( "strong" ).length == 0 ) {
	            $this.after( '<strong></strong>' );
	        }
	    } );
	} else {
	    //all fields
	    $( 'input[type="checkbox"], input[type="radio"]' ).each( function () {
	        var $this = $( this );
	        if ( $this.val() == 'gf_other_choice' ) {
	            $this.addClass( 'styled' );
	            $this.next().wrap( '<strong class="other-option"></strong>' );
	        } else {
	            if ( !$this.parents( '#bp-group-documents-form' ).length ) {
	                $this.addClass( 'styled' );
	                if ( $this.next( "label" ).length == 0 && $this.next( "strong" ).length == 0 ) {
	                    $this.after( '<strong></strong>' );
	                }
	            }
	        }
	    } );
	}

}
