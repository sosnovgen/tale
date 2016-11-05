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

                <div class="productbox">
                    <p class="lead">Контакты</p>
                    <div class = "ul_cat">
                        <div class="line_cat"></div>
                        <table style="margin: 8px 0 8px 0">
                            <tr><td class="pull-right"><strong>Телефон:</strong></td><td> &nbsp;+7(916) 089-20-45</td></tr>
                            <tr><td><strong></strong></td><td> &nbsp+7(916) 089-20-45 </td></tr>
                            <tr><td class="pull-right"><strong>E-mail:</strong></td><td>&nbsp;malleka@mail.ru</td></tr>
                            <tr><td class="pull-right"><strong>Skype:</strong></td><td> &nbsp;malleka_24</td></tr>
                            <tr><td class="pull-right"><strong>Адрес:</strong></td><td> &nbsp;метро "Бульвар </td></tr>
                            <tr><td class="pull-right"><strong></strong></td><td> &nbsp;Дмитрия Донского"</td></tr>
                        </table>
                    </div>
                </div>







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


                <div class="row text-center"><h3>Интернет-магазин продукции для ногтевого сервиса</h3></div>
                <hr>
                <div class="row">
                    <div class="center-block">
                        <img class="img-responsive" src="{{asset('images/frontsite/qwart.png')}}" />
                    </div>
                </div>
                <div class="one_text">
                    <p>Интернет-магазин предлагает продукцию M-in-M материалов для наращивания ногтей, производимую в Польше для стран
                        Европейского союза. Продукция высокого и стабильного качества, относительно недорогая.
                        <p><strong>У нас в ассортименте:</strong>
                    <p>праймеры, базовые гели, моделирующие гели, камуфлирующие гели, финишные гели, цветные гели, гель-лаки и жидкости для ногтей. <p>Ассортимент продукции M-in-M будет пополняться новыми гибридными позициями разных линий, производимых компанией Silcare.</p>
                    <p>Легкость в работе начинающим мастерам обеспечит свойство гелей не натекать на кутикулу! Мастерам-профессионалам будет легко моделировать ногтевую пластину без опила! С гелями M-in-M это возможно.!
                </div>


            </div>
        </div>
    </div>


@stop
