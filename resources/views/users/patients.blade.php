@extends('layouts.page')
@section('title', 'Listagem de usuários ')
@section('content_header')
    <h1 class="m-0 text-dark">Listagem de pacientes</h1>
@stop

@section('content')
    <div class="row col-sm-12 col-lg-12">
        <div class="form-group">
            <span>Digite o nome do paciente</span>
            <input type="text" class="form-control col-sm-12 col-lg-12" id="search-patients">
        </div>
    </div>
    @include('includes.alerts')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Nascimento</th>
            <th scope="col">CPF / RG</th>
            <th scope="col">Email</th>
            <th scope="col">Fone</th>
            <th scope="col">Tipo sanguinio</th>
            <th scope="col">Alergias</th>
            <th scope="col">Consultas</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr data="{{$user->name}}" class="through-patients user-{{$user->id}}">
                <th scope="row">{{ $user->name }}</th>
                <th>{{ Carbon\Carbon::parse($user->was_born_in)->format('d/m/Y')  }}</th>
                <td>{{ $user->document }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->blood }}</td>
                <td>{{ $user->allergy }}</td>
                <td>
                    <a href="/timeline/{{ $user->id }}">
                        <button class="btn btn-info">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ol" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                                <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
                            </svg>
                        </button>
                    </a>
{{--                    <a href="/user/{{ $user->id }}">--}}
{{--                        <button class="btn btn-info">--}}
{{--                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </a>--}}
{{--                    <button id="{{ $user->id }}" class="btn btn-danger delete-user">--}}
{{--                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zm1.146-7.85a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script src="{{ asset('js/controllers/UserController/UserController.js') }}"></script>
    <script src="{{ asset('js/modules/user/list.js') }}"></script>
@endsection

