<?php

namespace App\Http\Controllers;

use App\Belt;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function userImport()
    {
        $output = "<p>Importing Users</p>";
        $csv = array_map("str_getcsv", file("test.csv",FILE_SKIP_EMPTY_LINES));
        $keys = array_shift($csv);
        
        foreach ($csv as $i=>$row) {
            $csv[$i] = array_combine($keys, $row);
        }

        $belts = array(
            "White Belt"            => "white",
            "White Belt 1st Degree" => "white-1",
            "White Belt 2nd Degree" => "white-2",
            "White Belt 3rd Degree" => "white-3",
            "White Belt 4th Degree" => "white-4",
            "Blue Belt"            => "blue",
            "Blue Belt 1st Degree" => "blue-1",
            "Blue Belt 2nd Degree" => "blue-2",
            "Blue Belt 3rd Degree" => "blue-3",
            "Blue Belt 4th Degree" => "blue-4",
            "Purple Belt"            => "purple",
            "Purple Belt 1st Degree" => "purple-1",
            "Purple Belt 2nd Degree" => "purple-2",
            "Purple Belt 3rd Degree" => "purple-3",
            "Purple Belt 4th Degree" => "purple-4",
            "Brown Belt"            => "brown",
            "Brown Belt 1st Degree" => "brown-1",
            "Brown Belt 2nd Degree" => "brown-2",
            "Brown Belt 3rd Degree" => "brown-3",
            "Brown Belt 4th Degree" => "brown-4",
            "Black Belt"            => "black",
            "Black Belt Instructor" => "black-p",
            "Black Belt 1st Degree" => "black-1",
            "Black Belt 2nd Degree" => "black-2",
            "Black Belt 3rd Degree" => "black-3",
        );

        foreach ($csv as $i)
        {
            if (trim($i['Email']) == null) // No email address in csv file
            {
                $output = $output . "<p>Could not find email address for {$i['First']} {$i['Last']}, skipping</p>";
                continue;
            }

            $users = User::where('email','=',$i['Email'])->get();

            if ($users->count()!=0) // User with this email address already exists.
            { 
                $output = $output . "<p>User account for {$i['First']} {$i['Last']} already exists.</p>";
                continue;
            }
        
            $authuser = Auth::User();

            if ($authuser==null) //User Not logged in
            {
                $output = $output . "<p>Not Logged In</p>";
                break;
            }

            $output = $output . "<p>Creating account for {$i['First']} {$i['Last']}.</p>";
            $password = str_random(8);
            $rank = trim($i['Rank']);
            $belt = Belt::where('Picture','=',"$belts[$rank]")->get();
        
            if ($belt->count()==0) //Could not find rank, assigning white belt
            {
                    $output = $output . "<p>Could not find rank for {$i['First']} {$i['Last']}, assigning White Belt</p>";
                    $belt_id = 1;
            }
            else
                $belt_id = $belt[0]->id;

            User::create([
            'email' => "{$i['Email']}",
            'name' => "{$i['First']} {$i['Last']}",
            'password' => Hash::make($password),
            'belt_id' => $belt_id,
            'active' => true,
            'can_promote' => false,
            'instructor' => Auth::User()->id]);

            $content = "<p>User account {$i['First']} {$i['Last']} has been created. Their password is {$password} and their email address is {$i['Email']}.</p>";
            $output = $output . $content;
            // Mail::send('emails.send', ['title' => 'New User Created', 'content' => $content], function ($message) {
            //         $message->from('shane@bjja.com.au', 'Shane Poppleton');
            //         $message->to('shane@bjja.com.au');
            // });
        }
        return view('admin.userImport', compact('output'));
    }
}
