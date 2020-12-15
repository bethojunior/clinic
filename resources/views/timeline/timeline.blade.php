
@extends('layouts.page')
@section('title', 'Listagem de usuários ')
@section('content_header')
    <h1 class="m-0 text-dark">Ficha do(a) paciente {{ $data[0]['user'][0]['name'] }}</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row col-lg-12 col-sm-12">
        @foreach($data as $content)
            <div class="card col-sm-12 col-lg-12 pt-2">
{{--                <p>--}}
{{--                    Paciente : {{ $content->user[0]['name'] }}--}}
{{--                </p>--}}
                <p>
                    Data : {{ Carbon\Carbon::parse($content->created_at)->format('d/m/Y - H:m:s')  }} hrs
                </p>
                <p>
                    Médico : {{ $content->whoInserted[0]['name'] }}
                </p>
                <p>
                    Titulo : {{ $content->title }}
                </p>
                <p>
                    Razão do procedimento : {{ $content->reason }}
                </p>
                <p>
                    Descrição : {{ $content->description }}
                </p>
                <p>
                    Procedimento : {{ $content->procedure }}
                </p>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script src="{{ asset('js/controllers/UserController/UserController.js') }}"></script>
    <script src="{{ asset('js/modules/user/list.js') }}"></script>
@endsection

