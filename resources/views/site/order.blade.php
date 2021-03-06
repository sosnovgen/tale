@extends('site.main')
@section('content')

    <div class="container" style="margin-top: 70px;">
        <div class="col-md-6 col-md-offset-3">

            <!------ Вывод ошибки незаполнения полей  ------->
            @if(Session::has('error'))
                <br>
                <div class="alert alert-danger" style="width: 40%;" ><span class = "glyphicon glyphicon glyphicon-question-sign"></span>
                    {{Session::get('error')}}
                </div>
                <br>
            @endif


            <form role="form"  method="POST" action="{{action('FrontController@store_order')}}" enctype="multipart/form-data">
                <div class="row outbor">
                    <div class="cart-header">Оформление заказа</div>

                    <div class="col-md-1  icon">
                        <img src="{{asset('images/frontsite/icon.jpg')}}">
                    </div>

                    <div class="col-md-6">
                        <div style="padding-left: 8px;">
                            <div class="kontact">Контактные данные</div>
                            <br>
                            <div class="input_pole">
                                <label >Фамилия, Имя *</label>
                                <input type="text" name="name" class="form-control"><br>
                            </div>

                            <div class="input_pole">
                                <label >Номер телефона *</label>
                                <input type="text" name="phone" class="form-control"><br>
                            </div>

                            <div class="input_pole">
                                <label >Адрес доставки *</label>
                                <input type="text" name="city" class="form-control"><br>
                            </div>

                            <div class="input_pole">
                                <label>Коментарий к заказу</label>
                                <textarea class="form-control" rows="5" name ="comment"></textarea>
                            </div>
                            <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="status" value="Новый">

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="text24"><img src="{{asset('images/frontsite/phone_green.jpg')}}"class="icon_tel">
                            После получения заказа, с вами свяжутся и уточнят способ доставки и оплаты товара.
                        </div>
                    </div>
                </div>

                <div class="hor_line_12"></div>

                <div class="row outbor">
                    <div class="col-md-7">
                        <br>
                        <div class="arrow_edit">
                            <img src="{{asset('images/frontsite/back_arrow.jpg')}}">
                            <a href="{{asset('/assortiment')}}">Вернуться назад</a>
                        </div>
                    </div>
                    <div class="col-md-5 but_order">
                        <input type="submit" value="Подтвердить заказ" class="btn btn-info pull-right" >
                    </div>
                    <br>
                </div>

            </form>

        </div>
    </div>

    <br>


{{--


   <!------ Вывод выбранных товаров  ------->
    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}
    @endif
--}}


@stop