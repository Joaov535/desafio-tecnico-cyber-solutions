<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'cargo' => $this->faker->words(2, true),
            'dataAdmissao' => $this->faker->date(),
            'salario' => $this->faker->randomFloat(2, 1500, 10000),
        ];
    }
}
