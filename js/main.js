$(function () {

    $(window).bind("resize", function () {
        console.log($(this).width())
        if ($(this).width() < 500) {
            $('div').removeClass('col-md-5').addClass('col')
        } else {
            $('div').removeClass('col').addClass('col-md-5')
        }
    }).trigger('resize');
})
