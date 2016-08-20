@extends('admin.main')
@section('content')
    <div class="container">
        <div class="col-md-7">

            <form role="form" method="POST" action="{{action('ListController@store',['order' => $order -> id])}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="cap_011">Заказ № {{$order -> id}}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="arrow_detals">
                            <img src="{{asset('images/frontsite/back_arrow.jpg')}}">
                            <a href="javascript:history.back();">Вернуться к списку заказов</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label >Имя заказчика</label>
                        <input type="text" name = "name" value = "{{$order -> name}}" class="form-control"><br>
                    </div>

                    <div class="col-md-3">
                        <label>Дата создания</label>
                        <input type="text" name="created_at" value = "{{$order -> created_at -> Format('d-m-Y')}}" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Сумма</label>
                        <input type="text" name="created_at" value = "{{$order -> summa}}" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Адрес доставки</label>
                        <input type="text" name="city" value = "{{$order -> city}}" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label >Телефон</label>
                        <input type="text" name = "phone" value = "{{$order -> phone}}" class="form-control"><br>
                    </div>

                    <div class="col-md-3">
                        <label >Статус</label>

                        <select name="status" class="form-control">
                            @foreach($status as $stat)
                                @if($stat == $order -> status)
                                    <option value="{{$stat}}" selected>{{$stat}}</option>
                                @else
                                    <option value="{{$stat}}">{{$stat}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label for="comment">Коментарии к заказу:</label>
                    <textarea class="form-control" rows="5" name ="comment">{{$order -> comment}}</textarea>
                </div>

                <div class="cap_012">Состав заказа</div>
                <table class="table table-bordered" id="token-keeper_12" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr class="">
                        <th>ID</th>
                        <th class="text-center">Название</th>
                        <th>Цена</th>
                        <th>Кол.</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>

                            <td>{{$product -> id}}</td>
                            <td>{{$product -> title}}</td>
                            <td>{{$product -> cena}}</td>
                            <td>{{$product -> count}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text25">Стоимость заказа: <span class ="text26">{{$order -> summa}}</span></div>
                <br><br><br>

                <input type="submit"  value="Сохранить" class="btn btn-info " >

            </form>
        </div>
    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
@stop