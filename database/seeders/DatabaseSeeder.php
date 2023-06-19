<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        User::factory()->state([
            'email' => 'demonstracao@example.com',
        ])->create();

        User::factory(10)->create();

        Student::factory(50)->hasAttached(
            Guardian::factory()->count(5),
            ['type' => rand(1,2)]
        )->create();
    }
}
