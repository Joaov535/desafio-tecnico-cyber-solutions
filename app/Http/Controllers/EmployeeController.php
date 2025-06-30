<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormEmployeesRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function listar()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function salvar(FormEmployeesRequest $request)
    {

        $validated = $request->validated();

        if (Employee::create($validated)) {
            return response()->json(['message' => 'Funcionário cadastrado!'], 201);
        }

        return response()->json(['message' => 'Erro ao cadastrar funcionário!'], 500);
    }

    public function alterrar($cpf) {}
    public function deletar($cpf)
    {
        $funcionario = Employee::where('cpf', $cpf)->first();

        if (!$funcionario) {
            return response()->json(['message' => 'Não encontramos um funcionário com esses dados.'], 404);
        }

        $funcionario->delete();

        return response()->json(['message' => 'Funcionário excluído com sucesso'], 200);
    }
}
