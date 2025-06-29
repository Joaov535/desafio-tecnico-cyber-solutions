<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormFuncionariosRequest;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar($cpf) {}

    public function salvar(FormFuncionariosRequest $request)
    {

        $validated = $request->validated();

        if (Funcionario::create($validated)) {
            return response()->json(['message' => 'Funcionário cadastrado!'], 201);
        }

        return response()->json(['message' => 'Erro ao cadastrar funcionário!'], 500);
    }

    public function alterrar($cpf) {}
    public function deletar($cpf) {}
}
