<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agent::factory()
            ->count(10)
            ->hasProperty(10)
            ->create();

        Agent::factory()
            ->count(5)
            ->hasProperty(3)
            ->create();
    }
}
