<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_level' => 'WRG001',
                'nama_level' => 'RW',
            ],
            [
                'kode_level' => 'WRG002',
                'nama_level' => 'RT',
            ],
            [
                'kode_level' => 'WRG003',
                'nama_level' => 'Warga',
            ],
        ];
        DB::table('m_level')->insert($data);
    }
}