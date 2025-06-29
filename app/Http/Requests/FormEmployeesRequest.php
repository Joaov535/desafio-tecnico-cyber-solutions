<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:150',
            'email' => 'required|max:150|unique:employees,email',
            'cpf' => 'required|max:11|unique:employees,cpf',
            'cargo' => 'nullable|max:100',
            'dataAdmissao' => 'nullable|date',
            'salario' => 'nullable|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo obrigatório.',
            'unique'   => 'Já está em uso.',
            'max'      => 'Tamanho máximo excedido.',
            'date'     => 'Data inválida.',
            'numeric'  => 'Deve ser um número.',
            'min'      => 'Valor mínimo inválido.'
        ];
    }
}
