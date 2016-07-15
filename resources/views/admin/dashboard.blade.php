@extends('admin.main')
@section('content')

<div class="container">
   <div class="col-md-4">
    <h2>Ассортимент</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{action('ArticlesController@index')}}" >Все товары</a></li>
            <li class="list-group-item"><a href="{{route('admin.articles.create')}}" >Добавить товар</a></li>
        </ul>

    <h2>Категории</h2>
        <ul class="list-group">
            <li  class="list-group-item"><a href="{{action('CategoriesController@index')}}">Все категории</a></li>
            {{--<li  class="list-group-item"><a href="{{route('admin.categories.create')}}" >Добавить категорию</a></li>--}}
            <li  class="list-group-item"><a data-toggle="modal" href="#myModal">Добавить категорию</a></li>

        </ul>

    <h2>Группа</h2>
    <ul class="list-group">
        <li  class="list-group-item"><a href="{{action('GroupsController@index')}}">Все группы</a></li>
        {{--<li  class="list-group-item"><a href="{{route('admin.categories.create')}}" >Добавить группу</a></li>--}}
        <li  class="list-group-item"><a data-toggle="modal" href="#myModal_2">Добавить группу</a></li>
    </ul>

    <h2>Отзывы</h2>
        <ul class="list-group">
            <li  class="list-group-item"><a href="{{action('CommentsController@show')}}" >Все комментарии</a></li>
        </ul>
    <ul>
            <h2>Страницы</h2>
    </ul>
<br>
       @if(Session::has('message'))
           <div class="alert alert-info fade in">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong>Success!</strong> {{Session::get('message')}}.
           </div>
       @endif

</div>
</div>


<!-- Modal Categories Create -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Создать категорию</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{action('CategoriesController@store')}}" class="form-group" enctype="multipart/form-data"/>
                      <div class="col-xs-4">
                        <label for="ex3">Название категории</label>
                        <input class="form-control" name="title" id="ex3" type="text">
                        <br>

                        <label for="ex4">Картинка</label>
                        <input type="file" name="preview" class="filestyle" data-buttonText=" Выбрать">
                        {{--@include('admin.upload')--}}

                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                      </div>
                </div>
            </div>
        <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Сохранить</button>
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
            </form>

        </div>

    </div>
</div>


<!-- Modal Groups Create -->
<div id="myModal_2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Создать группу</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{action('GroupsController@store')}}" class="form-group" enctype="multipart/form-data"/>
                    <div class="col-xs-4">
                        <label for="ex5">Название категории</label>
                        <input class="form-control" name="title" id="ex5" type="text">
                        <br>

                        <label>Картинка</label>
                        <input type="file" name="preview" class="filestyle" data-buttonText=" Выбрать">
                        {{--@include('admin.upload')--}}

                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Сохранить</button>
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            </div>
            </form>

        </div>

    </div>
</div>


@stop

