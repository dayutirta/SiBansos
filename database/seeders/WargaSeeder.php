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
        $data = [
            [
                'nik' => '111',
                'id_level' => 1,
                'nokk' => '111',
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
                'rt' => '1',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/1.png'),
            ],
            [
                'nik' => '112',
                'id_level' => 2,
                'nokk' => '112',
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
                'rt' => '1',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/2.png'),
            ],
            [
                'nik' => '113',
                'id_level' => 3,
                'nokk' => '113',
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
                'rt' => '1',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/4.png'),
            ],
            [
                'nik' => '121',
                'id_level' => 3,
                'nokk' => '121',
                'nama' => 'Diana',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.4, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Pegawai Negeri',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '1',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/6.png'),
            ],
            [
                'nik' => '122',
                'id_level' => 2,
                'nokk' => '122',
                'nama' => 'Eko',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1996-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.5, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Wiraswasta',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '2',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/2.png'),
            ],
            [
                'nik' => '123',
                'id_level' => 3,
                'nokk' => '123',
                'nama' => 'Fani',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1997-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.6, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Pelajar',
                'pendidikan' => 'SMA',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '2',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/4.png'),
            ],
            [
                'nik' => '131',
                'id_level' => 3,
                'nokk' => '131',
                'nama' => 'Gita',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1998-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.7, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Mahasiswa',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '2',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ .        '/../../resources/img/6.png'),
            ],
            [
                'nik' => '132',
                'id_level' => 2,
                'nokk' => '132',
                'nama' => 'Hadi',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1999-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.8, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'PNS',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '3',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/2.png'),
            ],
            [
                'nik' => '133',
                'id_level' => 3,
                'nokk' => '133',
                'nama' => 'Indah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.9, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Guru',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '3',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/4.png'),
            ],
            [
                'nik' => '211',
                'id_level' => 3,
                'nokk' => '211',
                'nama' => 'Nia',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2000-01-01',
                'alamat' => 'Jl. Jend. Sudirman No.11, Jakarta',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => 'Guru',
                'pendidikan' => 'S1',
                'status_pernikahan' => 'Belum Menikah',
                'rt' => '3',
                'rw' => '1',
                'foto' => $this->convertToBlob(__DIR__ . '/../../resources/img/6.png'),
            ],
        ];
        foreach ($data as $warga) {
            DB::table('m_warga')->insert($warga);
        }
    }
    /**
     * Mengonversi file gambar menjadi BLOB.
     *
     * @param string $filePath
     * @return string|null
     */
    private function convertToBlob(string $filePath): ?string
    {
        if (file_exists($filePath)) {
            return base64_encode(file_get_contents($filePath));
        }

        return null;
    }
}
