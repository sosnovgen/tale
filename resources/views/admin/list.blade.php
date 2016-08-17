@extends('admin.main')
@section('content')
    <div class="container">
        <table class="table table-striped"  id="token-keeper_7" data-token="{{ csrf_token() }}">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Статус</th>
                <th>Действие</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{$order-> id}}</td>
                    <td>{{$order -> name}}</td>
                    <td>{{$order -> phone}}</td>
                    <td>{{$order-> created_at}}</td>
                    <td>{{$order-> summa}}
                    <td>{{$order-> status}}</td>
                    <td> <a href="{{action('FrontController@edit',['articles'=> $order -> id])}}">Изменить</a></td>
                    <td><a class="art_del" href="{{$order->id}}">Удалить</a></td>

                </tr>
            @endforeach


            </tbody>
        </table>

    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif



@stop