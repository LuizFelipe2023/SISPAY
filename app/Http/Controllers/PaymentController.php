<?php

namespace App\Http\Controllers;

use App\Models\Payment;

use Illuminate\Http\Request;
use App\Models\Employee;

class PaymentController extends Controller
{
    public function homePay()
    {

        $payments = Payment::all();

        return view('home_payments', ['payments' => $payments]);
    }

    public function createPayment()
    {

        $employees = Employee::all();
        $final_salary = 0;

        return view('create_payment', ['employees' => $employees, 'final_salary' => $final_salary]);
    }

    public function storePayment(Request $request)
    {
        $validate_Data = $request->validate([
            'employee_name' => 'required|exists:employees,name',
            'full_salary' => 'required|numeric',
            'discounts' => 'required|numeric',
            'final_salary' => 'required|numeric'
        ]);

        $employee = Employee::where('name', $validate_Data['employee_name'])->firstOrFail();

        $full_salary = $request->full_salary;
        $discounts = $request->discounts;
        $final_salary = $full_salary - $discounts;

        $payment = Payment::create([
            'employee_id' => $employee->id,
            'employee_name' => $employee->name,
            'full_salary' => $full_salary,
            'discounts' => $discounts,
            'final_salary' => $final_salary
        ]);

        return $payment
            ? redirect()->route('home-payments')->with('success', 'Pagamento cadastrado com sucesso')
            : redirect()->back()->with('errors', 'Erro ao cadastrar um pagamento');
    }


    public function editPayment($id)
    {
        $payment = Payment::findOrFail($id);
        $employees = Employee::all();
        $final_salary = $payment->final_salary;

        return view('edit_payment', ['payment' => $payment, 'employees' => $employees, 'final_salary' => $final_salary]);
    }

    public function updatePayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validate_Data = $request->validate([
            'employee_name' => 'required|exists:employees,name',
            'full_salary' => 'required|numeric',
            'discounts' => 'required|numeric', 
            'final_salary' => 'required|numeric'
        ]);

        $employee = Employee::where('name', $validate_Data['employee_name'])->firstOrFail();

        $full_salary = $request->full_salary;
        $discounts = $request->discounts; 
        $final_salary = $full_salary - $discounts;

        $payment_Update = $payment->update([
            'employee_id' => $employee->id,
            'employee_name' => $employee->name,
            'full_salary' => $full_salary,
            'discounts' => $discounts,
            'final_salary' => $final_salary
        ]);

        return $payment_Update
            ? redirect()->route('home-payments')->with('success', 'Pagamento atualizado com sucesso')
            : redirect()->back()->with('errors', 'Erro ao atualizar um pagamento');
    }

    public function deletePayment($id)
    {

        $payment = Payment::findorFail($id);

        if (!$payment) {
            return redirect()->back()->with('errors', 'Pagamento não encontrado');
        }

        $payment_Delete =  $payment->delete();

        if (!$payment_Delete) {
            return redirect()->back()->with('errors', 'Erro ao apagar o pagamento');
        }

        return redirect()->route('home-payments')->with('success', 'Pagamento deletado com sucesso');
    }
}
