<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_listar_funcionarios()
    {
        $this->authenticate();

        Employee::factory()->count(3)->create();

        $response = $this->get('/employees');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_salvar_funcionario()
    {
        $this->authenticate();

        $data = [
            'nome' => 'João Araujo',
            'email' => 'joao@teste.com',
            'cpf' => '12345678900',
            'cargo' => 'Programador',
            'dataAdmissao' => '2025-07-10',
            'salario' => 4000.00,
        ];

        $response = $this->post('/employee', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('employees', ['cpf' => '12345678900']);
    }

    public function test_deletar_funcionario()
    {
        $this->authenticate();

        $employee = Employee::factory()->create([
            'cpf' => '98765432100',
        ]);

        $response = $this->delete("/employee/{$employee->cpf}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('employees', ['cpf' => '98765432100']);
    }

    public function test_nao_encontrar_funcionario_para_deletar()
    {
        $this->authenticate();

        $response = $this->delete("/employee/00000000000");

        $response->assertStatus(404);
    }
}
