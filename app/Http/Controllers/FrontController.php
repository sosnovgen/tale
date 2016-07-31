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

    //-------------------------------------------------------------------
    //Добавление товара в корзину
    public function session(Request $request, $id)
    {
       // $request->session()->flush(); //очистить сессию.

        if ($request->session()->has('sale')) //Есть массив 'sale'?
        {
            $pick = session('sale');       //Взять все записи массива.

            /*if (!in_array($id, $pick))     //Проверить: не был выбран ранее*/
            if (!$request->session() -> has('sale.'.$id))//Проверить: не был выбран ранее
            { $request->session()->put('sale.'.$id, 1);} //Добавить товар в массив (индекс товара, кол.=1)
        }

        else {$request->session()->put('sale.'.$id, 1);}//Добавить 1-й товар в массив (индекс товара, кол.=1)}

        //----------------------------------------------
        $sales = session('sale'); //Все выбранные записи
        //print_r($sales);
        foreach($sales as $sale => $id) //Записать в переменную все выбранные записи.
            {
                $orders[] = Article::find($sale);
            }

        //return Redirect::to('/cart');
        return view('site.cart', ['orders' => $orders]);

        //$request->session()->flush();
        //return view('admin.test');
    }


    //-------------------------------------------------------
    //Изменить кол. товара в корзине.
    public function count(Request $request, $id,$kol)
    
    {   //$id - индекс выбранного товара, $kol - количество.
        $request->session()->put('sale.'.$id, $kol);
        
        //return redirect()->back() -> with('error', 'Something went wrong.');
    }



    //-------------------------------------------------------
    //Удаление товара из корзины
    public function del(Request $request, $id)
    {
        if ($request->session()->has('sale')) //Есть массив 'sale'?
        {
            if ($request->session() -> has('sale.'.$id))//Проверить: ыл выбран товар с индексом ID
            { $request->session()-> forget('sale.'.$id);} //Добавить товар в массив (индекс товара, кол.=1)
        }

    }


}

