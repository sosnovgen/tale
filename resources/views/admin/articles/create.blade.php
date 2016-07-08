@extends('admin.main')

@section('content')
    <div class="container">
     <div class="col-md-6">
        <form role="form"
        method="POST" action="{{action('ArticlesController@store')}}" enctype="multipart/form-data">

            <label for="file">Просмотр</label>
            <input type="file" name="preview" ><br>

            <label for="text">Название статьи</label>
            <input type="text" name="title" class="form-control"><br>

            Текст статьи:<br>
            <textarea name="content"></textarea><br>
        {{--<textarea name="content" id="editor"></textarea><br>--}}

            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control">

            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach

        </select>

        <br>

        <label for="comments_enable">Разрешить комментарии?</label>
        <select name="comments_enable" class="form-control">
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select>
            <br>

        <label for="public">Опубликовать?</label>
        <select name="public" class="form-control">
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select><br>

        <h2>Мета</h2>


        <label for="text">description:</label>
        <input type="text" name="meta_description" class="form-control"><br>

        <label for="text">keywords:</label>
        <input type="text" name="meta_keywords" class="form-control"><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="submit" value="Сохранить" class="btn btn-default">

    </form>
    </div>
    </div>
@stop
