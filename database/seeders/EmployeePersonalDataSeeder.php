<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmployeePersonalData;
use Faker\Factory as Faker;

class EmployeePersonalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $employees = Employee::all();

        if ($employees->count() == 0) {
            $this->command->warn("⚠️ Tidak ada employee. Seeder personal data dilewati.");
            return;
        }

        foreach ($employees as $emp) {
            EmployeePersonalData::create([
                'employee_id'       => $emp->employee_id, // ← PERBAIKAN PENTING
                'phone_number'      => $faker->phoneNumber,
                'email'             => $faker->unique()->safeEmail,
                'phone_number_2'    => $faker->optional()->phoneNumber(),
                'place_of_birth'    => $faker->city,
                'gender'            => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'marital_status_id' => rand(1, 5),
                'blood_type'        => $faker->randomElement(['A', 'B', 'O', 'AB']),
                'religion'          => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            ]);
        }

        $this->command->info("✅ Employee Personal Data berhasil dibuat untuk {$employees->count()} pegawai.");
    }
}
