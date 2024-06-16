<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_bantuan' => 1,
                'nama_program' => 'Program Bantuan Tester',
                'tanggal_mulai' => '2024-06-01',
                'tanggal_akhir' => '2024-06-30',
                'jumlah_penerima' => 100,
                'anggaran' => 100000000,
                'lokasi' => 'Lapangan',
            ],
            [
                'id_bantuan' => 2,
                'nama_program' => 'Program Bantuan Sembako',
                'tanggal_mulai' => '2023-01-01',
                'tanggal_akhir' => '2023-12-31',
                'jumlah_penerima' => 100,
                'anggaran' => 100000000,
                'lokasi' => 'Lapangan',
            ],
            [
                'id_bantuan' => 3,
                'nama_program' => 'Program Bantuan Tunai',
                'tanggal_mulai' => '2023-02-01',
                'tanggal_akhir' => '2023-11-30',
                'jumlah_penerima' => 100,
                'anggaran' => 50000000,
                'lokasi' => 'Kantor Desa',
            ],
            [
                'id_bantuan' => 4,
                'nama_program' => 'Program Keluarga Harapan (PKH)',
                'tanggal_mulai' => '2023-03-01',
                'tanggal_akhir' => '2023-10-31',
                'jumlah_penerima' => 150,
                'anggaran' => 150000000,
                'lokasi' => 'Balai Desa',
            ],
            [
                'id_bantuan' => 5,
                'nama_program' => 'Program Indonesia Pintar (PIP)',
                'tanggal_mulai' => '2023-04-01',
                'tanggal_akhir' => '2023-09-30',
                'jumlah_penerima' => 200,
                'anggaran' => 200000000,
                'lokasi' => 'Sekolah',
            ],
        ];

        DB::table('m_bansos')->insert($data);
    }
}
