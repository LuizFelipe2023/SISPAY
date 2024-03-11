@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <h1 class="text-center">Cadastrar Funcionário</h1>
            <form action="{{ route('store-employee') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="function">Função</label>
                    <input type="text" class="form-control" id="function" name="function">
                </div>
                <div class="form-group">
                    <label for="registration_id">Registro</label>
                    <input type="text" class="form-control" id="registration_id" name="registration_id">
                </div>
                <div class="form-group">
                    <label for="turn">Turno</label>
                    <input type="text" class="form-control" id="turn" name="turn">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
