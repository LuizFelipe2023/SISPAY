@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1>Lista de Pagamentos</h1>
            <a href="{{ route('payments-pdf') }}" class="btn btn-primary mt-2 mb-3">Baixar PDF</a>
            <a href="{{ route('create-payment') }}" class="btn btn-primary mt-2 mb-3">Cadastrar Novo Pagamento</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID do Funcionário</th>
                        <th scope="col">Nome do Funcionário</th>
                        <th scope="col">Salário Integral</th>
                        <th scope="col">Descontos</th>
                        <th scope="col">Salário Final</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tempo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $payment->id }}</th>
                        <td>{{ $payment->employee_id }}</td>
                        <td>{{ $payment->employee_name }}</td>
                        <td>{{ $payment->full_salary }}</td>
                        <td>{{ $payment->discounts }}</td>
                        <td>{{ $payment->final_salary }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->time)->format('H:i:s') }}</td>
                        <td>
                            <a href="{{ route('edit-payment', $payment->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('delete-payment', $payment->id) }}" method="POST" style="display: inline;">
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
@endsection
