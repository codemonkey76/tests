<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('shane@bjja.com.au', 'Shane Poppleton');

            $message->to('shane@bjja.com.au');

        });

        return response()->json(['message' => 'Request completed']);
    }      
}
