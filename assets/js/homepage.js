$('section.nav').hide();

$(document).ready(function() {

    //Click to show NAV


    var i = 0;

    $('#nav-btn').click(function () {
        if (i === 0) {
            $('section.nav').fadeIn();
            $('header > .logo > a > img').attr('src', 'assets/img/logo.png');
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
            $('header > .logo > a > img').attr('src', 'assets/img/logo-w.png');
            $('header > .container .nav-title').css('color', '#fff');
            $('header > .side-text').css('color', '#fff');
            $('header > .nav-btn').css('border', '2px solid #fff');
            $('header > .nav-btn span').css('color', '#fff');
            $('header > .nav-btn span:first-of-type').text('me');
            $('header > .nav-btn span:last-of-type').text('nu');
            i = 0;
        }
    })
});