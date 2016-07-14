@extends('admin.main')
@section('content')

    <div class="container">
        <h2 class="page-header">Категории</h2>
        <table class="table table-striped" id="token-keeper" data-token="{{ csrf_token() }}">
            <thead>
            <tr>
                <th>id</th>
                <th>Миниатюра</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><img width=40 height=40 src="{{$category->preview}}"></td>
                        <td>{{$category->title}}</td>
                    {{--<td> <a href="{{ route('admin.categories.edit', $category->id) }}">Изменить</a></td>--}}
                    {{--<td><a href="{{ route('categories.predelete', $category->id)}}">Удалить</a></td>--}}
                        <td><a class="cat_link" href="{{$category->id}}" >Удалить</a></td>
                    </tr>
                @endforeach
            </tbody>

    </table>
<br>
        @if(Session::has('message'))
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> {{Session::get('message')}}.
            </div>
        @endif

    </div>

@stop

