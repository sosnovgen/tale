<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Comment;
use App\Group;
use Storage;

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
        $articles = Article::all();
        $categories = Category::all();
        $groups = Group::all();

        return view('admin.articles.articles',['articles'=>$articles],['categories'=>$categories], ['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); //выбираем все категории
        $groups = Group::all(); //выбираем все группы
        return view('admin.articles.create',['categories' => $categories], ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('preview')) //Проверяем была ли передана картинка
        {
            $root = public_path()."/images"; //Путь к папке 'image'
            $img_root = ($root.'/articles'); //Путь к папке с картинками для товара.

            if (!file_exists($img_root)) //Если такой папки нет, то
            {
                mkdir($img_root); //создать её.
            }

            $f_name = $request -> file('preview') -> getClientOriginalName();//определяем оригин.имя файла
            $request -> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку /images/articles/
            $all = $request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/images/articles/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            Article::create($all); //сохраняем массив в базу*/
        }
        else
        {
            //var_dump($request-> file('preview'));
            Article::create($request ->all()); // если картинка не передана, то сохраняем запрос
        }

        Session::flash('message', 'Товар сохранён!');
        return Redirect::to('/admin');

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
        $groups = Group::all(); //выбираем все группы
        return view('admin.articles.edit',['article'=>$article,'categories'=>$categories, 'groups' => $groups]);
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

        if($request->hasFile('preview')) //Проверяем была ли передана картинка
        {
            $root = public_path()."/images"; //Путь к папке 'image'
            $img_root = ($root.'/articles'); //Путь к папке с картинками для товара.

            if (!file_exists($img_root)) //Если такой папки нет, то
            {
                mkdir($img_root); //создать её.
            }

            $f_name = $request -> file('preview') -> getClientOriginalName();//определяем оригин.имя файла
            $request -> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку /images/articles/
            $all = $request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/images/articles/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            $article->update($all); //сохраняем массив в базу*/
        }
        else
        {
            //var_dump($request-> file('preview'));
            $article->update($request->all());// если картинка не передана, то сохраняем запрос
        }

        Session::flash('message', 'Товар изменён!');
        return Redirect::to('/admin');

    }

     public function destroy($id)
    {
        $Comms = Comment::with('article');
        $Comms -> delete();

        $article=Article::find($id);
        $disk = Storage::disk('my_public'); //Подключить диск (см. Filesystem.php)
        if ($disk -> exists($article -> preview)) //Проверка на существование
        {
            $disk->delete($article->preview); // Удалить файл изображения
        }
        $article->delete();


        Session::flash('message', 'Статья удалена!');
        return Redirect::to('/admin/articles');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        return view('admin.articles.delete', ['article' => $article]);

    }
}
