@extends('site.main')
@section('content')

    <div class="container" style="margin-top: 70px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="outbor">
                <div class="cart-header">Оформление заказа</div>
                <div class="col-md-2 icon">
                    <img src="images/frontsite/icon.jpg">
                </div>
                <div class="col-md-6">
                    <form >
                        <div class="kontact">Контактные данные</div>




                    </form>

                </div>
                <div class="col-md-4">

                </div>











            </div>
        </div>
    </div>












    <!------ Вывод выбранных товаров  ------->
    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}
    @endif


@stop