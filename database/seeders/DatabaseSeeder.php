<?php

namespace Database\Seeders;

use App\Models\Agent;
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

//        Agent::factory(1)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
//
        $this->call([
            // AgentSeeder::class,
            StateSeeder::class,
            LocalGovernmentAreaSeeder::class
        ]);
    }
}
