<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return view('home');
    }
    public function index()
    {
        if (Auth::check())
            return view('home');
        else
            return Redirect::route('login');
        // return view('auth.login');
    }


}
