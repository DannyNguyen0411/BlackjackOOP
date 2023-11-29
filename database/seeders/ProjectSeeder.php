<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create at least 5 projects
        Project::factory()->count(5)->create()->each(function ($project) {
            // Each project should have at least 2 tasks
            $project->tasks()->saveMany(Task::factory()->count(2)->create());
        });
    }
}
