<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan master tabel sudah terisi
        if (
            DB::table('master_organization')->count() == 0 ||
            DB::table('master_job_position')->count() == 0 ||
            DB::table('master_job_level')->count() == 0 ||
            DB::table('master_employee_status')->count() == 0 ||
            DB::table('master_grade')->count() == 0 ||
            DB::table('master_marital_status')->count() == 0
        ) {
            $this->command->warn("⚠️ Master data belum lengkap. Seeder employee dilewati.");
            return;
        }

        // Ambil ID master table (antisipasi jumlah data berbeda-beda)
        $orgIds           = DB::table('master_organization')->pluck('id')->toArray();
        $jobPosIds        = DB::table('master_job_position')->pluck('id')->toArray();
        $jobLevelIds      = DB::table('master_job_level')->pluck('id')->toArray();
        $empStatusIds     = DB::table('master_employee_status')->pluck('id')->toArray();
        $gradeIds         = DB::table('master_grade')->pluck('id')->toArray();
        $maritalStatusIds = DB::table('master_marital_status')->pluck('id')->toArray();

        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            $employeeId = 'EMP' . str_pad($i + 1, 3, '0', STR_PAD_LEFT);

            Employee::create([
                'full_name'          => $faker->name,
                'employee_id'        => $employeeId,
                'branch'             => $faker->city,
                'job_position_id'    => $faker->randomElement($jobPosIds),
                'organization_id'    => $faker->randomElement($orgIds),
                'job_level_id'       => $faker->randomElement($jobLevelIds),
                'employee_status_id' => $faker->randomElement($empStatusIds),
                'grade_id'           => $faker->randomElement($gradeIds),
                'marital_status_id'  => $faker->randomElement($maritalStatusIds),
            ]);
        }

        $this->command->info("✅ Employee berhasil dibuat (100 records).");
    }
}
