<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_bantuan' => 'BN001',
                'nama_bantuan' => 'Bantuan Sembako',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN002',
                'nama_bantuan' => 'Bantuan Tunai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN003',
                'nama_bantuan' => 'Bantuan Pendidikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_bantuan')->insert($data);
    }
}
