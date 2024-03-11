@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1>Lista de Funcionários</h1>
            <a href="{{ route('create-employee') }}" class="btn btn-primary mt-2 mb-3">Cadastrar Novo Funcionário</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Função</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->function }}</td>
                            <td>{{ $employee->registration_id }}</td>
                            <td>{{ $employee->turn }}</td>
                            <td>
                                <a href="{{ route('edit-employee', $employee->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('delete-employee', $employee->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
