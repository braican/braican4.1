// ---------------------------------
// braican.js
//

var projectsHeight;

(function(BRAICAN, $, undefined){

	// -----------------------------------------
	// PUBLIC
	//
	// Properties
	//
	BRAICAN.property = '';


	// -----------------------------------------
	// PRIVATE
	//
	// Properties
	//

	var homeTop,			// the distance from the top of the home section
		workTop,			// the distance from the top of the Work section
		aboutTop,			// the distance from the top of the about section
		contactTop;			// the distance from the top of the contact section
	



	// -----------------------------------------
	// PRIVATE
	//
	// Methods
	//

	//
	// getUrlParam
	//
	// Utility function to snag a query string value when passed the parameter
	//
	function getUrlParam(name) {
		var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (!results) {
			return 0;
		}
		return results[1] || 0;
	}

	// -----------------------------------------
	// PUBLIC
	//
	// Methods
	//

	// set the global variables
	BRAICAN.variables = function(){

		homeTop = $('#home').offset().top,
		workTop = $('#work').offset().top,
		aboutTop = $('#about').offset().top,
		contactTop = $('#contact').offset().top;
		
	};

	// initialize the things
	BRAICAN.init = function(){
		
		$('body').addClass('initialized');
		

		// -------------------------------
		//
		// slide to nav
		//
		$('a[href*=#]').on('click', function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			var offset = $(id).offset().top + 1;

			$('html, body').animate({scrollTop: offset}, 1000);
		});

		// -------------------------------
		//
		// expanding navigation items
		//
		$('.nav.collapsed').hover(function(){
			$(this).find('li').addClass('expanded');
		}, function(){
			$(this).find('li').removeClass('expanded');
		});

		// --------------------------------
		//
		// the projects section
		//


		// 
		// get the height of the underlay for each project
		//
		$('.project-thumb').hover(function(){
			var h = $(this).find('.underlay').height() + 20;
			$(this).find('img').animate({'top': h + 'px'}, 200);
		}, function(){
			$(this).find('img').animate({'top':'0'}, 100);
		});

		// 
		// AJAX the content
		//

		$('.project-group a').on('click', function(event) {
			event.preventDefault();
			var link = $(this).attr('href');
			$(this).addClass('active');

			$('#projects').height(projectsHeight);
			$('.project-group').fadeOut(function(){
				$('.loader').fadeIn();
				$('.project-list').animate({
					'left':'0px'
				});

				$('.project-area').hide().load(link, function(response, status, xhr){
					$(this).fadeIn();
					$('.loader').fadeOut();
				});
			});
		});

		$('.project-list a').on('click', function(event) {
			event.preventDefault();
			var link = $(this).attr('href');
			$('.project-area').fadeOut(function(){
				$('.loader').fadeIn();
				$(this).load(link, function(response, status, xhr){
					$(this).fadeIn();
					$('.loader').fadeOut();
				});
			});
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
	}

	// debug a whole buncha stuff. console logs and the like
	BRAICAN.debug = function(){
	};

	// DOM is ready
	$(document).ready( function() {
		BRAICAN.init();
		BRAICAN.variables();
		BRAICAN.debug();
	});

	// when the window loads
	$(window).load(function(){});

	// when the window scrolls
	$(window).scroll(function(){
		var fromTop = $(window).scrollTop();
		var parallaxSpeed = .2;

		$('.parallax-it').css({
			'top': fromTop * parallaxSpeed + 'px',
			'opacity': Math.abs((1 + 400) / (fromTop + 400))
		});

		if(fromTop > homeTop + 60 && fromTop < workTop){
			$('.topborder').removeClass('fixed');
			$('#home .topborder').addClass('fixed');
		} else if(fromTop > workTop && fromTop < aboutTop){
			$('.topborder').removeClass('fixed');
			$('#work .topborder').addClass('fixed');
		} else if(fromTop > aboutTop && fromTop < contactTop){
			$('.topborder').removeClass('fixed');
			$('#about .topborder').addClass('fixed');
		} else if(fromTop > contactTop){
			$('.topborder').removeClass('fixed');
			$('#contact .topborder').addClass('fixed');
		} else {
			$('.topborder').removeClass('fixed');
		}
	});

}(window.BRAICAN = window.BRAICAN || {}, jQuery));
