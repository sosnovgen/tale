@extends('site.main')
@section('content')

    <div class="container" style="margin-top: 80px;">
        <div class="row">

            <div class="col-md-6">
                <div class="row">

                    <div class="col-xs-6 text28 ">
                        <h3><b>Способы доставки</b></h3>
                        <ul style="list-style-image: url({{asset('images/frontsite/bird_gray.jpg')}});">
                            <li>Доставка курьером (350 р.)</li>
                            <li>Доставка "Почта России"</li>
                            <li>Транспортная компания</li>
                            <li>Самовывоз</li>
                        </ul>

                    </div>
                    <div class="col-xs-6 text28">
                        <h3><b>Способы оплаты</b></h3>
                        <ul style="list-style-image: url({{asset('images/frontsite/bird_gray.jpg')}});">
                            <li>Наличный расчёт</li>
                            <li>Перевод на карту банка</li>
                            <li>Наложенный платеж</li>
                            <li>Оплата картой Visa, Mastercard</li>
                        </ul>

                    </div>

                </div>
<br>
                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <small>В примечании к заказу укажите способ доставки и оплаты.</small></p>


            </div>



            <div class="col-md-6">
                <div class="post_about">
                    <img src="{{asset('images/frontsite/post.jpg')}}" class="img-responsive" />
                </div>
            </div>

        </div>

    </div>

@stop