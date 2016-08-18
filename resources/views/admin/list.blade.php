@extends('admin.main')
@section('content')
    <div class="container">
        <div class="cap_order">
            Заказы
        </div>
        <table class="table table-striped"  id="token-keeper_9" data-token="{{ csrf_token() }}">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Контакты</th>
                <th>Доставка</th>
                <th>Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{$order-> id}}</td>
                    <td>{{$order -> name}}</td>
                    <td>{{$order -> phone}}</td>
                    <td>{{$order-> created_at -> Format('d-m-Y')}}</td>
                    <td>{{$order-> summa}}
                    <td>Действие</td>
                    <td>Действие</td>
                    <td>{{$order-> status}}</td>
                    {{--<td> <a href="{{action('FrontController@edit',['articles'=> $order -> id])}}">Изменить</a></td>--}}
                    <td><button onclick="{{$order->id}}"  class="btn pull-right list_order_delete btn-sm"><span class="glyphicon glyphicon-remove-sign"></span> Удалить
                        </button></td>


                </tr>
            @endforeach


            </tbody>
        </table>

    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif



@stop