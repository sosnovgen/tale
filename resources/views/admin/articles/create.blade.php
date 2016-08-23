@extends('admin.main')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <div class="arrow_edit">
                    <img src="{{asset('images/frontsite/back_arrow.jpg')}}">
                    <a href="{{asset('admin')}}">Вернуться в Admin</a>
                </div>
            </div>

            <div class="col-md-6"></div>

        </div>

        <div class="col-md-7">
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

        <div class="col-md-5">
            <div class="lesson_01">
                <h4>Как добавить новый товар</h4>
              1. Перед тем, как добавить новый товар, убедитесь, что он входит в существующую категорию. Если её нет, её надо создать.
              <br><br>
                2. Иконки товара (картинки) перед выгрузкой на сайт должны быть подготовлены и соответствовать следующим требованиям:
                <br><br>
                <div style="padding-left: 32px">а) Размер по высоте или ширине не меньше 300 px и не больше 800 px.</div>
                <br>
                <div style="padding-left: 32px">б) Все картинки должны иметь одинаковое соотношение высоты и ширины (приблизительно), например: 300Х300, 400Х400, 350Х350.</div>

                <br><br>
                3. Описание товара товара не должно превышать 180 слов.
                <br><br>
                4. Поля "Мета description:" и "Мета keywords:" заполните ключевыми словами, характеризующими  данный товар. Нужно для продвижения сайта.
                <br><br>
                5. Ошибки заполнения можно будет в дальнейшем отредактировать.

            </div>
        </div>

    </div>


@stop
