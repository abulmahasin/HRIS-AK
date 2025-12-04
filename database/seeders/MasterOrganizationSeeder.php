<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterOrganizationSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_organization')->insert([
            [
                'organization_name' => 'Yayasan Al-Kautsar',
                'information'       => 'Induk organisasi utama',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'organization_name' => 'Unit SMP',
                'information'       => 'Sekolah Menengah Pertama',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'organization_name' => 'Unit SMA',
                'information'       => 'Sekolah Menengah Atas',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
