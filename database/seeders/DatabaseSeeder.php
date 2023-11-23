<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         Project::factory(10)->create();
//
//         Project::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
