// navbar
$(window).scroll(function () {
    $('nav').toggleClass('scolled', $(this).scrollTop() > 100);
});