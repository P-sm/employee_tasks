<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'employee_status_id'=>EmployeeStatus::inRandomOrder()->first()->id,
        ];
    }
}
