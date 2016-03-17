$(document).ready(function(){

    // Event box
    var decision = $('.decision');
    var yes = decision.find('.yes');
    var no = decision.find('.no');
    decision.hide();

    $('.event-buttons a').on('click', function() {
        var className = $(this).attr('class');

        $('.event-buttons a').removeClass('active');
        $(this).addClass('active');
        $('.content > div').hide();
        $('.content .' + className).css('display', 'flex');
    });

    $('.content > div').hide();
    if ($('.content .my-events').length > 0) {
        $('.event-buttons a')[1].click();
    } else {
        $('.event-buttons a')[0].click();
    }
    if ($('.add-event .validation').length > 0) {
        $('.event-buttons a')[3].click();
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
        if ($(this).val() !== '') {
            preview($(this).attr('id'), $(this).val());
        } else {
            $(this).parent().find('.preview').hide();
        }
    });

});