<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
@section('title')
    <title>Продукция для ногтевого сервиса</title>
    <meta name="description" content="Материалы для наращивания ногтей, гелевым методом и методом файберглас, скидки,дешево,гель для наращивания ногтей,гель Silcare,гель-лак,лак для ногтей,купить гель для ногтей,не дорогой гель для ногтей, все для наращивания ногтей, курсы по наращиванию ногтей, школа по маникюру, школа по педикюру, художественное оформление бровей и ресниц, наращивание ресниц">
    <meta name="keywords" content= "Наращивание ногтей гелевым методом и методом файберглас, парикмахерские услуги, педикюр, маникюр, классический, европейский, горячий, SPA-процедуры, парафинотерапия, макияж (дневной, вечерний, свадебный, креативный с элементами художественной росписи), художественное оформление бровей и ресниц, наращивание ресниц, Тurbo солярий, студия красоты Лаки, диплом европейского примера, европейский диплом, диплом по наращиванию ногтей, обучение методам наращивания ногтей, открыть студию красоты, открыть салон красоты, собственный бизнес, индустрия моды и красоты">
    <meta name="revisit" content="3 days" />
    <meta name="revisit-after" content="3 days" />
    <meta name="robots" content="noindex,follow" />
 @show

    <link rel="shortcut icon" href="{{asset('images/frontsite/icon_logo_16.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/shop-homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('js/tale.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
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
            <div class="telephon_text">+38 (916) 089-20-45</div>
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
                    <a href="{{asset('/about')}}">О нас</a>
                </li>
                <li>
                    <a href="{{asset('/assortiment')}}">Товары</a>
                </li>
                <li>
                    <a href="#">Новинка</a>
                </li>
                <li>
                    <a href="#">Распродажа</a>
                </li>
                <li>
                    <a href="{{asset('/contact')}}">Контакты</a>
                </li>
                <li>
                    <a href="{{asset('/dostavka')}}">Доставка и оплата</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div id="content">
    @yield('content')
</div>

{{-- footer --}}
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5 widget">
                <h2>О магазине</h2>
                <article class="widget_content">
                    <ul>
                        <li>Продукция высокого качества</li>
                        <li>Широкий ассортимент</li>
                        <li>Постоянные поставки</li>
                        <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae </li>
                        <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</li>
                    </ul>
                </article>
            </div>
            <div class="col-md-3 widget">
                <h2>Ссылки</h2>
                <article class="widget_content">
                    <ul>
                        <li>Bootsnipp</li>
                        <li>Get Bootstrap</li>
                        <li>My BLog</li>
                        <li>Facebook</li>
                        <li>Follow me</li>
                    </ul>
                </article>
            </div>
            <div class="col-md-4 widget">
                <h2>Контакты</h2>
                <article class="widget_content">
                    <p>Jl. Lingkar Selatan, Kasihan, Bantul<br> Yogyakarta Indonesia 55183<br>Phone: +62 274 387656</p>
                </article>
            </div>
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 widget">© 2016 | Created YourWebSite <span class="pull-right">Minimize your browser »</span>
            </div>
        </div>
    </div>
</div>



{{--

    <!------ Вывести выбранных товаров  ------- --}}{{--

    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}
    @endif

    @if (Session::has('counter'))
        {{session('counter')}}
    @endif

--}}


</body>
</html>