<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\MasterOrganization;
use App\Models\MasterJobPosition;
use App\Models\MasterJobLevel;
use App\Models\MasterEmployeeStatus;
use App\Models\MasterGrade;
use App\Models\MasterMaritalStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

  public function definition(): array
{
    return [
        'full_name'           => $this->faker->name(),
        'employee_id'         => strtoupper($this->faker->bothify('EMP###')),
        'branch'              => $this->faker->randomElement(['Pusat', 'Lampung', 'Bandar Jaya', null]),
        'job_position_id'     => \App\Models\MasterJobPosition::inRandomOrder()->value('id'),
        'organization_id'     => \App\Models\MasterOrganization::inRandomOrder()->value('id'),
        'job_level_id'        => \App\Models\MasterJobLevel::inRandomOrder()->value('id'),
        'employee_status_id'  => \App\Models\MasterEmployeeStatus::inRandomOrder()->value('id'),
        'grade_id'            => \App\Models\MasterGrade::inRandomOrder()->value('id'),
        'marital_status_id'   => \App\Models\MasterMaritalStatus::inRandomOrder()->value('id'),
        'created_at'          => now(),
        'updated_at'          => now(),
    ];
}


}
