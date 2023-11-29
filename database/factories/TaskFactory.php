<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $begindate = Carbon::now();  // Adjust this as needed
        $enddate = $begindate->copy()->addDays(7);  // Adjust this as needed

        return [
            'task' => $this->faker->name(),
            'begindate' => $begindate,
            'enddate' => $enddate,
            'user_id' => optional(User::factory())->create()->id,
            'project_id' => optional(Project::factory())->create()->id,
            'activity_id' => optional(Activity::factory())->create()->id,
        ];
    }
}
