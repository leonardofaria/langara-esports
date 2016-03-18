$(document).ready(function(){

    $.scrollTo = function (target, offset, speed, container) {
        if (isNaN(target)) {
            if (!(target instanceof jQuery))
                target = $(target);
            target = parseInt(target.offset().top);
        }

        container = container || "html, body";
        if (!(container instanceof jQuery))
            container = $(container);

        speed = speed || 500;
        offset = offset || 0;

        container.animate({
            scrollTop: target + offset
        }, speed);
    };

    // Event box
    var event = $('.event');
    var decision = event.find('.decision');
    var yes = decision.find('.yes');
    var no = decision.find('.no');
    decision.hide();

    $('.event').mouseenter(function(){
        $(this).find('.decision').fadeIn(200);
    }).mouseleave(function(){
        $(this).find('.decision').fadeOut(200);
    });

    $('.event-buttons a').on('click', function(event) {
        var className = $(this).attr('class');

        $('.event-buttons a').removeClass('active');
        $(this).addClass('active');
        $('.content > div').hide();
        $('.content .' + className).css('display', 'flex');
    });

    $('.content > div').hide();
    if ($('.content .my-events').length > 0) {
        $('.event-buttons a[class="my-events"]').click();
    } else {
        $('.event-buttons a')[0].click();
        console.log('test');
    }
    if ($('.add-event .validation').length > 0) {
        $('.event-buttons a')[3].click();
    }

    yes.on('click', function(event){
        event.stopPropagation();
        event.preventDefault();
        $(this).parent().find('.yes_radio').click();
        $(this).parent().submit();
        // $(this).parent().parent().removeClass('not-going').addClass('going');
    });

    no.on('click', function(event){
        event.stopPropagation();
        event.preventDefault();
        $(this).parent().find('.no_radio').click();
        $(this).parent().submit();
        // $(this).parent().parent().removeClass('going').addClass('not-going');
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