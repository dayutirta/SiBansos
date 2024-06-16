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
                'kode_bantuan' => 'BN000',
                'nama_bantuan' => 'Bantuan Tester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN001',
                'nama_bantuan' => 'Bantuan Sembako',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN002',
                'nama_bantuan' => 'Program Keluarga Harapan (PKH)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN003',
                'nama_bantuan' => 'Bantuan Langsung Tunai (BLT)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN004',
                'nama_bantuan' => 'Bantuan Sosial Tunai (BST)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN005',
                'nama_bantuan' => 'Bantuan untuk Lansia dan Penyandang Disabilitas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN006',
                'nama_bantuan' => 'Program Indonesia Pintar (PIP)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN007',
                'nama_bantuan' => 'Kartu Indonesia Sehat (KIS)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN008',
                'nama_bantuan' => 'Bantuan Subsidi Upah (BSU)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN009',
                'nama_bantuan' => 'Bantuan Siswa Miskin (BSM)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_bantuan' => 'BN010',
                'nama_bantuan' => 'Pelatihan Kerja dan Bantuan Modal Usaha',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('m_bantuan')->insert($data);
    }
}
