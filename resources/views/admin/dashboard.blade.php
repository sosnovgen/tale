@extends('admin.main')
@section('content')

<div class="container">
    <h2>Статьи</h2>
        <div class="list-group">
            <a href="{{action('ArticlesController@index')}}" class="list-group-item">Все статьи</a>
            <a href="{{route('adminzone.articles.create')}}" class="list-group-item">Добавить статью</a>
        </div>
    <h2>Категории</h2>
        <div class="list-group">
            <a href="{{action('CategoriesController@index')}}" class="list-group-item">Все категории</a>
            <a href="{{route('adminzone.categories.create')}}" class="list-group-item">Добавить категорию</a>
        </div>
    <h2>Комментарии</h2>
        <div class="list-group">
            <a href="{{action('CommentsController@show')}}" class="list-group-item">Все комментарии</a>
        </div>
    <ul>
            <h2>Страницы</h2>
    </ul>
</div>


@if(Session::has('message'))
    {{Session::get('message')}}
@endif

@stop

