<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller

{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::all();
        return view('site.page',['categories' => $categories],['articles' => $articles]);

        /*$articles=Article::where('public','=',1)->get();
        return view('site.index',['articles'=>$articles]);*/
    }


    public function show($id)
    {
        
        $comments=Article::where('public','=',1)->find($id)->comments()->where('public','=','1')->get();; // выбираем все комментарии, который относятся к статье
        $article=Article::where('public','=',1)->find($id);
        return view('site.show',['article'=>$article,'comments'=>$comments]);
    }

    public function page()
    {
        return view('site.page');
    }

    //Добавление товара в корзину
    public function session(Request $request, $id)
        {
            $pick = session('sale');                    //Взять все записи массива.
            if (!in_array($id, $pick)) {                //Проверить: не был выбран ранее
              $request->session()->push('sale',$id);    //Добавить товар в массив
            }

            return Redirect::to('/');

        }

}