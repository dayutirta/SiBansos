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
                'nama_program' => 'Program Bantuan Sembako',
                'tanggal_mulai' => '2023-01-01',
                'tanggal_akhir' => '2023-12-31',
                'jumlah_penerima' => 100,
                'anggaran' => 100000000,
                'lokasi' => 'Lapangan',
            ],
            [
                'id_bantuan' => 2,
                'nama_program' => 'Program Bantuan Tunai',
                'tanggal_mulai' => '2023-02-01',
                'tanggal_akhir' => '2023-11-30',
                'jumlah_penerima' => 100,
                'anggaran' => 50000000,
                'lokasi' => 'Kantor Desa',
            ],
        ];

        DB::table('m_bansos')->insert($data);
    }
}
