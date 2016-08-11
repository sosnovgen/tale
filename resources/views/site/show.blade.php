@extends('site.main')
@section('content')

    <!---------------------- Page Content ---------------------------->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="productbox">
                    <p class="lead">Категория</p>
                    <div class="text23">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <a href="{{action('FrontController@sort',$category->id)}}" class="list-group-item"><p>{{$category->title}}</p></a>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <br>

                <div class="lead"><p>Как купить?</p></div>
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
                                <p>Оперативно упакуем и отправим заказ «Новой Почтой»</p>
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
                        <p>Цену уточняйте</p>
                        <div class="pull-left"><a href="{{action('FrontController@session',$articles -> id)}}" class="btn btn-success" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></div>
                <br>
                    </div>


            </div>
        </div>
    </div>
    </div>


    <!-- /.container -->



@stop
