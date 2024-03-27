$(".hamburger").click(function () {
    $(this).toggleClass('active');
    $(".header__nav").toggleClass('panelactive');
});

$(".nav__item").click(function () {
    $(".hamburger").removeClass('active');
    $(".header__nav").removeClass('panelactive');
});