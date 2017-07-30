$(document).ready(function() {

    $('.module-header').click(function() {
        $(this).siblings('*').slideToggle(500);
        $(this).children('.collapse-toggle').toggleClass('collapsed');
    });

    $('#header_nav').click(function() {
        $('#dropdown_nav').slideToggle(500);
    });

});
