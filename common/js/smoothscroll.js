$('a[href^="#"]').on('click', function(e) {
    var widthwin = $(window).width();
    if (widthwin > 1000) var headerh = 160;
    else if (widthwin <= 1000 && widthwin >= 768) headerh = 160;
    else headerh = 70;

    e.preventDefault();
    var target = this.hash,
        $target = $(target);

    $('html, body').stop().animate({
        'scrollTop': $target.offset().top - headerh
    }, 300, 'swing', function() {});
});