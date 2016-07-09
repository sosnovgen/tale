@extends('admin.main')
@section('content')

<div class="container">
   <div class="col-md-4">
    <h2>Ассортимент</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{action('ArticlesController@index')}}" >Все статьи</a></li>
            <li class="list-group-item"><a href="{{route('admin.articles.create')}}" >Добавить статью</a></li>
        </ul>

    <h2>Категории</h2>
        <ul class="list-group">
            <li  class="list-group-item"><a href="{{action('CategoriesController@index')}}">Все категории</a></li>
            <li  class="list-group-item"><a href="{{route('admin.categories.create')}}" >Добавить категорию</a></li>
        </ul>

    <h2>Группа</h2>
    <ul class="list-group">
        <li  class="list-group-item"><a href="{{action('CategoriesController@index')}}">Все категории</a></li>
        <li  class="list-group-item"><a href="{{route('admin.categories.create')}}" >Добавить категорию</a></li>
    </ul>

    <h2>Отзывы</h2>
        <ul class="list-group">
            <li  class="list-group-item"><a href="{{action('CommentsController@show')}}" >Все комментарии</a></li>
        </ul>
    <ul>
            <h2>Страницы</h2>
    </ul>

</div>
</div>


@if(Session::has('message'))
    {{Session::get('message')}}
@endif

@stop

