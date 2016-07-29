@extends('site.main')
@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="outbor">
                <div class="cart-header">Корзина</div>
                <table class="table table-striped" id="token-keeper_4" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>ID</th>
                        <th></th>
                        <th class="text-center">Название</th>
                        <th>Цена</th>
                        <th>Кол.</th>
                        <th>Сумма</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $n = 0; //Вставить фрагмент кода на PHP

                    ?>

                    @foreach($orders as $order)
                    <tr>
                        <td>{{$n =$n + 1}}</td>
                        <td>{{$order -> id}}</td>
                        <td><img width=40 height=40 src="{{$order -> preview}}"></td>
                        <td>{{$order -> title}}</td>
                        <td>{{$order -> cena}}</td>
                        <td class="input_44">
                          <input name="kol" id="in45" type="number" value="{{session('sale.'.$order -> id)}}" class="input_45">
                        </td>
                        <td class="summ_row">{{$order -> cena}}</td>
                        <td>
                            <button class="btn  btn-secondary btn-sm"><span
                                        class="glyphicon glyphicon-remove-sign"></span> Удалить
                            </button>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="hor_line_10"></div>



                <div class="summ">
                    <div class="row">
                        <div class="col-md-4">

                        <div class="arrow_cart"><a href="javascript:history.back();">Продолжить покупки</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="price_order">Стоимость заказа<span id="price_summ"></span></div>
                        </div>
                        <div class="col-md-4">
                            <div id="butt" class="pull-right but_order"><a href="#" class="btn btn-info " role="button">Оформить заказ</a></div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


    @if(Session::has('error'))
    {{Session::get('error')}}
    @endif



    <!------ Вывести выбранных товаров  ------->
    @if (Session::has('sale'))
    {{var_dump(session('sale'))}}
    @endif

    @stop
