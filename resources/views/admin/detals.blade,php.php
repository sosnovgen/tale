@extends('admin.main')
@section('content')
<div class="container">
    <div class="col-md-7">
        <form role="form"
              method="POST" action="{{action('ListController@store')}}" enctype="multipart/form-data">

            {{--<label for="file">Просмотр</label>
            <input type="file" name="preview" ><br>--}}
            <div class="row">
                <div class="col-md-6">
                    <label >Название Товара</label>
                    <input type="text" name="title" class="form-control"><br>
                </div>

                <div class="col-md-6">
                    <label>Картинка</label>
                    <input type="file" name="preview" class="filestyle" data-buttonText=" Выбрать">

                </div>
            </div>

            <div class="form-group">
                <label for="comment">Описание:</label>
                <textarea class="form-control" rows="5" id="editor" name ="content"></textarea>
            </div>

            <br><br>

            <div class="row">
                <div class="col-md-5">
                    <label for="category_id">Категория</label>
                    <select name="category_id" class="form-control">

                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-5">
                    <label for="group_id">Группа</label>
                    <select name="group_id" class="form-control">

                        @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->title}}</option>
                        @endforeach

                    </select>

                </div>



                <div class="col-md-2">
                    <label >Цена</label>
                    <input type="text" name="cena" class="form-control"><br>
                </div>

            </div>


            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="comments_enable">Разрешить комментарии?</label>
                    <select name="comments_enable" class="form-control">
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="public">Опубликовать?</label>
                    <select name="public" class="form-control">
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
            </div>


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