<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterEmployeeStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_employee_status')->insert([
            ['employee_status_name' => 'PKWT', 'information' => 'Kontrak', 'created_at' => now(), 'updated_at' => now()],
            ['employee_status_name' => 'PKWTT', 'information' => 'TETAP', 'created_at' => now(), 'updated_at' => now()],
            ['employee_status_name' => 'Harian', 'information' => 'Pegawai harian', 'created_at' => now(), 'updated_at' => now()],
            ['employee_status_name' => 'Kontrak', 'information' => 'Pegawai Kontrak', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
