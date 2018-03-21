// Add CSS to transparent nav
(function() {

	var hasTransNav = $('header').hasClass('transparent-nav');

	var doTransNav = function( object ) {

		if( !hasTransNav ) {

			return;

		} else if(hasTransNav && object.scrollY > 0) {

			var alpha = object.scrollY * .001;
			var rgba = `rgba(50, 64, 69, ${alpha})`;

			$('#large-menu').css({'background': rgba });

		} else {
			$('#large-menu').css({'background': 'transparent' });
		}
	}

		$(window).on("scroll", function(e) {
		doTransNav(this);
		});

	//on iPads
		$('body').bind("touchmove", function(e) {
		doTransNav(this);
		});


	// window.addEventListener("orientationchange", function() {
	// //add orientationchange logic
	// }, false);


	// Hot switch logo on iPads
	if( navigator.userAgent.match(/iPad/gi) && (window.innerWidth > 800) && !hasTransNav ) {

		$('#logo-container img').attr('src', '/wp-content/themes/serendipity/dist/assets/img/sc-logo-gray-orange-i.svg')
	}

})();
