@extends('admin.main')

@section('content')
    <form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}"/>
    Название категории<br>
    <input type="text" name="title" value="{{$category->title}}"/><br>
    <input type="hidden" name="_method" value="delete"/>
    {{csrf_field()}}
    <input type="submit" value="Удалить">
    </form>
@stop