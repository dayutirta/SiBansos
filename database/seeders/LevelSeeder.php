<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->insert([
            'kode_level' => 'WRG001',
            'nama_level' => 'RW',
        ]);

        DB::table('m_level')->insert([
            'kode_level' => 'WRG002',
            'nama_level' => 'RT',
        ]);

        DB::table('m_level')->insert([
            'kode_level' => 'WRG003',
            'nama_level' => 'Warga',
        ]);
    }
}
