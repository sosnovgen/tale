@extends('admin.main')
@section('content')

    @if (Session::has('sale'))
        {{var_dump(session('sale'))}}
    @endif

@stop
