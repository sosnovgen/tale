@extends('admin.main')
@section('content')

    <?php   $m = "\'sale.";
    $b = "$order -> id\'";
    $a = $m.$b;
    ?>

    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}

        {{session('sale.16')}}

    @endif

@stop
