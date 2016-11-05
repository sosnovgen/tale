<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Article;
use App\Group;
use App\Category;
use Validator;
use Session;

use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller

{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::paginate(12);
        $links = str_replace('/?', '?', $articles->render());
        $n = 0; //Признак сортировки
        
        return view('site.page',[
            'categories' => $categories,
            'articles' => $articles,
            'n' => $n,
            'links' => $links,
        ]);

        /*$articles=Article::where('public','=',1)->get();
        return view('site.index',['articles'=>$articles]);*/
    }


    public function show($id)
    {
        
        /*$comments=Article::where('public','=',1)->find($id)->comments()->where('public','=','1')->get();; // выбираем все комментарии, который относятся к статье*/
        $categories = Category::all();
        $articles=Article::find($id);
        return view('site.show',['articles'=>$articles], ['categories' => $categories]);
    }

    //-----------------------------------------------
    //Показать весь товар.
    public function one()
    {
        $categories = Category::all();
        $articles = Article::all();
        $n = 0; //Признак сортировки

        return view('site.one',[
            'categories' => $categories,
            'articles' => $articles,
            'n' => $n,
        ]);
    }

    //-------------------------------------------------------------------
    //Добавление товара в корзину
    public function session(Request $request, $id)
    {
        //$request->session()->flush(); //очистить сессию.

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

    //-------------------------------------------------------
    //Оформление заказа
    public function order()
    {
        return view('site.order');
    }


    //-------------------------------------------------------
    //Занесение заказа в базу
    public function store_order(Request $request)
    {
        //---------- Validator ------------------------
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back() -> with('error','Поле не заполнено!');
        }

        //----------------- Order -------------------
        $all = $request -> all();         //Взять данные заказа из запроса
        $model = Order::create($all);     //Сохраняем заказ.
        $int = $model ->id;                //Индекс сохранённой записи.

        //----------------- Products -------------------
        if ($request->session()->has('sale')) //Есть массив 'sale'?
        {

            $sales = session('sale'); //все выбранные записи
            $summa = 0; 
            foreach($sales as $sale => $id) //записать в переменную все выбранные записи.
            {
                $prod = new Product;            //новая запись для таблицы 'products'.
                $art = Article::find($sale);    //товар из articles - выбран по ID
                $kol = session('sale.'.$sale);  //из сессии берём количество - по ID

                $prod -> title = $art -> title; //название товара
                $prod -> count = $kol;          //добавляем количество
                $prod -> order_id = $int;       //добавить ключ из 'orders'
                $prod -> cena = $art -> cena;   //цена
                $prod -> save();                //записать в таблицу.

                //$products[] = $prod;  //строку добавляем к массиву.

            }
            $request->session()->flush(); //очистить сессию.
          }

        Session::flash('message', 'Заказ отправлен!');
        return redirect('/assortiment');
    }


    //-------------------------------------------------------
    //очистить сессию
    public function reset(Request $request)
    {
        $request->session()->flush(); //очистить сессию.
        return redirect()->back();
    }

    //-------------------------------------------------------
    //Сортировка по категории
    public function sort($id)
    {
        $categories = Category::all(); //Все категории
        $articles = Article::where('category_id','=',$id) -> paginate(12);
        $links = str_replace('/?', '?', $articles->render());
        $n = 1; //Признак сортировки

        return view('site.page', [
            'categories' => $categories, 
            'articles' => $articles,
            'n' => $n,
            'links' => $links,
        ]);
    }

    //-------------------------------------------------------
    //Сортировка по категории
    public function news()
    {
        $categories = Category::all(); //Все категории
        $group = Group::where('title','=','новинка');
        $id  = $group->first()-> id;

        $articles = Article::where('group_id','=',$id) -> paginate(12); //Выбрать все новинки*/
        $links = str_replace('/?', '?', $articles->render());
        $n = 0; //Признак сортировки по категориям

        return view('site.page',[
            'categories' => $categories,
            'articles' => $articles,
            'n' => $n,
            'links' => $links,
        ]);

    }
    //-------------------------------------------------------
    //Find in articles.
    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request -> search;
        $articles = Article::where('title', 'LIKE', '%' . $query . '%')->paginate(12);
        $links = str_replace('/?', '?', $articles->render());
        $n = 0; //Признак сортировки

        /*return view('site.page', copmpact('categories','query','articles','links', 'n'));*/
        return view('site.page',[
            'categories' => $categories,
            'articles' => $articles,
            'n' => $n,
            'links' => $links,
            'query' => $query,
        ]);
    }


}

