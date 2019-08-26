$('.carousel').carousel();

$(".c-header-dropdown").click(function () {
    $(".header-user-dropdown").toggle();
});

$('#pager').carouFredSel();

// $('#zoom_01').elevateZoom({
//     lensSize: 100
// });
$(document).ready(function () {

    $("#header-shop").click(function () {
        $("#header-cart-dropdown").toggle();
    });

    $(".closebtn").click(function () {
        $(".sidenav").hide();
        $(".dark").hide();
    });

    $(".openNav").click(function () {
        $(".sidenav").show();
        $(".dark").show();
    });

    $(".dark").click(function () {
        $(".sidenav").hide();
        $(".dark").hide();
    });
});



// $("#ex2").slider({});

$('#foo2,#foo9,#foo10,#foo11').carouFredSel({
    auto: false,
    prev: '#prev2,#prev3',
    next: '#next2,#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo3').carouFredSel({
    auto: false,
    prev: '#prev3',
    next: '#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo5').carouFredSel({
    auto: false,
    prev: '#prev3',
    next: '#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo6').carouFredSel({
    auto: false,
    prev: '#prev3',
    next: '#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo7').carouFredSel({
    auto: false,
    prev: '#prev3',
    next: '#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});


$('#foo8').carouFredSel({
    auto: false,
    prev: '#prev3',
    next: '#next3',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo1').carouFredSel({
    auto: {
        pauseOnHover: 'resume',
        progress: '#timer1'
    }
}, {
    transition: true
});


$('#foo4').carouFredSel({
    auto: {
        pauseOnHover: 'resume',
        auto: true,
    },
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
}, {
    transition: true
});