<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::all();

        return view('index_employees', ['employees' => $employees]);
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

        $employee = Employee::create([
            'name' => $request->name,
            'function' => $request->function,
            'registration_id' => $request->registration_id,
            'turn' => $request->turn
        ]);

        if (!$employee) {
            return redirect()->back()->with('errors', 'Erro ao cadastrar o empregado');
        }

        return redirect()->route('index-employees')->with('success', 'Empregado cadastrado com sucesso');
    }

    public function editEmployee($id)
    {

        $employee = Employee::findorFail($id);

        if (!$employee) {
            return redirect()->back()->with('errors', 'Empregado não foi encontrado');
        }

        return view('edit_employee', ['employee' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {

        $employee = Employee::findorFail($id);

        if (!$employee) {
            return redirect()->back()->with('errors', 'Empregado não foi encontrado');
        }

        $validate_Data = $request->validate([
            'name' => 'required|min:2|max:255',
            'function' => 'required|min:4|max:255',
            'registration_id' => 'required|unique:employees,registration_id',
            'turn' => 'required|min:4|max:255'
        ]);

        if (!$validate_Data) {
            return redirect()->back()->with('errors', 'Preencha os campos corretamente');
        }

        $update_Employee = $employee->update([
            'name' => $request->name,
            'function' => $request->function,
            'registration_id' => $request->registration_id,
            'turn' => $request->turn
        ]);

        if (!$update_Employee) {
            return redirect()->back()->with('errors', 'Erro ao atualizar o empregado');
        }

        return redirect()->route('index-employees')->with('success', 'Empregado atualizado com sucesso');
    }

    public function deleteEmployee($id)
    {

        $employee = Employee::findorFail($id);

        if (!$employee) {
            return redirect()->back()->with('errors', 'Empregado não encontrado');
        }

        $delete_Employee = $employee->delete();

        if (!$delete_Employee) {
            return redirect()->back()->with('errors', 'Erro ao deletar o empregado');
        }

        return redirect()->route('index-employees')->with('success', 'Empregado deletado com sucesso');
    }
}
