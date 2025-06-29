<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar($cpf) {}

    public function salvar(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'nome' => 'required|max:150',
                    'email' => 'required|max:150',
                    'cpf' => 'required|max:11',
                    'cargo' => 'nullable|max:100',
                    'dataAdmissao' => 'nullable|date',
                    'salario' => 'nullable|numeric|min:0'
                ]
            );

            Funcionario::create($validated);

            return response()->json(['message' => 'Funcionário cadastrado!'], 201);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['message' => 'Falha ao cadastrar funcionario'], 201);
        }
    }

    public function alterrar($cpf) {}
    public function deletar($cpf) {}
}
