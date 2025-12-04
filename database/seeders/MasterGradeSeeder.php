<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterGradeSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_grade')->insert([
            ['grade_name' => 'IIIA', 'information' => 'Grade tertinggi', 'created_at' => now(), 'updated_at' => now()],
            ['grade_name' => 'IVB', 'information' => 'Grade menengah', 'created_at' => now(), 'updated_at' => now()],
            ['grade_name' => 'VC', 'information' => 'Grade dasar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
