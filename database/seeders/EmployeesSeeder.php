<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 15; $i++) {
            Employee::create([
                'nome'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'cpf'           => $faker->unique()->numerify('###########'),
                'cargo'         => $faker->words(2, true),
                'dataAdmissao'  => $faker->date(),
                'salario'       => $faker->randomFloat(2, 1500, 10000)
            ]);
        }
    }
}
