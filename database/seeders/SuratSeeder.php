<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('m_surat')->insert([
            [
                'kode_surat' => 'SKCK',
                'nama_surat' => 'Surat Pengantar Pembuatan SKCK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_surat' => 'SKD',
                'nama_surat' => 'Surat Pengantar Pembuatan Keterangan Domisili',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_surat' => 'KTP/KK',
                'nama_surat' => 'Surat Pengantar Pembuatan KTP_KK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_surat' => 'SKTM',
                'nama_surat' => 'Surat Pengantar Keterangan Tidak Mampu (SKTM)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
