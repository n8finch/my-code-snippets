var doPopUp = function( divID ) {

	//* First, append the overlay to the body, so that it goes over everything
	$('body').append('<div class="popup-overlay"><!-- Nothing to see here, move along... --></div>');

	//* Find the popup and cache it.
	var thePopup = $(divID);

	var winHeight = window.innerHeight;
	var winWidth = window.innerWidth;
	var scrollY = window.scrollY;
	var popupHeight = 640; //or whatever you want the min-height to be
	var popupWidth = winWidth*.9;
	var centeredHeight = winHeight/2 - popupHeight/2;
	var centeredWidth = winWidth/2 - popupWidth/2;

	if( winWidth > 1000 ) {
		centeredWidth = winWidth/2 - 450  ;
	}

	if( winHeight < popupHeight ) {
		centeredHeight = 0;
	}

	//* Remove the popup from wherever it was added and append it to the body so it can be full width
	//* This allows us to keep our popup next to whatever object triggers it, but
	$(thePopup).remove();
	$('body').append(thePopup);

	$('.ui-widget-overlay').show();
	$(divID).show().css({
		'z-index': '1001',
		'width': popupWidth,
		'max-width': '900px',
		'height': 'auto',
		'position': 'absolute',
		'top': scrollY + centeredHeight,
		'left': centeredWidth
	}).append('<span class="popup-close-button">X</span>');

	$('.popup-close-button').on('click', function(e) {
		hidePopUp(divID);
	});

	document.onkeydown = function(e) {
		if( 27 === e.keyCode ) {
			hidePopUp(divID);
		}
	}

}

var hidePopUp = function( divID ) {
	$(divID).hide();
	$('#popup-overlay').remove();
}

// PopUps

$( function() {
	$( "popup-trigger" ).on( 'click', function(e) {
		//* Get the popup content ID, replace any spaces, make sure it's lowercased, prepend a # for the ID
		var divID = '#' + e.target.dataset['popupId'].replace(' ', '-').toLowerCase();

		doPopUp(divID);
	});
});
