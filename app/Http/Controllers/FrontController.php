<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller

{
    public function index()
    {
        $articles=Article::where('public','=',1)->get();
        return view('site.index',['articles'=>$articles]);
    }


    public function show($id)
    {


        $comments=Article::where('public','=',1)->find($id)->comments()->where('public','=','1')->get();; // выбираем все комментарии, который относятся к статье
        $article=Article::where('public','=',1)->find($id);
        return view('site.show',['article'=>$article,'comments'=>$comments]);
    }

}