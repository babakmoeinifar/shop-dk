
// $('#zoom_01').elevateZoom({
//     lensSize: 100
// });

// $("#ex2").slider({});
$('.carousel').carousel();
$('#pager').carouFredSel();

$('#foo2').carouFredSel({
    auto: false,
    prev: '#prev2',
    next: '#next2',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo3').carouFredSel({
    auto: false,
    prev: '#prevoffer',
    next: '#nextoffer',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo5').carouFredSel({
    auto: false,
    prev: '#prevslider',
    next: '#nextslider',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo6').carouFredSel({
    auto: false,
    prev: '#prevbanners2',
    next: '#nextbanners2',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo9').carouFredSel({
    auto: false,
    prev: '#prevnewest',
    next: '#nextnewest',
    mousewheel: true,
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$('#foo11').carouFredSel({
    auto: false,
    prev: '#prevbrands',
    next: '#nextbrands',
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


$('#shegeftangiz').carouFredSel({
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
