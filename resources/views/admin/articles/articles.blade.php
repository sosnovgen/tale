@extends('admin.main')
@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <div class="arrow_edit">
                    <img src="{{asset('images/frontsite/back_arrow.jpg')}}">
                    <a href="{{asset('admin')}}">Вернуться в Admin</a>
                </div>
            </div>

            <div class="col-md-6"></div>

        </div>

    <table class="table table-striped"  id="token-keeper_3" data-token="{{ csrf_token() }}">
        <thead>
            <tr>
                <th>id</th>
                <th>Миниатюра</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Группа</th>
                <th>Цена</th>
                <th>Действие</th>
                <th>Действие</th>
            </tr>
        </thead>
    <tbody>

    @foreach ($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td><img width=40 height=40 src="{{asset($article->preview)}}"></td>
                <td>{{$article -> title}}</td>
                <td>{{$article -> category -> title}}</td>
                <td>{{$article -> group -> title}}</td>
                <td>{{$article -> cena}}</td>
                <td> <a href="{{action('ArticlesController@edit',['articles'=>$article->id])}}">Изменить</a></td>
                <td><a class="art_del" href="{{$article->id}}">Удалить</a></td>

            </tr>
            @endforeach


    </tbody>
    </table>


    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif



@stop

