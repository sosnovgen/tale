@extends('site.main')
@section('content')
    <link href='https://fonts.googleapis.com/css?family=Arimo&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <div class="row">
        <div class="col-md-4">
            <img  class="logo_img" src="{{asset('images/frontsite/logo.jpg')}}" class="img-responsive">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="telepfon_frame">
                <div class="telephon_img">
                    <img src="{{asset('images/frontsite/phone.png')}}" class="img-responsive ">
                </div>
                <div class="telephon_text">+380 (98) 5646789</div>
            </div>

            <div class="input-group stylish-input-group input-width">
                <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
        </div>

    </div>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-custom1 text22" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{asset('')}}">Главная</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">О нас</a>
                </li>
                <li>
                    <a href="#">Товары</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
                <li>
                    <a href="#">Доставка и оплата</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

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

                {{-- Карточка товара --}}
                @foreach ($articles as $article)
                    <div class="col-md-4" >
                        <div class="productbox text23">
                            <img src="{{asset($article -> preview)}}" class="img-responsive">
                            <div class="producttitle">{{$article -> title}}</div>
                            <div class="productprice"><div class="pull-right"><a href="{{action('FrontController@session',$article -> id)}}" class="btn btn-danger btn-sm " role="button">Корзина</a></div>
                                <div class="pricetext">£8.95</div></div>
                        </div>

                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->


    {{--

    <!------ Вывести выбранных товаров  ------- --}}
    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}
    @endif

    @if (Session::has('counter'))
        {{session('counter')}}
    @endif



@stop