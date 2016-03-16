<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Flash;

class UsersController extends Controller
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
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        Flash::success('The user has been created!');

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $games = $user->games;
        $events = Event::where(['user_id' => $id])->future()->get();

        $liked_games = [];
        foreach($user->games as $game) {
            $liked_games[] = $game->id;
        }

        return view('users.show', compact('user', 'games', 'events', 'liked_games'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UserRequest $request
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        Flash::success('The user has been edited!');

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}