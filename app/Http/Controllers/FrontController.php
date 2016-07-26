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
        //$request->session()->flush(); //чистить сессию.

        if ($request->session()->has('sale')) //Есть массив 'sale'?
        {
            $pick = session('sale');       //Взять все записи массива.
            if (!in_array($id, $pick))     //Проверить: не был выбран ранее
                $request->session()->push('sale.'.$id, 1);   //Добавить товар в массив
        }

        else {$request->session()->push('sale.'.$id, 1);}
        //Добавить 1-й товар в массив}

        //----------------------------------------------
        $sales = session('sale'); //Все выбранные записи
        //print_r($sales);
        foreach($sales as $sale => $id)
            {
                $orders[] = Article::find($sale);
            }

        //return Redirect::to('/cart');
        return view('site.cart', ['orders' => $orders]);

        //$request->session()->flush();
        //return view('admin.test');

    }
}

