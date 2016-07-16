@extends('admin.main')
@section('content')
    <div class="container">
        <div class="col-md-7">

            <form role="form" method="POST" action="{{action('ArticlesController@update',['articles'=>$article->id])}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">

                <div class="row">
                    <div class="col-md-3 col-md-offset-6">
                        <label>Превью:</label>
                        @if(!empty($article->preview))
                            <img width=80 height=80 src="{{$article->preview}}" class="img-thumbnail">
                        @endif
                    </div>
                </div>
<br>
                    <div class="row">
                        <div class="col-md-6">
                            <label >Название Товара</label>
                            <input type="text" name = "title" value = "{{$article->title}}" class="form-control"><br>
                        </div>

                        <div class="col-md-6">
                            <label>Картинка</label>
                            <input type="file" name="preview" class="filestyle" data-buttonText=" Выбрать">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment">Описание:</label>
                        <textarea class="form-control" rows="5" name = "content"  id="comment">{{$article -> content}}</textarea>
                    </div>



                    <div class="row">
                        <div class="col-md-5">
                            <label for="category_id">Категория</label>

                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    {{--<option value="{{$category->id}}">{{$category->title}}</option>--}}
                                    @if($article->category_id==$category->id)
                                        <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="col-md-5">
                            <label for="group_id">Группа</label>
                            <select name="group_id" class="form-control">

                                @foreach($groups as $group)
                                    {{--<option value="{{$group->id}}">{{$group->title}}</option>--}}
                                    @if($article->group_id == $group -> id)
                                        <option value="{{$group -> id}}" selected>{{$group -> title}}</option>
                                    @else
                                        <option value="{{$group->id}}">{{$group->title}}</option>
                                    @endif
                                @endforeach

                            </select>

                        </div>



                        <div class="col-md-2">
                            <label >Цена</label>
                            <input type="text" name="cena" value = "{{$article-> cena}}" class="form-control"><br>
                        </div>

                    </div>


                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="comments_enable">Разрешить комментарии?</label>
                            <select name="comments_enable" class="form-control">
                               @if ($article -> comments_enable == 1)
                                <option value="1" selected >Да</option>
                                <option value="0">Нет</option>
                               @endif
                               @if ($article -> comments_enable <> 1 )
                                 <option value="1" >Да</option>
                                 <option value="0" selected >Нет</option>
                               @endif

                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Опубликовать?</label>
                            <select name="public" class="form-control">
                                @if ($article ->public == 1)
                                    <option value="1" selected >Да</option>
                                    <option value="0">Нет</option>
                                @endif
                                @if ($article ->public <> 1 )
                                    <option value="1" >Да</option>
                                    <option value="0" selected >Нет</option>
                                @endif

                            </select>
                        </div>

                    </div>


                    <h2>Мета</h2>


                    <label for="text">description:</label>
                    <input type="text" name="meta_description" value = "{{$article->meta_description}}" class="form-control"><br>

                    <label for="text">keywords:</label>
                    <input type="text" name="meta_keywords" value = "{{$article->meta_keywords}}" class="form-control"><br>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <input type="submit" value="Сохранить" class="btn btn-default">

                </form>
        </div>
    </div>

    @if(Session::has('message'))
        {{Session::get('message')}}
    @endif
@stop
