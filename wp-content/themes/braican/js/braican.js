// ---------------------------------
// braican.js
//

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

	var homelink	= window.location.href	// the initial page load url
	



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

	//
	// loadpage
	//
	// loads the page
	function loadpage(link){
		$('#project-content').load(link, function(){
			$('#project-modal').fadeIn();
			
			$('body').scrollTo(0, 500, {axis: 'y', easing:'swing', margin:true});
		});	
	}

	function addListener(){
		window.addEventListener("popstate", function(e) {
			loadpage(location.pathname);
		});
	}

	// -----------------------------------------
	// PUBLIC
	//
	// Methods
	//

	// initialize the things
	BRAICAN.init = function(){
		
		$('body').addClass('initialized');

		// -------------------------------
		// waypoints
		//
		$('section').waypoint(function(dir) {
			$('.topborder').removeClass('fixed');
			if(dir == 'up'){
				$(this).prev().find('.topborder').addClass('fixed');
			} else {
				$(this).find('.topborder').addClass('fixed');	
			}
		});

		// -------------------------------
		//
		// slide to nav
		//
		$('a[href*=#]').on('click', function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			if(id.length > 1)
				$('body').scrollTo(id, 1000, {axis: 'y', easing:'swing', margin:true});
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
		// the projects section
		// --------------------------------
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
		// filter the projects by category
		//
		$('.categories a').click(function(event) {
			event.preventDefault();
			if($(this).hasClass('showall')){
				$('.categories a').removeClass('active');
				$('.project-group > .col').show();
			} else {
				$(this).toggleClass('active');
				$('.project-group > .col').hide();
				$('.categories a.active').each(function(index, el) {
					var cat = $(el).attr('data-category');
					$('.project-group > .col.' + cat).show();
				});	
			}
		});

		// 
		// AJAX the content
		//
		$('.project-group a').on('click', function(event) {
			event.preventDefault();
			var link = $(this).attr('href');

			$('#page').fadeOut();

			loadpage(link);
			addListener();
			history.pushState(null, null, link);
		});

		//
		// close the modal
		//
		$('#close-modal').on('click', function(event) {
			event.preventDefault();
			$('#page').fadeIn(function(){
				history.pushState(null, null, homelink);
				$('#project-content').removeAttr('style').empty();
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
		BRAICAN.debug();
	});

	// when the window loads
	$(window).load(function(){});

	// when the window scrolls
	$(window).scroll(function(){

	});

}(window.BRAICAN = window.BRAICAN || {}, jQuery));
