$(document).ready(function(){

    // Event box
    var decision = $('.decision');
    var yes = decision.find('.yes');
    var no = decision.find('.no');
    decision.hide();

    $('.event-buttons a').on('click', function() {
        var className = $(this).attr('class');

        $('.event-buttons a').removeClass('event-buttons-hover');
        $(this).addClass('event-buttons-hover');
        $('.content > div').hide();
        $('.content .' + className).css('display', 'flex');
    });

    $('.content > div').hide();
    if ($('.content .my-events').length > 0) {
        $('.content .my-events').show();
        $('.event-buttons .my-events').addClass('active');
    } else {
        $('.content .all-events').show();
        $('.event-buttons .all-events').addClass('active');
    }


    $('.event').mouseenter(function(){
        $(this).find('.decision').fadeIn(200);
    }).mouseleave(function(){
        $(this).find('.decision').fadeOut(200);
    });

    yes.click(function(event){
        event.stopPropagation();
        event.preventDefault();
        $(this).parent().parent().removeClass('not-going').addClass('going');
    });

    no.click(function(event){
        event.stopPropagation();
        event.preventDefault();
        $(this).parent().parent().removeClass('going').addClass('not-going');
    });


    // My games
    $('label.game :checkbox').on('click', function(event) {
        event.stopPropagation();
    });

    $('label.game').on('click', function(event) {
        $(this).toggleClass('selected');
    });


    // New event
    $('label.game-logo').on('click', function(event) {
        $('label.game-logo').find('img').removeClass('selected');
        $(this).find('img').addClass('selected');
    });


    // Add game UI
    preview = function(field, url) {
        var img = '<img src="' + url + '" />';
        $('#' + field).parent().find('.preview').html(img).slideDown();
        $('#' + field).val(url);
    };

    $('#avatar, #cover').each(function() {
        if ($(this).val() != '') {
            preview($(this).attr('id'), $(this).val());
        } else {
            $(this).parent().find('.preview').hide();
        }
    });

});