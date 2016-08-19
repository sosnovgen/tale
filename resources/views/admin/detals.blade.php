@extends('admin.main')
@section('content')
    <div class="container">
        <div class="col-md-7">

            <form role="form" method="POST" action="{{action('ListController@store',['order' => $order -> id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                <div class="cap_011">Заказ № {{$order -> id}}</div>

                <div class="row">
                    <div class="col-md-6">
                        <label >Имя заказчика</label>
                        <input type="text" name = "name" value = "{{$order -> name}}" class="form-control"><br>
                    </div>

                    <div class="col-md-6">
                        <label>Дата создания</label>
                        <input type="text" name="created_at" value = "{{$order -> created_at -> Format('d-m-Y')}}" class="form-control">
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

                <div class="cap_011">Состав заказа</div>



                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="Сохранить" class="btn btn-default">

            </form>
        </div>
    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
@stop