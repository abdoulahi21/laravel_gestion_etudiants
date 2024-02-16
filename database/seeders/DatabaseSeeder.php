<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classe;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // Classe::factory(4)->create();
        // Student::factory(1)->create();
        \App\Models\User::factory()->create([
             'name' => 'Abdou',
             'email' => 'abdou@gmail.com',
             'password'=>Hash::make("1234")
        ]);
    }
}
