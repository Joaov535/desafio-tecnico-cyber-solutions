<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FuncionariosSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 15; $i++) {
            Funcionario::create([
                'nome'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'cpf'           => $faker->unique()->numerify('###########'),
                'cargo'         => $faker->jobTitle,
                'dataAdmissao'  => $faker->date(),
                'salario'       => $faker->randomFloat(2, 1500, 10000)
            ]);
        }
    }
}
