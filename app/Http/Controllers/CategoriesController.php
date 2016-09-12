<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Redirect;
use Storage;
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
        $categories = Category::all() -> sortBy('title');
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
        if($request->hasFile('preview')) {
            $img_root = 'images/categories';

            $fileName = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($img_root, $fileName);

            $all = $request->all();
            $all['preview'] = "/images/categories/" . $fileName;

            Category::create($all);
        } else {
            $all = $request->all();
            $all['preview']= "placehold.it";
            Category::create($all);
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

        $fileName = ($category -> preview);
        $fileName = mb_substr($fileName,1);
        if (is_file($fileName))
        {
        unlink($fileName);  
        }

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
