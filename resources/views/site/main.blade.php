<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
    <title>shop</title>

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
                    <a href="{{asset('/about')}}">О нас</a>
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

<div id="content">
    @yield('content')
</div>

</body>
</html>