$('section.nav').hide();

$(document).ready(function(){

    //Click to show NAV


    var i = 0;

    $('#nav-btn').click(function(){
        if( i === 0){
            $('section.nav').fadeIn();
            $('header > .logo > a > img').attr('src','assets/img/logo.png');
            $('header > .container .nav-title').css('color' , '#333');
            $('header > .side-text').css('color' , '#333');
            $('header > .nav-btn').css('border' , '2px solid #333');
            $('header > .nav-btn span').css('color' , '#333');
            $('header > .nav-btn span:first-of-type').text('hi');
            $('header > .nav-btn span:last-of-type').text('de');
            i = 1;
        }
        else{
            $('section.nav').fadeOut();
            $('header > .logo > a > img').attr('src','assets/img/logo-w.png');
            $('header > .container .nav-title').css('color' , '#fff');
            $('header > .side-text').css('color' , '#fff');
            $('header > .nav-btn').css('border' , '2px solid #fff');
            $('header > .nav-btn span').css('color' , '#fff');
            $('header > .nav-btn span:first-of-type').text('me');
            $('header > .nav-btn span:last-of-type').text('nu');
            i = 0;
        }
    })

    //Hover on main NAV

    $('.main-nav .nav-list #work').mouseenter(function(){
        $('.main-nav .right h1.image-text > span').text('Work');
        $('.main-nav .right .mask img').attr('src','https://images.unsplash.com/photo-1517493395859-9185dea5212a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1f4974ef4767ddb37270c1f3b4eb1b44&auto=format&fit=crop&w=934&q=80');
    });
    $('.main-nav .nav-list #about').mouseenter(function(){
        $('.main-nav .right h1.image-text > span').text('About Us');
        $('.main-nav .right .mask img').attr('src','https://images.unsplash.com/photo-1514540344452-642d604143a2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=73b8449846b0c8f33bb3ba221b459ea0&auto=format&fit=crop&w=934&q=80');
    });
    $('.main-nav .nav-list #team').mouseenter(function(){
        $('.main-nav .right h1.image-text > span').text('Team');
        $('.main-nav .right .mask img').attr('src','https://images.unsplash.com/photo-1525944001263-ba59a9974f88?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ffca5f3ccc44b13d3b036035a6de1d5e&auto=format&fit=crop&w=2228&q=80');
    });
    $('.main-nav .nav-list #contact').mouseenter(function(){
        $('.main-nav .right h1.image-text > span').text('Contact');
        $('.main-nav .right .mask img').attr('src','https://images.unsplash.com/photo-1495129532087-1456841824ed?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4685f67cd3433520a5b0186bb6ff9b3e&auto=format&fit=crop&w=925&q=80');
    });

    $('.main-nav .nav-list li a').mouseout(function() {
        $('.main-nav .right .mask img').attr('src','https://images.unsplash.com/photo-1517493395859-9185dea5212a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=1f4974ef4767ddb37270c1f3b4eb1b44&auto=format&fit=crop&w=934&q=80');
        $('.main-nav .right h1.image-text > span').text('Work');
    })

});