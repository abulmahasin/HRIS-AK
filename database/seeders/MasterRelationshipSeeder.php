<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterRelationshipSeeder extends Seeder
{
    public function run()
    {
        DB::table('master_relationship')->insert([
            ['relationship_name' => 'Ayah', 'information' => 'Orang tua laki-laki', 'created_at' => now(), 'updated_at' => now()],
            ['relationship_name' => 'Ibu', 'information' => 'Orang tua perempuan', 'created_at' => now(), 'updated_at' => now()],
            ['relationship_name' => 'Anak', 'information' => 'Keturunan langsung', 'created_at' => now(), 'updated_at' => now()],
            ['relationship_name' => 'Istri', 'information' => 'Pasangan perempuan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
