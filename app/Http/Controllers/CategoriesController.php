<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', ['categories' => $categories,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('preview')) //Проверяем была ли передана картинка 
        {
            $root = $_SERVER['DOCUMENT_ROOT']."/tale/public/images"; //Путь к папке 'image'
            $img_root = ($root.'/categories'); //Путь к папке с для категорий.

            if (!file_exists($img_root)) //Если такой папки нет, то
                {
                    mkdir($img_root); //создать её.
                }

            $f_name = $request -> file('preview') -> getClientOriginalName();//определяем оригин.имя файла
            $request -> file('preview') -> move($img_root,$f_name); //перемещаем файл в папку /images/categories/
            $all = $request -> all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/tale/public/images/categories/".$f_name;  // меняем значение preview на нашу ссылку, иначе в базу попадет что-то вроде /tmp/sdfWEsf.tmp

            Category::create($all); //сохраняем массив в базу*/
        }
        else
        {      
            //var_dump($request-> file('preview'));
            Category::create($request ->all()); // если картинка не передана, то сохраняем запрос
        }

        Session::flash('message', 'Категория сохранена!');
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
        $category=Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
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
        $category=Category::find($id);
        $category->update($request->all());
        $category->save();
        return back()->with('message','Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();

        Session::flash('message', 'Категория удалена!');
        return Redirect::to('/admin/categories');
    }
  
    public function delete($id)
    {
        $category = Category::find($id);
        return view('admin.categories.categories#myModal_2', ['category' => $category]);
        
    }

    /*Session::flash('message', 'Category was deleted');
     return redirect('/admin');*/


}
