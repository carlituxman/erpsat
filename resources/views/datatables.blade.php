@extends('layouts.base')

@section('content')

  {!! Datatable::table()
    ->addColumn('id','nombre')
    ->setUrl(route('test.datatables'))
    ->render() !!}

@stop