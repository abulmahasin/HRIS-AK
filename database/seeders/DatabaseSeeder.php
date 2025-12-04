<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            MasterOrganizationSeeder::class,
            MasterJobPositionSeeder::class,
            MasterJobLevelSeeder::class,
            MasterEmployeeStatusSeeder::class,
            MasterGradeSeeder::class,
            MasterRelationshipSeeder::class,
            MasterMaritalStatusSeeder::class,
            EmployeeSeeder::class,
            PersonalDataSeeder::class,
        ]);
    }
}
