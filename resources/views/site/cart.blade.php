@extends('site.main')
@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
             <div class="outbor">
                <div class="cart-header">Корзина</div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th></th>
                        <th>Кол.</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Всего</th>
                        <th> </th>
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
                                <div >
                                <input name="kol" id="in45" type="number" value = "1" class="input_45">
                                </div>
                            </td>
                            <td>1</td>
                            <td><button type="submit" class="btn  btn-secondary btn-sm"><span class="glyphicon glyphicon-remove-sign"></span> Удалить</button></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                 <br>
                 <hr>
             </div>

        </div>

    </div>

@stop
