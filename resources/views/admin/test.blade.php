@extends('admin.main')
@section('content')

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@stop
