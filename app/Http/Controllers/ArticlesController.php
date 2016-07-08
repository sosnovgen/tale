<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Comment;

use Image;
use Input;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.articles.articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); //выбираем все категории
        return view('admin.articles.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date = date('d.m.Y'); //Текущая дата
            $root = $_SERVER['DOCUMENT_ROOT']."/shop/public/images"; //Путь к папке 'image'
            $img_root = ($root.'/'.$date); //Путь к папке с датой постов.

            //print_r($img_root);
           if (!file_exists($img_root)) //Если такой папки нет, то
            {
                mkdir($img_root); //Создать папку с датой.
            }
                   $f_name = $request -> file('preview') -> getClientOriginalName();//определяем имя файла

                  //echo($f_name);
                  $request-> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку с оригинальным именем
                  $all=$request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
                  $all['preview'] ="/shop/public/images/".$date."/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

                  Article::create($all); //сохраняем массив в базу*/
        }
        else
        {
                  Article::create($request->all()); // если картинка не передана, то сохраняем запрос, как есть.
        }

                  Session::flash('message', 'Статья сохранена!');
                  return Redirect::to('/adminzone');

            // resizing an uploaded file
            // Image::make(Input::file('preview'))->resize(300, 200)->save('foo1.jpg');

       // return back()->with('message','Статья добавлена');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id); //выбираем статью для редактирования
        $categories=Category::all(); // выбираем все категории
        return view('admin.articles.edit',['article'=>$article,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $article=Article::find($id);

        if($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date = date('d.m.Y'); //Текущая дата
            $root = $_SERVER['DOCUMENT_ROOT']."/shop/public/images"; //Путь к папке 'image'
            $img_root = ($root.'/'.$date); //Путь к папке с датой постов.

        //print_r($img_root);
            if (!file_exists($img_root)) //Если такой папки нет, то
            {
                mkdir($img_root); //Создать папку с датой.
            }
            $f_name = $request -> file('preview') -> getClientOriginalName();//определяем имя файла

        //echo($f_name);
            $request-> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку с оригинальным именем
            $all=$request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] ="/shop/public/images/".$date."/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            $article->update($all); //сохраняем массив в базу*/

        }
        else
        {
            $article->update($request->all());
        }

        Session::flash('message', 'Статья изменена!');
        return Redirect::to('/adminzone');


    }

     public function destroy($id)
    {
        $Comms = Comment::with('article');
        $Comms -> delete();

        $article=Article::find($id);
        $article->delete();
        //$article->comments()->delete();


        Session::flash('message', 'Статья удалена!');
        return Redirect::to('/adminzone/articles');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        return view('admin.articles.delete', ['article' => $article]);

    }
}
