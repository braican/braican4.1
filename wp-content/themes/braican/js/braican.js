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

	var homelink	= window.location.href,    // the initial page load url
		EXTENDED	= false,
		DOCHEIGHT;
	

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

		
		
		$('#project-content').load(link + ' #single-project', function(data, textStatus, req){
			if(textStatus != "error"){
				$('#page').fadeOut();

				$('#project-modal').fadeIn();
				
				$('body').scrollTo(0, 500, {axis: 'y', easing:'swing', margin:true});
				$('#project-content .topborder').addClass('fixed');
			}
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
		
		DOCHEIGHT = $(document).height();

		if(window.location.hash){
			loadpage(window.location.protocol + '//' + window.location.host + '/project' + window.location.hash.substring(1));
			// console.log(window.location.protocol + '//' + window.location.host + '/project' + window.location.hash.substring(1));
		}

		$('body').addClass('initialized');

		// -------------------------------
		// waypoints
		//
		$('#main section').waypoint(function(dir) {
			$('#main .topborder').removeClass('fixed');
			var $t = $(this);
			if(dir == 'up'){
				if($t.parent().hasClass('bg-container')){
					$t.parent().prev().find('.topborder').addClass('fixed');
				} else {
					$t.prev().find('.topborder').addClass('fixed');
				}
			} else {
				
				$t.find('.topborder').addClass('fixed');
			}
		});

		$('#contact').waypoint(function(dir){
			if(dir == 'up'){
				$('#engage').removeClass('popup');
			} else {
				$('#engage').addClass('popup');
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
		// filter the projects by category
		//
		$('.categories a').click(function(event) {
			event.preventDefault();
			
			$('.categories a.active').removeClass('active');
			if($(this).hasClass('showall')){
				$('.project-group > .col').show();
			} else {
				$(this).addClass('active');
				var cat = $(this).attr('data-category');
				
				$('.project-group > .col').hide();
				$('.project-group > .col.' + cat).show();
			}
		});

		// 
		// AJAX the content
		//
		$('.project-group a').on('click', function(event) {
			event.preventDefault();
			var link = $(this).attr('href'),
				src = $(this).attr('data-project');

			loadpage(link);
			addListener();

			history.pushState(null, null, src);
		});

		//
		// close the modal
		//
		$('#project-content').on('click', '#close-modal',function(event) {
			event.preventDefault();
			$('#page').fadeIn(function(){
				history.pushState(null, null, window.location.href.replace(window.location.hash, ''));
				$('#project-content').removeAttr('style').empty();
			});
		});

		//
		// THE AJAXED PROJECT DETAIL
		//
		//
		$('#project-modal').on('click', '.nav li a', function(event){
			event.preventDefault();
			var href = $(this).attr('href');
			$('#page').fadeIn(function(){
				history.pushState(null, null, window.location.href.substring(0, window.location.href.indexOf('#')) + href);
				$('#project-content').removeAttr('style').empty();
				$('body').scrollTo(href, 1000, {axis: 'y', easing:'swing', margin:true});
			});
		});

		
		window.addEventListener("popstate", function(e) {
			var hash = window.location.hash;
		    
		    if(!hash){
		    	$('#project-modal').fadeOut(function(){
		    		$('#page').fadeIn();	
		    	});
		    
		    } else {
		    	loadpage(window.location.protocol + '//' + window.location.host + '/project' + hash.substring(1));
		    }
		});


		// -------------------------------
		// CONTACT
		// -------------------------------
		$('a[title="open-form"]').on('click', function(event){
			event.preventDefault();
			$('body').toggleClass('engage-activated');
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
	$(window).scroll(function(){});

}(window.BRAICAN = window.BRAICAN || {}, jQuery));
