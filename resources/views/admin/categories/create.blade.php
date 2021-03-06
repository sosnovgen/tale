@extends('admin.main')
@section('content')

    <div class="container">
     <form method="POST" action="{{action('CategoriesController@store')}}" class="form-group" enctype="multipart/form-data"/>
        <div class="col-xs-4">
            <label for="ex3">Название категории</label>
            <input class="form-control" name="title" id="ex3" type="text">
            <br>

            <label for="ex4">Картинка</label>
            <input type="file" name="preview" >
            {{--@include('admin.upload')--}}

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <br>
            <button type="submit" class="btn btn-default">Сохранить</button>

        </div>

        @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
    </form>
    </div>
@stop