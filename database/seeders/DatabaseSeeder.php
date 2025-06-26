<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeStatus;
use App\Models\Role;
use App\Models\Task;
use App\Models\TaskStatus;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TaskStatus::insert([
            ['name' => 'К выполнению'],
            ['name' => 'В работе'],
            ['name' => 'Выполнена'],
        ]);

        EmployeeStatus::insert([
            ['name' => 'Работает'],
            ['name' => 'В отпуске'],
        ]);

        Role::insert([
            ['name' => 'Программист'],
            ['name' => 'Менеджер']
        ]);
        //Create 20 employees and 10 tasks for each other
        Employee::factory(20)->hasTasks(10)->create();
        $roles = Role::all();
        $tasks = Task::all();
        Employee::all()->each(function ($employee) use ($tasks,$roles) {
            $employee->roles()->attach(
                $roles->random(rand(1, 2))->pluck('id')->toArray()
            );
            //Add some random tasks, that one task should have more than one employees
            $employee->tasks()->attach(
                $tasks->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
