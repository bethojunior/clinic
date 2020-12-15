@extends('layouts.page')
@section('title', 'Listagem de usuários ')
@section('content_header')
    <h1 class="m-0 text-dark">Inserir dados na ficha de um usuário </h1>
@stop

@section('content')
    @include('includes.alerts')
    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('timeline.create') }}">
        @csrf
        @method('POST')
        <div class="row col-lg-12 col-sm-12">
            <div class="form-group col-lg-6 col-sm-12">
                <span>Selecione o usuário</span>
                <select class="col-lg-12 col-sm-12 js-example-basic-single" name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6 col-sm-12">
                <span>Titulo</span>
                <input required name="title" class="form-control">
            </div>
        </div>
        <div class="row col-lg-12 col-sm-12">
            <div class="col-lg-12 col-sm-12 form-group">
                <span>Razão do procedimento</span>
                <textarea required class="form-control" name="reason"></textarea>
            </div>
        </div>
        <div class="row col-lg-12 col-sm-12">
            <div class="col-lg-12 col-sm-12 form-group">
                <span>Procedimento</span>
                <textarea required class="form-control" name="procedure"></textarea>
            </div>
        </div>

        <div class="row col-lg-12 col-sm-12">
            <div class="col-lg-12 col-sm-12 form-group">
                <span>Descrição do procedimento</span>
                <textarea required class="form-control" name="description"></textarea>
            </div>
        </div>
        <div class="form-group col-lg-4 col-sm-12"></div>
        <div class="form-group col-lg-12 col-sm-12">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@stop

@section('js')
    <script src="{{ asset('js/controllers/UserController/UserController.js') }}"></script>
    <script src="{{ asset('js/modules/user/list.js') }}"></script>
@endsection

