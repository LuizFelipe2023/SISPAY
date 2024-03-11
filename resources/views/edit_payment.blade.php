@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Editar Pagamento</h1>
            <form action="{{ route('update-payment', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="employee_name">Nome do Funcionário</label>
                    <select class="form-control" id="employee_name" name="employee_name">
                        @foreach($employees as $employee)
                        <option value="{{ $employee->name }}" {{ $payment->employee->name == $employee->name ? 'selected' : '' }}>{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="full_salary">Salário Integral</label>
                    <input type="number" class="form-control" id="full_salary" name="full_salary" value="{{ $payment->full_salary }}">
                </div>
                <div class="form-group">
                    <label for="discounts">Descontos</label>
                    <input type="number" class="form-control" id="discounts" name="discounts" value="{{ $payment->discounts }}">
                </div>
                <div class="form-group">
                    <label for="final_salary">Salário Final</label>
                    <input type="number" class="form-control" id="final_salary" name="final_salary" value="{{ old('final_salary', $payment->final_salary) }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection