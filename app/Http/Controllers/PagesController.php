<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct(){
        $this->user = Auth::user();
    }

    public function home() {
        if ($this->user) {
            return view('pages/timeline');
        } else {
            return view('pages/home');
        }
    }

    public function dashboard() {
        dd($this->user);
    }
}
