@extends('admin.main')
@section('content')
<br>
    <table class="table table-striped" >
           <tbody>

        @foreach($products as $product)
            <tr>

                <td>{{$product -> id}}</td>
                <td>{{$product -> order_id}}</td>
                <td>{{$product -> title}}</td>
                <td>{{$product -> cena}}</td>
                <td>{{$product -> kol}}</td>

            </tr>
        @endforeach

        </tbody>
    </table>

<br>

{{'O.K.'}}


@stop
