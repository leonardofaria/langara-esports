$(document).ready(function(){

    $.fn.extend({
        scrollTo : function(speed, easing) {
            return this.each(function() {
                var targetOffset = $(this).offset().top;
                $('html,body').animate({ scrollTop: targetOffset }, speed, easing);
            });
        }
    });

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

    if ($('.event-buttons a').length > 0) {
        $('.event-buttons a').on('click', function(event, triggered) {
            $('.event-buttons a').removeClass('active');
            $(this).addClass('active');

            $('.content > div').addClass('hide');
            $(this).attr('class').split(' ').map(function(cls){
                $('.content .' + cls).removeClass('hide');
            });

            if (!triggered) {
                $('.main-content').scrollTo('slow', 'swing');
            }
        });

        if ($('.content .my-events').length > 0) {
            $('.event-buttons a[class="my-events"]').trigger('click', true);
        } else {
            $('.event-buttons a[class="all-events"]').trigger('click', true);
        }
        if ($('.add-event .validation').length > 0) {
            $('.event-buttons a[class="add-event"]').trigger('click');
        }
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


    // Add game image preview UI
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


    // Add event calendar UI
    $('#started_at').datetimepicker({
        theme: 'dark',
        format: 'Y/m/d h:i a',
        step: 30,
        onShow: function(ct){
            this.setOptions({
                minDate: new Date()
            });
        },
        timepicker: true
    });

    $('#ended_at').datetimepicker({
        theme: 'dark',
        format: 'Y/m/d h:i a',
        step: 30,
        onShow: function(ct){
            this.setOptions({
              minDate: $('#started_at').val() ? $('#started_at').val() : false
            });
        },
        timepicker: true
    });

});