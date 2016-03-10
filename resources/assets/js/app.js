$(document).ready(function(){

    // EVENTS PAGE
    var decision = $(".decision");
    var yes = decision.find(".yes");
    var no = decision.find(".no");
    var globalEvents = $(".global-events");
    var myEventsButton = $(".personal-events");

    decision.hide();
    globalEvents.hide();

    $(".event-buttons").find(".all-events").on('click', function(event){


        event.stopPropagation();
        event.preventDefault();

        myEventsButton.removeClass("event-buttons-hover");
        $(this).addClass("event-buttons-hover");
//        $(".my-events").find(".event").addClass("four-column");
        $(".my-events").hide();
        globalEvents.show();
    });

    myEventsButton.on('click', function(event){

        event.stopPropagation();
        event.preventDefault();

        $(this).addClass("event-buttons-hover");
        $(".all-events").removeClass("event-buttons-hover");
        globalEvents.hide();
        $(".my-events").show();

    });

    $(".event").mouseenter(function(){

        $(this).find(".decision").fadeIn(200);

    });

    yes.click(function(event){

        event.stopPropagation();
        event.preventDefault();

        $(this).parent().parent().removeClass("not-going").addClass("going");
    });

    no.click(function(event){

        event.stopPropagation();
        event.preventDefault();
        $(this).parent().parent().removeClass("going").addClass("not-going");
    });

    $(".event").mouseleave(function(){

        $(this).find(".decision").fadeOut(200);
    });


    // MY GAMES
    var gameLogos = $(".game-logo-wrapper");

    $(".game-logo-wrapper").children().hide();

    $(".game").on('click', function(){

        var clickedGame = $(this);
        var gameName = $(this).find("h2").text();
        $('figcaption:contains("' + gameName + '")').parent().slideToggle(200, function(){
            clickedGame.toggleClass("green-border");
        });
    });
});