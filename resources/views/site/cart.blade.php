@extends('site.main')
@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="outbor">
                <div class="cart-header">Корзина</div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">№</th>
                        <th></th>
                        <th class="text-center">Название</th>
                        <th>Цена</th>
                        <th>Кол.</th>
                        <th>Сумма</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $n = 0 //Вставить фрагмент кода на PHP ?>

                    @foreach($orders as $order)
                    <tr>
                        <td>{{$n =$n + 1}}</td>
                        <td><img width=40 height=40 src="{{$order -> preview}}"></td>
                        <td>{{$order -> title}}</td>
                        <td>{{$order -> cena}}</td>
                        <td class="input_44">
                          <input name="kol" id="in45" type="number" value="1" class="input_45">
                        </td>
                        <td>{{$order -> cena}}</td>
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

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!------ Вывести выбранных товаров  ------->
    @if (Session::has('sale'))
    {{var_dump(session('sale'))}}
    @endif

    @stop
