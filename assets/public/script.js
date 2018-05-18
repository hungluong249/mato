//$(document).onload(function(){
//    $('.nav').hide();
//});

$(document).ready(function(){
	"use strict";

    var i = 0;
    $('header .nav').hide();

	$('#nav-btn').click(function(){

	    if(i === 0) {
	        $('.nav').fadeIn();
	        i = 1;
        } else {
            $('.nav').fadeOut();
            i = 0;
        }
    })

});

