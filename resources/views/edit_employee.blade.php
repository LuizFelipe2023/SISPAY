@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <h1>Editar Funcionário</h1>
            <form action="{{ route('update-employee', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
                </div>
                <div class="form-group">
                    <label for="function">Função</label>
                    <input type="text" class="form-control" id="function" name="function" value="{{ $employee->function }}">
                </div>
                <div class="form-group">
                    <label for="registration_id">Registro</label>
                    <input type="text" class="form-control" id="registration_id" name="registration_id" value="{{ $employee->registration_id }}">
                </div>
                <div class="form-group">
                    <label for="turn">Turno</label>
                    <input type="text" class="form-control" id="turn" name="turn" value="{{ $employee->turn }}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
