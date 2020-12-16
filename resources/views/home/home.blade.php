@extends('layouts.page')

@section('title', 'Dashboard ')
@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">

    <div class="row col-lg-12 col-sm-12">
        <div class="card text-white bg-gradient-lightblue mb-3 col-lg-3 col-sm-12 mr-1">
            <div class="card-header center">Quantidade de médicos</div>
            <div class="card-body center">
                <h5 class="card-title"> {{ $doctors }} </h5>
            </div>
        </div>
        <div class="card text-white bg-info mb-3 col-lg-3 col-sm-12">
            <div class="card-header center">Quantidade de pacientes</div>
            <div class="card-body center">
                <h5 class="card-title"> {{ $patients }} </h5>
            </div>
        </div>
    </div>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

