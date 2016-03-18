<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Event;
use App\Http\Requests;
use App\Http\Requests\GameRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Flash;

class GamesController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except' => 'show']);
        $this->middleware('auth', ['except' => 'show']);
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $games = Game::all();

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\GameRequest $request
     * @return Response
     */
    public function store(GameRequest $request)
    {
        Game::create($request->all());

        Flash::success('The game has been created!');

        return redirect('games');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);
        $events = Event::where(['game_id' => $id])->future()->get();
        $user = $this->user;

        return view('games.show', compact('game', 'events', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param GameRequest $request
     * @return Response
     */
    public function update($id, GameRequest $request)
    {
        $game = Game::findOrFail($id);

        $game->update($request->all());

        Flash::success('The game has been edited!');

        return redirect('games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        if ($game->delete()) {
            Flash::success('The game has been deleted!');
            return redirect('games');
        }
    }

}