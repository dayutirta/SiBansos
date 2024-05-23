<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_warga')->insert([
            'nik' => '1234567890124',
            'id_level' => 1,
            'nokk' => '1234567890123',
            'nama' => 'Sudirman',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Jend. Sudirman No.1, Jakarta',
            'agama' => 'Islam',
            'status' => 'Aktif',
            'kewarganegaraan' => 'Indonesia',
            'pekerjaan' => 'Pegawai Swasta',
            'pendidikan' => 'S1',
            'status_pernikahan' => 'Menikah',
        ]);

        DB::table('m_warga')->insert([
            'nik' => '1234567890135',
            'id_level' => 2,
            'nokk' => '1234567890134',
            'nama' => 'Budi',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1992-01-01',
            'alamat' => 'Jl. Jend. Sudirman No.2, Jakarta',
            'agama' => 'Islam',
            'status' => 'Aktif',
            'kewarganegaraan' => 'Indonesia',
            'pekerjaan' => 'Petani',
            'pendidikan' => 'S1',
            'status_pernikahan' => 'Menikah',
        ]);

        DB::table('m_warga')->insert([
            'nik' => '1234567890146',
            'id_level' => 3,
            'nokk' => '1234567890145',
            'nama' => 'Ani',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1994-01-01',
            'alamat' => 'Jl. Jend. Sudirman No.3, Jakarta',
            'agama' => 'Islam',
            'status' => 'Aktif',
            'kewarganegaraan' => 'Indonesia',
            'pekerjaan' => 'Ibu Rumah Tangga',
            'pendidikan' => 'S1',
            'status_pernikahan' => 'Menikah',
        ]);
    }
}
