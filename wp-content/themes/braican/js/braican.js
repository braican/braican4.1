// ---------------------------------
// braican.js
//

(function(BRAICAN, $, undefined){

    // -----------------------------------------
    // PRIVATE
    //
    // Properties
    //

    var FADESPEED = 600,
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
        $('#page').css({
            'min-height': window.innerHeight + 'px'
        });

        $('body').removeClass('project-view');

        $('#main').css({
            'position': 'absolute',
            'zIndex': 1000
        }).fadeIn(FADESPEED, function(){
            $('body').removeClass('project-view');
            window.location.hash = '';
            $('#project-modal').removeAttr('style').find('#load-project').empty();
            $('#main, #page, .site-footer').removeAttr('style');

            // conole.log(href);
            if(href && href != '#'){
                $('body').scrollTo(href, SCROLLSPEED, {axis: 'y', easing:'swing', margin:INCLUDEMARGIN});
            }
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

        var projectSlug = hash.replace('#/', ''),
            projectID = $('.project-group a[data-project="' + projectSlug + '"]').data('id');

        $('body').addClass('project-view');
        $('.site-footer').hide();

        if(projectID){
            $.when(
                $.post(braican_ajax.ajaxurl, {
                    action: 'ajax_action',
                    post_id: projectID
                }),

                $('#main').fadeOut(FADESPEED, function(){$('#loading').fadeIn(FADESPEED);})
            ).then(function(data){
                if(data == 1){
                    console.log("Uh oh. Looks like there's no project with that ID");
                    backToHome();
                } else {
                    $('#load-project').html(data);

                    setTimeout(function(){
                        $('.side-footer').show();
                        $('#project-modal').fadeIn(FADESPEED, function(){
                            $('#loading').removeAttr('style');
                        });
                        $('.site-footer').removeAttr('style');
                    }, 600);
                }
            });   
        }
    };


    // initialize the things
    BRAICAN.init = function(){

        //
        // bind hashchange events to our router
        //
        $(window).on('hashchange', function(e) {
            if(window.location.hash.indexOf('#/') > -1){
                var newHash = window.location.hash.replace('#/', '');
                if(newHash){
                    BRAICAN.loader(newHash);
                } else {
                    backToHome(window.location.hash);
                }
            } else {
                backToHome(window.location.hash);
            }
            
        });
        // on page load, initialize a hashchange to get things going
        $(window).trigger('hashchange');


        // -------------------------------
        //
        // slide to nav
        //
        $('a[href^="/#"]').on('click', function(e){
            e.preventDefault();
            var id = $(this).attr('href').substring(1);
            if($('body').hasClass('project-view')){
                backToHome(id);
            } else if(id.length > 1){
                $('body').scrollTo(id, SCROLLSPEED, {axis: 'y', easing:'swing', margin:INCLUDEMARGIN});
            }
            if($(window).width() < 600 && !$(this).parent().hasClass('logo')){
                $('.mobile-nav').click();
            }
        });

        // mobile
        $('.mobile-section-navigation i').on('click', function(event){
            event.preventDefault();
            var $t = $(this),
                dir = $t.attr('class');
                scrollToSection = dir === "icon-angle-up" ? $t.parents('.section').prev().data('section') : $t.parents('.section').next().data('section');

            $('body').scrollTo('#' + scrollToSection, SCROLLSPEED, {axis: 'y', easing:'swing', margin:INCLUDEMARGIN});
        });


        // --------------------------------
        // the projects section
        // --------------------------------
        //

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

        // ---------------------------------
        // mobile navigation
        //
        $('.mobile-nav').on('click', function(event) {
            event.preventDefault();
            $(this).toggleClass('activated');
            $('.site-nav').slideToggle(FADESPEED);
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

}(window.BRAICAN = window.BRAICAN || {}, jQuery));
