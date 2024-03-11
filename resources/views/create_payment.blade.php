@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-4">
            <h1 class="text-center">Cadastrar Pagamento</h1>
            <form action="{{ route('store-payment') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="employee_name">Nome do Funcionário</label>
                    <select class="form-control" id="employee_name" name="employee_name">
                        @foreach($employees as $employee)
                        <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="full_salary">Salário Integral</label>
                    <input type="number" class="form-control" id="full_salary" name="full_salary">
                </div>
                <div class="form-group">
                    <label for="discounts">Descontos</label>
                    <input type="number" class="form-control" id="discounts" name="discounts">
                </div>
                <div class="form-group">
                    <label for="final_salary">Salário Final</label>
                    <input type="number" class="form-control" id="final_salary" name="final_salary" value="{{ $final_salary }}">
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="time">Hora</label>
                    <input type="time" class="form-control" id="time" name="time">
                </div>

                <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
