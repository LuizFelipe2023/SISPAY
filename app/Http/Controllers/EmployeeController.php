<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PDF;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('index_employees', ['employees' => $employees]);
    }

    public function generateEmployeePDF()
    {
        $employees = Employee::all();
        $html = View::make('employees-pdf', compact('employees'))->render();
        $pdf = PDF::loadHtml($html);
        return $pdf->download('employees.pdf');
    }

    public function createEmployee()
    {
        return view('create_employee');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'function' => 'required|min:4|max:255',
            'registration_id' => 'required|unique:employees,registration_id',
            'turn' => 'required|min:4|max:255'
        ]);

        $employee = Employee::create($request->only(['name', 'function', 'registration_id', 'turn']));

        return $employee
            ? redirect()->route('index-employees')->with('success', 'Empregado cadastrado com sucesso')
            : redirect()->back()->with('errors', 'Erro ao cadastrar o empregado');
    }

    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit_employee', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required|min:2|max:255',
            'function' => 'required|min:4|max:255',
            'registration_id' => 'required|unique:employees,registration_id,' . $employee->id,
            'turn' => 'required|min:4|max:255'
        ]);

        $employee->update($request->only(['name', 'function', 'registration_id', 'turn']));

        return redirect()->route('index-employees')->with('success', 'Empregado atualizado com sucesso');
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('index-employees')->with('success', 'Empregado deletado com sucesso');
    }
}
