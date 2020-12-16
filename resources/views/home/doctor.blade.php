@extends('layouts.page')

@section('title', 'Dashboard ')
@section('content_header')
    <h1 class="m-0 text-dark">Meus dados</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
    <div class="card col-lg-4 pt-2">
        <p>
            <b>Nome</b> : {{ $user->name }}
        </p>
        <p>
            <b>Email</b> : {{ $user->email }}
        </p>
        <p>
            <b>Contato : </b>{{ $user->phone }}
        </p>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

