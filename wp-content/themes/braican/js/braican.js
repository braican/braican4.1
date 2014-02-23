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

    var LOAD_PREFIX = window.location.protocol + '//' + window.location.host + '/project/',
        FADESPEED = 600,
        SCROLLSPEED = 800,
        INCLUDEMARGIN = false;
    

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
    // backToHome
    //
    // @param href = where should the page navigate to after reloading the homepage
    // 
    // re-show the homepage and remove content from the project modal
    //
    function backToHome(href){
        console.log("back to home");
        
        $('#page').css({
            'min-height': window.innerHeight + 'px'
        });

        $('#main').css({
            'position': 'absolute',
            'zIndex': 1000
        }).fadeIn(FADESPEED, function(){
            $('body').removeClass('project-view');
            window.location.hash = '';
            // history.pushState(null, null, window.location.href.replace(window.location.hash, ''));
            $('#project-modal').removeAttr('style').find('#load-project').empty();
            $('#main, #page').removeAttr('style');

            if(href)
                $('body').scrollTo(href, SCROLLSPEED, {axis: 'y', easing:'swing', margin:INCLUDEMARGIN});
        });
    }

    // -----------------------------------------
    // PUBLIC
    //
    // Methods
    //

    //
    // loader
    //
    // load the project
    //
    BRAICAN.loader = function(hash){

        var loadUrl = LOAD_PREFIX + hash.replace('#/', '');
        $('body').addClass('project-view');
        $('.site-footer').hide();

        console.log(loadUrl);

        $('#main').fadeOut(FADESPEED, function(){
            
            $('#loading').fadeIn(FADESPEED);

            $('#load-project').load(loadUrl + ' #single-project article', function(data, textStatus, req){
                console.log(textStatus);
                if(textStatus != "error"){
                    
                    setTimeout(function(){
                        $('.side-footer').show();
                        $('#project-modal').fadeIn(FADESPEED, function(){
                            $('#loading').removeAttr('style');
                        });
                    }, 600);
                } else {
                    $('#main, .site-footer').fadeIn(FADESPEED);
                }
            });     
        });
    };


    // initialize the things
    BRAICAN.init = function(){

        //
        // bind hashchange events to our router
        //
        $(window).on('hashchange', function(e) {
            console.log("hashchange");
            var newHash = window.location.hash.replace('/#/', '');
            if(newHash){
                BRAICAN.loader(newHash);
            } else {
                backToHome();
            }
        });
        // on page load, initialize a hashchange to get things going
        $(window).trigger('hashchange');

        // $('body').addClass('initialized');

        // -------------------------------
        // waypoints
        // 
        // TODO - probably dont need this
        //
        // $('#work').waypoint(function(dir) {
        //     console.log("asdasd");
        //     if(dir == 'up'){
        //         $('#masthead').removeAttr('style');
        //     } else {
        //         $('#masthead').css({
        //             'height': '20px'
        //         });
        //     }
        // });

        // -------------------------------
        //
        // slide to nav
        //
        $('a[href*=#]').on('click', function(e){
            e.preventDefault();
            var id = $(this).attr('href');
            if(id.length > 1)
                $('body').scrollTo(id, SCROLLSPEED, {axis: 'y', easing:'swing', margin:INCLUDEMARGIN});
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
                project = $(this).attr('data-project');

            window.location.hash = '/' + project;
        });

        //
        // close the modal
        //
        $('#project-modal').on('click', '.close-modal',function(event) {
            event.preventDefault();
            backToHome();
        });

        //
        // navigating to other sections from the project detail
        //
        $('.project-view #menu-primary li a').on('click', function(event){
            event.preventDefault();
            var href = $(this).attr('href');

            backToHome(href);
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

    // DOM is ready
    $(document).ready( function() {
        
        BRAICAN.init();
    });

    // when the window loads
    $(window).load(function(){});

    // when the window scrolls
    $(window).scroll(function(){
    });

}(window.BRAICAN = window.BRAICAN || {}, jQuery));
