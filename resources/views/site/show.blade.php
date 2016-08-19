@extends('site.main')
@section('content')

    <!---------------------- Page Content ---------------------------->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="productbox">
                    <p class="lead">Категория</p>
                    <div class="text23 ul_cat">
                        <ul >
                            <div class="line_cat"></div>
                            @foreach ($categories as $category)
                                <li><a href="{{action('FrontController@sort',$category->id)}}" >{{$category->title}}</a></li>
                                <div class="line_cat"></div>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <br>

                <div class="how_bay"><p>Как купить?</p></div>

                <div class="time_frame">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge primary"><i class="step">1</i></div>
                            <div class="timeline-panel">
                                <p>Все просто: выбираете и покупаете через корзину</p>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge info"><i class="step">2</i></div>
                            <div class="timeline-panel">
                                <p>Наш сотрудник перезвонит для подтверждения заказа</p>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge warning"><i class="step">3</i></div>
                            <div class="timeline-panel">
                                <p>Оперативно упакуем и отправим заказ «Почтой России»</p>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge success"><i class="step">4</i></div>
                            <div class="timeline-panel">
                                <p>Оплата наличными через карту «ПриватБанка» или наложенным платежом</p>
                            </div>
                        </li>
                    </ul>
                </div>


                <br><a class="arrow_cart_2" href="{{action('FrontController@reset')}}">Очистить сессию</a>

            </div>


            <div class="col-md-9">
                {{-- Название товара --}}
                <div class="row">
                    <div class="producttitle_cap">{{$articles -> title}}</div>
                </div>

                <div class="row">
                    {{-- Картинка товара --}}
                    <div class="col-md-5" >
                        <div class="productbox">
                            <img src="{{asset($articles -> preview)}}" class="img-responsive">

                        </div>
                    </div>

                    {{-- Описание товара --}}
                    <div class="col-md-7">
                        <div class="productbox text25" style="padding-left: 15px;">
                            <p>Код: {{$articles -> id}}</p>
                            <div class="hor_line_11"></div>
                            <div class="pricetext">£ {{$articles -> cena}} <span class="text25"> (цену уточняйте)</span></div>
                            <div class="productprice_cap">
                                <div class="pull-left">
                                    <a href="{{action('FrontController@session',$articles -> id)}}" class="btn btn-success " role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a>
                                </div>
                            </div>

                            <div class="prim">
                                <a data-toggle="modal" href="#myModal_01">Условия оплаты и доставки</a>
                                <a href="#">График работы</a>
                                <a href="#">Адрес и контакты</a>
                                <a href="#">Условия возврата и обмена</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Подробное описание товара --}}
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-12">
                        <div class="context">{!! $articles -> content !!}</div>
                    </div>
                </div>
        </div>
    </div>
    </div>


    <!-- /.container -->



    <!-- Modal Categories Create -->
    <div id="myModal_01" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Условия оплаты и доставки</h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="col-xs-3">
                         <h5><b>Способы доставки</b></h5>
                            <ul style="list-style-image: url({{asset('images/frontsite/bird.jpg')}});">
                                <li>Доставка курьером</li>
                                <li>Доставка почтой</li>
                                <li>Транспортная компания</li>
                                <li>Самовывоз</li>
                            </ul>

                        </div>
                        <div class="col-xs-3">
                            <h5><b>Способы оплаты</b></h5>
                            <ul style="list-style-image: url({{asset('images/frontsite/bird.jpg')}});">
                                <li>Наличный расчёт</li>
                                <li>Перевод на карту банка</li>
                                <li>Наложенный платеж</li>
                                <li>Оплата картой Visa, Mastercard</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>


            </div>

        </div>
    </div>




@stop
