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

            {{------------------ Карусель --------------------}}

            <div class="col-md-9">
                <div class="row carousel-holder">

                    <div class="col-md-12 productbox">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="{{asset('images/carousel/slide_1.jpg')}}" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{asset('images/carousel/slide_2.jpg')}}" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{asset('images/carousel/slide_3.jpg')}}" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="cat_cap">
                      {{--{{ $pp }}--}}
                        @if(($articles->count() >0)&&($n >0))
                            {{$articles->first()->category->title}}
                        @endif
                    </div>
                </div>

                {{-- Карточка товара --}}
                @foreach ($articles as $article)
                    <div class="col-md-4" >
                        <div class="productbox text23">
                            <a href="{{action('FrontController@show',$article->id)}}"><img src="{{asset($article -> preview)}}" class="img-responsive"></a>
                            <div class="producttitle">{{$article -> title}}</div>
                            <div class="productprice"><div class="pull-right"><a href="{{action('FrontController@session',$article -> id)}}" class="btn btn-success btn-sm " role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</a></div>
                            <div class="pricetext">£ {{$article -> cena}}</div></div>
                        </div>

                    </div>
                @endforeach



            </div>
        </div>
    </div>


    <!-- /.container -->



@stop