@extends('admin.main')
@section('content')

    <div class="container">
        <h2 class="page-header">Группы</h2>
        <table class="table table-striped" id="token-keeper_2" data-token="{{ csrf_token() }}">
            <thead>
            <tr>
                <th>id</th>
                <th>Миниатюра</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($groups as $group)
                <tr>
                    <td>{{$group->id}}</td>
                    <td><img width=40 height=40 src="{{$group->preview}}"></td>
                    <td >{{$group->title}}</td>
                    <td><a class="dig" href="{{$group->id}}" >Удалить</a></td>
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
