@extends('admin.main')

@section('content')
    <form method="POST" action="{{action('ArticlesController@destroy',['articles'=>$article->id])}}"/>
    Название статьи <br>
    <input type="text" name="title" value="{{$article->title}}"/><br>
    <input type="hidden" name="_method" value="delete"/>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit" value="Удалить">
    </form>
@stop