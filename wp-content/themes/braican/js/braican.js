// ---------------------------------
// braican.js
//

jQuery(document).ready( function($) {

	// -------------------------------
	// freetile
	//
	$('#freetile').freetile();

	// -------------------------------
	// get the height of the underlay for each project
	//
	$('.project-thumb').hover(function(){
		var h = $(this).find('.underlay').height() + 20;
		$(this).find('img').animate({'top': h + 'px'}, 200);
	}, function(){
		$(this).find('img').animate({'top':'0'}, 100);
	});

	// ---------------------------------
	// AJAX the content
	//
	// $('#projects a').on('click', function(e){
	// 	e.preventDefault();
	// 	var link = $(this).attr('href'),
	// 		project_top = $('#projects').offset().top;

	// 	console.log("project clicked");

	// 	$('html, body').animate({scrollTop: project_top}, 1000);
	// 	$('#slideout').load(link, function(response, status, xhr){
			
	// 		//alert('load was performed');
	// 	});
	// });

	$('#projects a').on('click', function(event) {
		event.preventDefault();
		console.log("clicked");
		$('.project-group').animate({
			'width' : '180px'
		}, 1000);
	});

	// -------------------------------
	// slide to nav
	//
	$('a[href*=#]').on('click', function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		var offset = $(id).offset().top - 28;

		$('html, body').animate({scrollTop: offset}, 1000);
	});

	// -------------------------------
	// slide the header when passed certain points
	//
	var home_y = $('#home').offset().top,
		project_y = $('#projects').offset().top,
		about_y = $('#about').offset().top,
		contact_y = $('#contact').offset().top,
		threshold = 50;

	$(window).scroll(function() {

	});


	// ---------------------------------
	// skip link focus
	//
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
});
