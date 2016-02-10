<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\Event;
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
            $events = Event::latest('created_at')->future()->get();

            if (count($user->games) == 0) {
                Flash::info('Select one or more games to get info about next events');
            }

            return view('pages/timeline', compact('user', 'games', 'events'));
        } else {
            return view('pages/home');
        }
    }

    public function profile() {

        $user = $this->user;
        $games = Game::all();

        return view('pages/profile', compact('user', 'games'));

    }

    public function favourites(Request $request) {

        $games = $request->input('games');
        $this->user->games()->attach($games);

        Flash::success('Your favourites games have been saved!');

        return redirect(route('home'));

    }
}
