<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(TaskSeeder::class);
        // $this->call(JobSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => 'homamhomam',
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 't@example.com',
            'password' => 'homamhomam',
            'role' => 'employer'

        ]);
    }
}
