@extends('site.main')
@section('content')

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top text22" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Главная</a>
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

<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-md-2 productbox">
            <p class="lead">Категория</p>
            <div class="list-group text23">
                @foreach ($categories as $category)
                    <a href="#" class="list-group-item">{{$category->title}}</a>
                @endforeach

                {{--<a href="#" class="list-group-item">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>--}}
            </div>
        </div>
        <div class="col-md-1"></div>
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
                                <img class="slide-image" src="/tale/public/images/carousel/slide_1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="/tale/public/images/carousel/slide_2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="/tale/public/images/carousel/slide_3.jpg" alt="">
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
                    <img src="{{$article -> preview}}" class="img-responsive">
                    <div class="producttitle">{{$article -> title}}</div>
                    <div class="productprice"><div class="pull-right"><a href="{{action('FrontController@session',$article -> id,4)}}" class="btn btn-danger btn-sm " role="button">Корзина</a></div>
                    <div class="pricetext">£8.95</div></div>
                   </div>

                </div>
            @endforeach



{{--
            <div class="row">
                --}}{{-- Карточка товара --}}{{--
                @foreach ($articles as $article)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{$article -> preview}}">
                            <div class="caption" >
                                <h5>{{$article -> title}}</h5>
                                <h4 class="text-center">{{$article -> cena}} гр.</h4>
                                <button type="button" class="btn btn-default pull-right">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>--}}

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
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!------ Вывести выбранных товаров  ------->
@if (Session::has('sale'))
    {{var_dump(session('sale'))}}
@endif




@stop