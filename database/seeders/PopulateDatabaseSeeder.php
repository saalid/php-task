<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Task;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Database\Seeder;

class PopulateDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Department::factory()->count(10)->create();
        Task::factory()->count(50)->create();
        UserDepartment::factory()->count(20)->create();
    }
}
