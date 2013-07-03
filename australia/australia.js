// australia by braican


// hide the comments
jQuery(function($){
	$(".thecomments").hide();
	$(".commentmetadata a").attr("href", "#");
	//$("#submit").attr("onClick", "return false");
	
	$(".showcomments").click(function(){
		var comm = $(this).parent().find(".thecomments");
		if($(comm).css("display") == "none"){
			$(comm).slideDown();
			$(this).find("span").html("hide");
		} else {
			$(comm).slideUp();
			$(this).find("span").html("show");
		}
	});
});
