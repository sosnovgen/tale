@extends('site.main')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Товар</th>
                        <th></th>
                        <th>Кол.</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Всего</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-2">

                                {{--@if(!empty($article->preview))--}}
                                    <img width=80 height=80 src="http://placehold.it/320x240" alt="" class="img-thumbnail">
                                {{--@endif--}}
                        </td>

                        <td  class="col-md-6">
                                 <h4> <a href="#" style="text-align:left">Наименование товара</a></h4>
                        </td>

                        <td class="col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.87</strong></td>
                        <td class="col-md-1 text-center"><strong>$14.61</strong></td>
                        <td class="col-md-1">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Удалить
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Product name</a></h4>
                                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                    <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                                </div>
                            </div></td>
                        <td class="col-md-1" style="text-align: center">
                            <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                        </td>
                        <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        <td class="col-md-1">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button></td>
                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Всего</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Продолжить покупки
                            </button></td>
                        <td>
                            <button type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
