<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterJobLevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_job_level')->insert([
            ['job_level_name' => 'Guru', 'information' => 'Guru Pengajar tetap dan non tetap', 'created_at' => now(), 'updated_at' => now()],
            ['job_level_name' => 'Karyawan', 'information' => 'Pegawai tetap dan non tetap', 'created_at' => now(), 'updated_at' => now()],
            ['job_level_name' => 'Harian', 'information' => 'Pegawai harian', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
