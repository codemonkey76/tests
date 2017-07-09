<?php

namespace App\Http\Controllers;

use App;
use App\Test;
use App\User;
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
            $users = App\User::studentsOf(Auth::id())->orderBy('belt_id')->get();

            return view('home', compact('tests', 'users'));
        }
        else
            return Redirect::route('login');
    }
    public function assignTest(Request $request)
    {
        $user = User::find($request->user_id);
        $test = Test::find($request->selected_test);
        $user->assignTest($test->id);
        return redirect("/");
    }


}
