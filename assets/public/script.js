
$('section.nav').hide();

$(document).ready(function(){
	"use strict";

    var i = 0;


	$('#nav-btn').click(function(){

	    if(i === 0) {
            $('section.nav').fadeIn();
            $('.header').css('background-color' , 'transparent');
	        i = 1;
        } else {
            $('section.nav').fadeOut();
            $('.header').css('background-color' , '#fff');
            i = 0;
        }
    })

});

