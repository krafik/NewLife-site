'use strict';
fixedNav();
$(document).ready(function () {
    $('.icon-nav').click(function (e) {
        $('.icon-nav, .nav__wrap').toggleClass('active');
        $('body').toggleClass('lock');
    });

    $(window).scroll(function () {
        fixedNav();
    });

    ibg();
});

function s() {
    let hLogo;
    if($(window).width() >= 1200){
        hLogo = '0 0 170px';
        return hLogo;
    }else if ($(window).width() >= 992 && $(window).width() < 1199.98) {
        hLogo = '0 0 165px';
        return hLogo;
    } else if ($(window).width() >= 768 && $(window).width() < 991.98) {
        hLogo = '0 0 155px';
        return hLogo;
    }else if ($(window).width() < 767.98){
        hLogo = '0 0 110px';
        return hLogo;
    }
}

function fixedNav() {

    $(window).scrollTop() > 5 ? changeCss("#212121", "60px", "0 0 110px") : changeCss("transparent", "80px", s())
}


function changeCss(color, hNav, hLogo) {
    $('.header').css("background-color", color);
    $('.header__nav').css("height", hNav);
    $('.header__logo').css("flex", hLogo);

}


function ibg() {
    $.each($('.ibg'), function (index, val) {
        if ($(this).find('img').length > 0) {
            $(this).css('background-image', 'url("' + $(this).find('img').attr('src') + '")');
        }
    });
}
