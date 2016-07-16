@extends('admin.main')
@section('content')
    <div class="container">
    <table class="table table-striped">
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
                <td><img width=40 height=40 src="{{$article->preview}}"></td>
                <td>{{$article -> title}}</td>
                {{--<td>{{$categories -> get($article->category_id) }}</td>--}}
                <td>{{$article -> category -> title}}</td>
                <td>{{$article -> group -> title}}</td>
                <td>{{$article -> cena}}</td>
                <td> <a href="{{action('ArticlesController@edit',['articles'=>$article->id])}}">Изменить</a></td>
                <td><a href="{{ route('articles.predelete', $article->id)}}">Удалить</a></td>

            </tr>
            @endforeach


    </tbody>
    </table>


    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
@stop

