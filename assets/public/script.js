$(function(){
	"use strict";
	
	$('#expand_nav').click(function(){
		$('.header_nav_responsive').animate({
			"left" : "0" 
		},500);
	});
	$('#close_nav').click(function(){
		$('.header_nav_responsive').animate({
			"left" : "-100%" 
		},500);
	});
	
	$(document).load($(window).bind("resize", listenWidth));

    function listenWidth(  ) {
        if($(window).width()<640)
        {
            $("#creat_i").remove().insertAfter($("#creat_t"));
			$("#discuss_i").remove().insertAfter($("#discuss_t"));
        } else {
            $("#creat_t").remove().insertBefore($("#creat_i"));
			$("#discuss_t").remove().insertBefore($("#discuss_i"));
        }
    }
    
    $('.welcome').delay(3000).fadeOut(500);

});

