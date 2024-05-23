<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_bansos' => '2',
                'id_warga' => '12',
                'nama' => 'Anna',
                'usia' => '35',
                'pendapatan' => '2000000',
                'status_kesehatan' => 'Tidak mempunyai jaminan kesehatan',
                'pekerjaan' => 'Guru',
                'notelp' => '081111111',
            ],
            [
                'id_bansos' => '2',
                'id_warga' => '14',
                'nama' => 'Hadi',
                'usia' => '32',
                'pendapatan' => '1500000',
                'status_kesehatan' => 'Tidak mempunyai jaminan kesehatan',
                'pekerjaan' => 'Wiraswasta',
                'notelp' => '0822222222',
            ],
            [
                'id_bansos' => '2',
                'id_warga' => '10',
                'nama' => 'Budi Santoso',
                'usia' => '28',
                'pendapatan' => '1000000',
                'status_kesehatan' => 'Tidak mempunyai jaminan kesehatan',
                'pekerjaan' => 'Petani',
                'notelp' => '083333333',
            ],
        ];

        DB::table('m_penerima')->insert($data);
    }
}
