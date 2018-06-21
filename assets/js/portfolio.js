// Reset Header

var base_url = 'http://localhost/mato/';

$('header > .logo > a > img').attr('src', base_url + 'assets/img/logo.png');
$('header > .container .nav-title').css('color', '#333');
$('header > .side-text').css('color', '#333');
$('header > .nav-btn').css('border', '2px solid #333');
$('header > .nav-btn span').css('color', '#333');

$('header .nav-title > span').text('What We Made');

$(document).ready(function() {

    //Click to show NAV

    var i = 0;

    $('#nav-btn').click(function () {
        if (i === 0) {
            $('section.nav').fadeIn();
            $('header > .logo > a > img').attr('src', base_url + 'assets/img/logo.png');
            $('header > .container .nav-title').css('color', '#333');
            $('header > .side-text').css('color', '#333');
            $('header > .nav-btn').css('border', '2px solid #333');
            $('header > .nav-btn span').css('color', '#333');
            $('header > .nav-btn span:first-of-type').text('hi');
            $('header > .nav-btn span:last-of-type').text('de');
            i = 1;
        }
        else {
            $('section.nav').fadeOut();
            $('header > .logo > a > img').attr('src', base_url + 'assets/img/logo.png');
            $('header > .container .nav-title').css('color', '#333');
            $('header > .side-text').css('color', '#333');
            $('header > .nav-btn').css('border', '2px solid #333');
            $('header > .nav-btn span').css('color', '#333');
            $('header > .nav-btn span:first-of-type').text('me');
            $('header > .nav-btn span:last-of-type').text('nu');
            i = 0;
        }
    })

    //Smooth Scroll

    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});