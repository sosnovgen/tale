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




//----------------------- Admin ------------------------------
Route::group(['prefix'=>'admin'], function()

{
    //Route::get('/', 'GateController@index');


//-------------------------------------------------------
    Route::get('/test', function()
    {
        return view('admin.test');
        //return "Заглушка для admin страницы";
    });

//-------------------------------------------------------
    Route::get('/categories/{id}/delete',
        ['as' => 'categories.predelete',
         'uses' => 'CategoriesController@delete']);

    Route::get('/articles/{id}/delete',
        ['as' => 'articles.predelete',
         'uses' => 'ArticlesController@delete']);
    

//--------------------------------------------------------

    Route::delete('/cat/{id}',
    ['as' => 'cat',
     'uses' => 'CategoriesController@destroy']);

    Route::delete('/group/{id}',
        ['as' => 'group',
       'uses' => 'GroupsController@destroy']);

    Route::delete('/artic/{id}',
        ['as' => 'artic',
       'uses' => 'ArticlesController@destroy']);

//----------------------------------------------------------

    Route::get('/list','ListController@list_orders');
    Route::get('/edit/{id}','ListController@edit');
    
    Route::delete('/list/{id}',
        ['as' => 'list', 
       'uses' => 'ListController@destroy']);
    
    Route::get('/detals/{id}',
        ['as' => 'detals', 
       'uses' => 'ListController@detals']
        );
    Route::post('/detal_store/{id}','ListController@store');

    
//-------------------------- Site -----------------------------------
    Route::get('comments','CommentsController@show');
    Route::get('comments/delete/{id}','CommentsController@delete');
    Route::get('comments/published/{id}','CommentsController@published');

    Route::get('articlesort/{id}','ArticlesController@indexid');
    
    Route::resource('articles','ArticlesController');
    Route::resource('pages','PagesController');
    Route::resource('categories','CategoriesController');
    Route::resource('groups','GroupsController');

});

//-------------------------------------------------------- 
Route::post('del/{id}','FrontController@del');
Route::post('count/{id}/{kol}','FrontController@count');
Route::get('/page/{id}','FrontController@session');

Route::get('/reset','FrontController@reset');
Route::get('/order','FrontController@order');
Route::post('/store_order}','FrontController@store_order');

Route::get('/show/{id}','FrontController@show');
Route::get('/','FrontController@one');
Route::get('/search','FrontController@search');
Route::get('/assortiment','FrontController@index');
Route::get('/sort/{id}','FrontController@sort');

Route::get('/cart', function() { return view('site.cart'); });

Route::get('/about', function() { return view('site.about'); });
Route::get('/dostavka', function() { return view('site.dostavka'); });
Route::get('/contact', function() { return view('site.contact'); });
Route::get('/news','FrontController@news');

Route::get('/e-mail',
    [
        'as' => 'e-mail',
        'uses' => 'EmailController@send',
    ]);




//-----------------------------------------------------
Route::auth();
Route::get('/admin', 'HomeController@index');
