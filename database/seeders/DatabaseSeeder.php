<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Cyber Solutions',
            'login' => 'cyber.solutions',
            'password' => Hash::make('teste'),
        ]);

        $this->call([
            EmployeesSeeder::class,
        ]);
    }
}
