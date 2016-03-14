$(document).ready(function(){

    var decision = $(".decision");
    var yes = decision.find(".yes");
    var no = decision.find(".no");
    var globalEvents = $(".global-events");
    var myEventsButton = $(".personal-events");
    var allGames = $(".wrapper-add-games");
    var allGamesButton = $(".my-games-button");
    var delButton = $(".delete-button");
    var userMadeEvent = $(".user");
    var addEventButton = $("#add-event");
    var addEventTab = $(".add_event");

    delButton.hide();
    allGames.hide();
    decision.hide();
    globalEvents.hide();
    addEventTab.hide();

//    switching between All Games. My Events and All Events

    addEventButton.on('click',function(event){

        event.stopPropagation();
        event.preventDefault();


        $(".all-events").removeClass("event-buttons-hover");
        myEventsButton.removeClass("event-buttons-hover");
        allGamesButton.removeClass("event-buttons-hover");
        addEventButton.addClass("event-buttons-hover");

        globalEvents.hide();
        $(".my-events").hide();
        allGames.hide();
        addEventTab.show();

    });


    allGamesButton.on('click',function(event){


        event.stopPropagation();
        event.preventDefault();

        $(".all-events").removeClass("event-buttons-hover");
        myEventsButton.removeClass("event-buttons-hover");
        addEventButton.removeClass("event-buttons-hover");
        allGamesButton.addClass("event-buttons-hover");

        globalEvents.hide();
        $(".my-events").hide();
        addEventTab.hide();
        allGames.show();

    });


    $(".event-buttons").find(".all-events").on('click', function(event){


        event.stopPropagation();
        event.preventDefault();

        allGamesButton.removeClass("event-buttons-hover");
        myEventsButton.removeClass("event-buttons-hover");
        addEventButton.removeClass("event-buttons-hover");
        $(this).addClass("event-buttons-hover");

//        $(".my-events").find(".event").addClass("four-column");
        $(".my-events").hide();
        addEventTab.hide();
        globalEvents.show();
    });

    myEventsButton.on('click', function(event){

        event.stopPropagation();
        event.preventDefault();

        allGamesButton.removeClass("event-buttons-hover");
        $(".all-events").removeClass("event-buttons-hover");
        addEventButton.removeClass("event-buttons-hover");
        $(this).addClass("event-buttons-hover");

        allGames.hide();
        globalEvents.hide();
        addEventTab.hide();
        $(".my-events").show();

    });

    $(".event").mouseenter(function(){

        $(this).find(".decision").fadeIn(200);

    });

//    joining the event
    yes.click(function(event){

        event.stopPropagation();
        event.preventDefault();

        $(this).parent().parent().removeClass("not-going").addClass("going");
    });

//    not going for the event
    no.click(function(event){

        event.stopPropagation();
        event.preventDefault();
        $(this).parent().parent().removeClass("going").addClass("not-going");
    });

    $(".event").mouseleave(function(){

        $(this).find(".decision").fadeOut(200);
    });

//    Event delete button
    userMadeEvent.hover(function(){

        $(this).find(".delete-button").fadeToggle(200);
    });

//    Delete button action
    delButton.on('click',function(event){

        event.stopPropagation();
        event.preventDefault();
        $(this).parent().fadeOut();
    });


    //
    $('label.game :checkbox').on('click', function(event) {
        event.stopPropagation();
    });

    $('label.game').on('click', function(event) {
        $(this).toggleClass('selected');
    });

    $('label.game-logo').on('click', function(event) {
        $('label.game-logo').find('img').removeClass('selected');
        $(this).find('img').addClass('selected');
    });

});