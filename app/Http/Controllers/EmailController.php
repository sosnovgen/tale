<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class EmailController extends Controller
{
    public function send(Request $request){

        /*$title = 'Новый заказ';//$request->input('title');*/
        $content = 'http://www.malleka.ru/admin';   //$request->input('content');

        Mail::queue('emails.send', [/*'title' => $title,*/'content' => $content, ], function ($message)
        {
            $message->from('user@gmail', 'Neil5Art');
            $message->to('juliasmall@mail.ru')->subject('Новый заказ');

        });

        /*  return response()->json(['message' => 'Request completed'])*/;
        return back();

    }
}
