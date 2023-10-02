<?php

namespace Database\Seeders;
use App\Models\Invite;
use App\Models\Relationship;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Invite::factory()->count(10)->create();
        Relationship::factory()->count(5)->create();
    }
}
