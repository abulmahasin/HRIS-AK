<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterJobPositionSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_job_position')->insert([
            ['job_position_name' => 'Guru', 'information' => 'Tenaga Pendidik', 'created_at' => now(), 'updated_at' => now()],
            ['job_position_name' => 'Staf TU', 'information' => 'Staf Tata Usaha', 'created_at' => now(), 'updated_at' => now()],
            ['job_position_name' => 'Kepala Sekolah', 'information' => 'Pimpinan Sekolah', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
