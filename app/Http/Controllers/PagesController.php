<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\Event;
use App\Participant;
use Flash;

class PagesController extends Controller
{
    public function __construct(){
        $this->user = Auth::user();
    }

    public function home() {
        if ($this->user) {
            $user = $this->user;
            $games = Game::all();
            $all_events = Event::latest('created_at')->future()->get();

            $liked_games = [];
            foreach($user->games as $game) {
                $liked_games[] = $game->id;
            }

            $my_events = [];
            foreach ($all_events as $event) {
                if (in_array($event->game->id, $liked_games)) {
                    $my_events[] = $event;
                }
            }

            return view('pages/timeline', compact('user', 'games', 'all_events', 'liked_games', 'my_events'));
        } else {
            return view('pages/home');
        }
    }

    public function profile() {

        $user = $this->user;
        $games = Game::all();

        $liked_games = [];
        foreach($user->games as $game) {
            $liked_games[] = $game->id;
        }

        return view('pages/profile', compact('user', 'games', 'liked_games'));

    }

    public function favourites(Request $request) {

        $games = $request->input('games');
        $this->user->games()->sync($games);

        Flash::success('Your favourites games have been saved!');

        return redirect(route('home'));

    }

    public function participants(Request $request) {

        $participant = Participant::where(['event_id' => $request->input('event_id'), 'user_id' => $this->user->id]);

        if ($participant->count() > 0) {
            $participant->first()->update(['participant' => $request->input('participant')]);
        } else {
            Participant::create(['event_id' => $request->input('event_id'), 'user_id' => $this->user->id, 'participant' => $request->input('participant')]);
        }

        Flash::success('Your data have been saved!');

        return redirect(route('home'));

    }
}
