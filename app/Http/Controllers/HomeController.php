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
    
    public function index()
    {
        if (Auth::check())
        {
            $tests = Auth::User()->assignedTests()->get();
            // return dd($tests);
            return view('home', compact('tests'));
        }
        else
            return Redirect::route('login');
    }


}
