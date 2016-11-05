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


    public function index()
    {
        $articles = Article::orderBy('title') -> paginate(8);
        $links = str_replace('/?', '?', $articles->render());
        $categories = Category::all();
        $groups = Group::all();
        $sort = 0;

        return view('admin.articles.articles',
           [
            'articles' => $articles,
            'categories' => $categories,
            'groups' => $groups,
            'sort' => $sort,
            'links' => $links,
           ]);
    }

    public function indexid($id)
    {
        $articles = Article::where('category_id','=',$id) -> orderBy('title') -> paginate(8);
        $links = str_replace('/?', '?', $articles->render());
        $categories = Category::all();
        $groups = Group::all();
        $sort = 1;

        return view('admin.articles.articles',
            [
                'articles' => $articles,
                'categories' => $categories,
                'groups' => $groups,
                'sort' => $sort,
                'links' => $links,
            ]);
    }


    public function create()
    {
        $categories = Category::all() -> sortBy('title'); //выбираем все категории
        $groups = Group::all(); //выбираем все группы
        return view('admin.articles.create', ['categories' => $categories], ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('preview')) {
            $img_root = 'images/articles';

            $fileName = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($img_root, $fileName);

            $img = Image::make('images/articles/'. $fileName);
            $img->resize(300, 300);
            $img->save('images/articles/'. $fileName);

            $all = $request->all();
            $all['preview'] = "/images/articles/" . $fileName;

            Article::create($all);
        } else {
            $all = $request->all();
            $all['preview'] = "placehold.it";
            Article::create($all);
        }

        Session::flash('message', 'Товар сохранен!');
        return Redirect::to('/admin');

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id); //выбираем овар для редактирования
        $categories = Category::all() -> sortBy('title'); // выбираем все категории
        $groups = Group::all(); //выбираем все группы
        return view('admin.articles.edit', ['article' => $article, 'categories' => $categories, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        if ($request->hasFile('preview')) {
            $img_root = 'images/articles';

            $fileName = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($img_root, $fileName);

            $img = Image::make('images/articles/'. $fileName);
            $img->resize(300, 300);
            $img->save('images/articles/'. $fileName);

            $all = $request->all();
            $all['preview'] = "/images/articles/" . $fileName;

            $article->update($all);

        } else {
            $all = $request->all();
            //  $all['preview']= "placehold.it";
            $article->update($all);
        }
        Session::flash('message', 'Товар изменён!');
        return Redirect::to('/admin');


    }

    public function destroy($id)
    {
        $Comms = Comment::with('article');
        $Comms->delete();

        $article = Article::find($id);

        $fileName = ($article->preview);
        $fileName = mb_substr($fileName, 1);
        if (is_file($fileName)) {
            unlink($fileName);
        }

        $article->delete();


        Session::flash('message', 'Товар удален!');
        return Redirect::to('/admin/articles');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        return view('admin.articles.delete', ['article' => $article]);

    }
}
