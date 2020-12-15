@extends('layouts.page')

@section('title', 'Cadastrar usuário ')
@section('content_header')
    <h1 class="m-0 text-dark">Cadastrar de usuários</h1>
@stop

@section('content')
    <form class="row col-lg-12 col-sm-12" method="POST" action="{{ route('user.insert') }}">
        @csrf
        <div class="form-group col-lg-4 col-sm-12">
            <label>Nome completo</label>
            <input required type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-lg-4 col-sm-12">
            <label>Email</label>
            <input required type="email" name="email" class="form-control">
        </div>
        <div class="form-group col-lg-4 col-sm-12">
            <label>CPF / RG</label>
            <input required type="text" name="document" class="form-control">
        </div>

        <div class="form-group col-lg-4 col-sm-12">
            <label for="exampleFormControlSelect1">Tipo de usuário</label>
            <select required name="user_type_id" class="form-control" id="exampleFormControlSelect1">
                <option value="">Esolha o tipo do usuário</option>
                <option value="{{ \App\Constants\UserConstant::DOCTOR }}">Médico</option>
                <option value="{{ \App\Constants\UserConstant::ADMIN }}">Administrador</option>
                <option value="{{ \App\Constants\UserConstant::PATIENT }}">Paciente</option>
            </select>
        </div>

        <div class="form-group col-lg-4 col-sm-12">
            <label>Alergia</label>
            <input type="text" name="allergy" class="form-control">
        </div>
        <div class="form-group col-lg-4 col-sm-12">
            <label>Data de nascimento</label>
            <input required type="date" name="was_born_in" class="form-control">
        </div>
        <div class="form-group col-lg-2 col-sm-12">
            <label>Tipo sanguinio</label>
            <input type="text" name="blood" class="form-control">
        </div>
        <div class="form-group col-lg-2 col-sm-12">
            <label>Fone</label>
            <input required type="tel" name="phone" class="form-control">
        </div>

        <div class="form-group col-lg-4 col-sm-12">
            <label>Senha</label>
            <input required type="text" name="password" class="form-control">
        </div>


        <div class="col-lg-12 col-sm-12">
            <input type="submit" class="btn btn-outline-info" value="Salvar">
        </div>
    </form>
@stop

@section('js')
    <script src="{{ asset('js/modules/user/list.js') }}"></script>
@endsection

