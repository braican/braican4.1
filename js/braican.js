// JavaScript Document

/*	================== JavaScript and jQuery for braican.com 3.0 
	==================
	================== */	

function randofact() {
	var fact = Array(	"he'll learn how to fly an airplane.",
						"he'll have seen Europe.",
						"he'll have eaten at all the restaurants in the North End of Boston.", 
						"he'll own a boat.",
						"he'll become an expert water skiier."
					)
	var one = Math.round((fact.length - 1)*Math.random());
	
	document.write(fact[one]);
}

function goToByScroll(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

$(document).ready(function() {
	
//  ******* the navigational system	
	$(function () {
		$("#navigation a").hover(function() {
			$(this).animate({"padding-top":'12px'}, 150);
		}, function(){
			if (!($(this).hasClass('active'))) {
				$(this).animate({"padding-top":'7px'}, 150);
			}
		});
	});
	
//  *****  INDEX PAGE

	$('#social-footer-fixed').hover(function(){  
    	$(this).stop().animate({bottom:'0px'},{queue:false,duration:160});  
	}, function() {  // BELOW THIS IS WHERE THE BACKGROUND CAPTION STOPS
    	$(this).stop().animate({bottom:'-70px'},{queue:false,duration:160});  
	});

	  
	$(".keep-reading a").hover(function() {
		$(this).animate({"padding-right":'+=10px', "padding-left": '+=10px'}, 200);
	}, function(){
		$(this).animate({"padding-right":'-=10px', "padding-left": '-=10px'}, 200);
	});
	
	// **** Blog 
	$(".alignleft a").hover(function() {
		$(this).animate({"padding-right":'+=10px', "padding-left": '+=10px'}, 200);
	}, function(){
		$(this).animate({"padding-right":'-=10px', "padding-left": '-=10px'}, 200);
	});
	
	$(".alignright a").hover(function() {
		$(this).animate({"padding-right":'+=10px', "padding-left": '+=10px'}, 200);
	}, function(){
		$(this).animate({"padding-right":'-=10px', "padding-left": '-=10px'}, 200);
	});

	

//  ******* THE FOLLOW-AS-YOU-SCROLL MENU

	var top = $('#fixit').offset().top - 100;
   	$(window).scroll(function (event) {
   		var y = $(this).scrollTop(); 					// what the y position of the scroll is
   		if (y >= top) {$('#fixit').addClass('fixed');}
   		else {$('#fixit').removeClass('fixed');}
   	});
   

//	******* THE PORTFOLIO PAGE
	
	$('.boxgrid').hover(function(){
		var zzheight = $(this).children(this).height();
		var zztheheight = (200 - zzheight) + '' + 'px';
        $(".boxcaption", this).stop().animate({top: zztheheight},{queue:false,duration:160});  
    }, function() {
        $(".boxcaption", this).stop().animate({top: '225px'},{queue:false,duration:160});  
    });  
	
	$('#fixit').hover(function(){  
        $(this).stop().animate({left:'0px'},{queue:false,duration:160});  
	}, function() {  // BELOW THIS IS WHERE THE BACKGROUND CAPTION STOPS
        $(this).stop().animate({left:'-172px'},{queue:false,duration:160});  
	});
	
});