<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class EmailController extends Controller
{
    public function send(Request $request){

        $title = 'Новый заказ';//$request->input('title');
        $content = 'Получен новый заказ.';   //$request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('me@gmail.com', 'Neil5Art');

            $message->to('juliasmall@mail.ru');

        });

        return response()->json(['message' => 'Request completed']);





    }
}
