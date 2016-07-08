
@extends('admin.main')

@section('content')


    <table>
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Действие</td>
            <td>Действие</td>
        </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td> <a href="{{ route('adminzone.categories.edit', $category->id) }}">Изменить</a></td>
                    <td><a href="{{ route('categories.predelete', $category->id)}}">Удалить</a></td>
                </tr>
            @endforeach


    </table>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif

@stop