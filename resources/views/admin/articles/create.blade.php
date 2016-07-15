@extends('admin.main')

@section('content')
    <div class="container">
     <div class="col-md-6">
        <form role="form"
            method="POST" action="{{action('ArticlesController@store')}}" enctype="multipart/form-data">

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
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label for="category_id">Категория</label>
                    <select name="category_id" class="form-control">

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <label for="group_id">Группа</label>
                    <select name="group_id" class="form-control">

                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->title}}</option>
                        @endforeach

                    </select>

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
