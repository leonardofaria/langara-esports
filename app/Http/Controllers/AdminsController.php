<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;
use App\User;
use App\Http\Requests;
use App\Http\Requests\AdminRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Flash;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::lists('name', 'id');

        return view('admins.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\AdminRequest $request
     * @return Response
     */
    public function store(AdminRequest $request)
    {
        Admin::create($request->all());

        Flash::success('The admin has been created!');

        return redirect('admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        $users = User::lists('name', 'id');

        return view('admins.show', compact('admin', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param AdminRequest $request
     * @return Response
     */
    public function update($id, AdminRequest $request)
    {
        $admin = Admin::findOrFail($id);

        $admin->update($request->all());

        Flash::success('The admin has been edited!');

        return redirect('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->delete()) {
            Flash::success('The admin has been deleted!');
            return redirect('admins');
        }

    }

}