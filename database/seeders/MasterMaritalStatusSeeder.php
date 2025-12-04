<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterMaritalStatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_marital_status')->insert([
            ['marital_status_name' => 'Belum Menikah', 'information' => 'Single', 'created_at' => now(), 'updated_at' => now()],
            ['marital_status_name' => 'Menikah', 'information' => 'Sudah menikah', 'created_at' => now(), 'updated_at' => now()],
            ['marital_status_name' => 'Cerai', 'information' => 'Berpisah', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
