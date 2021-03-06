<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Game;
use App\Participant;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Flash;

class EventsController extends Controller
{
    public function __construct(){
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $games = Game::all();

        return view('events.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\EventRequest $request
     * @return Response
     */
    public function store(EventRequest $request)
    {
        $event = new Event($request->all());
        Auth::user()->events()->save($event);
        Participant::create(['user_id' => $event->user->id, 'event_id' => $event->id, 'participant' => 1]);

        Flash::success('The event has been created!');

        return redirect('/events/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $user = $this->user;

        return view('events.show', compact('event', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $games = Game::all();

        return view('events.edit', compact('event', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param EventRequest $request
     * @return Response
     */
    public function update($id, EventRequest $request)
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());

        Flash::success('The event has been edited!');

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->user->id !== $this->user->id && !$this->user->isAdmin()) {
            Flash::error('You can not delete this event');
            return redirect()->back();
        }

        if ($event->delete()) {
            Flash::success('The event has been deleted!');
            return redirect()->back();
        }
    }

}