$(document).ready(function() {

    $('#header i, #primary-nav-overlay').click(function(event) {
        if(event.target.tagName.toLowerCase() !== 'a') {
            $('#primary-nav-overlay').fadeToggle();
        }
    });

    $('.module-header').click(function() {
        $(this).siblings('*').slideToggle(500);
        $(this).find('.collapse-toggle').toggleClass('collapsed');
    });

    $('.modal .button.cancel, .modal .button.close').click(function() {
        $('#modal-container, .modal').fadeOut();
    });

    $('#delete-user').click(function() {
        $('#modal-container, #delete-confirmation').css('display','flex').hide().fadeIn();
    });



});
