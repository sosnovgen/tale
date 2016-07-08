<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'], function()

{
    Route::get('/', function()
    {
        return view('admin.dashboard');
        //return "Заглушка для admin страницы";
    });

    Route::get('/test', function()
    {
        return view('admin.test');
        //return "Заглушка для admin страницы";
    });

    Route::get('/categories/{id}/delete',
        ['as' => 'categories.predelete',
            'uses' => 'CategoriesController@delete']);

    Route::get('/articles/{id}/delete',
        ['as' => 'articles.predelete',
            'uses' => 'ArticlesController@delete']);

    Route::get('comments','CommentsController@show');
    Route::get('comments/delete/{id}','CommentsController@delete');
    Route::get('comments/published/{id}','CommentsController@published');

    Route::resource('articles','ArticlesController');
    Route::resource('pages','PagesController');
    Route::resource('categories','CategoriesController');

});