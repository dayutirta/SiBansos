<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $seeds = [];
        $nik_counter = 1;
        $keluarga_counter = 1;
        $foto_index = [1, 2, 3, 5, 7];
        $foto_index_perempuan = [4, 6];

        for ($i = 0; $i < 25; $i++) {
            $alamat = 'Komplek ' . $faker->word . ' Blok ' . chr(65 + $i % 26) . ' No. ' . ($i + 1);
            $keluarga = [];
            $umur_ayah = $faker->numberBetween(35, 60);
            $umur_ibu = $faker->numberBetween(30, 55);
            $rt = $faker->numberBetween(1, 3);

            // Ayah
            $keluarga[] = [
                'nik' => str_pad($nik_counter++, 3, '0', STR_PAD_LEFT),
                'id_level' => 3,
                'nokk' => str_pad($keluarga_counter, 3, '0', STR_PAD_LEFT),
                'nama' => $faker->name('male'),
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => Carbon::now()->subYears($umur_ayah)->format('Y-m-d'),
                'alamat' => $alamat,
                'agama' => $this->getAgama($faker),
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => $faker->randomElement(['Buruh', 'PNS', 'Karyawan Swasta', 'Wirausaha', 'TNI/Polri', 'Petani/Nelayan', 'Dokter/Perawat', 'Guru/Dosen']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA/SMK', 'Sarjana', 'Magister', 'Doktor']),
                'status_pernikahan' => 'Menikah',
                'rt' => $rt,
                'rw' => 1,
                'foto' => '/storage/foto/' . $faker->randomElement($foto_index) . '.png', // Path sesuai struktur direktori Laravel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Ibu
            $keluarga[] = [
                'nik' => str_pad($nik_counter++, 3, '0', STR_PAD_LEFT),
                'id_level' => 3,
                'nokk' => str_pad($keluarga_counter, 3, '0', STR_PAD_LEFT),
                'nama' => $faker->name('female'),
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => Carbon::now()->subYears($umur_ibu)->format('Y-m-d'),
                'alamat' => $alamat,
                'agama' => $this->getAgama($faker),
                'status' => 'Aktif',
                'kewarganegaraan' => 'Indonesia',
                'pekerjaan' => $faker->randomElement(['Buruh', 'PNS', 'Karyawan Swasta', 'Wirausaha', 'TNI/Polri', 'Petani/Nelayan', 'Dokter/Perawat', 'Guru/Dosen']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA/SMK', 'Sarjana', 'Magister', 'Doktor']),
                'status_pernikahan' => 'Menikah',
                'rt' => $rt,
                'rw' => 1,
                'foto' => '/storage/foto/' . $faker->randomElement($foto_index_perempuan) . '.png', // Path sesuai struktur direktori Laravel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // 3 Anak
            for ($j = 0; $j < 3; $j++) {
                $umur_anak = $faker->numberBetween(3, 30);
                $jenis_kelamin_anak = $faker->randomElement(['Laki-laki', 'Perempuan']);
                $pekerjaan_anak = $umur_anak <= 21 ? 'Pelajar/Mahasiswa' : $faker->randomElement(['Buruh', 'PNS', 'Karyawan Swasta', 'Wirausaha', 'TNI/Polri', 'Petani/Nelayan', 'Dokter/Perawat', 'Guru/Dosen']);
                $pendidikan_anak = 'SD';

                if ($umur_anak > 6 && $umur_anak <= 12) {
                    $pendidikan_anak = 'SD';
                } elseif ($umur_anak > 12 && $umur_anak <= 15) {
                    $pendidikan_anak = 'SMP';
                } elseif ($umur_anak > 15 && $umur_anak <= 18) {
                    $pendidikan_anak = 'SMA/SMK';
                } elseif ($umur_anak > 18 && $umur_anak <= 24) {
                    $pendidikan_anak = 'Sarjana';
                } elseif ($umur_anak > 24) {
                    $pendidikan_anak = $faker->randomElement(['Sarjana', 'Magister', 'Doktor']);
                }

                $keluarga[] = [
                    'nik' => str_pad($nik_counter++, 3, '0', STR_PAD_LEFT),
                    'id_level' => 3,
                    'nokk' => str_pad($keluarga_counter, 3, '0', STR_PAD_LEFT),
                    'nama' => $faker->name($jenis_kelamin_anak === 'Laki-laki' ? 'male' : 'female'),
                    'jenis_kelamin' => $jenis_kelamin_anak,
                    'tempat_lahir' => $faker->city,
                    'tanggal_lahir' => Carbon::now()->subYears($umur_anak)->format('Y-m-d'),
                    'alamat' => $alamat,
                    'agama' => $this->getAgama($faker),
                    'status' => 'Aktif',
                    'kewarganegaraan' => 'Indonesia',
                    'pekerjaan' => $pekerjaan_anak,
                    'pendidikan' => $pendidikan_anak,
                    'status_pernikahan' => 'Belum Menikah',
                    'rt' => $rt,
                    'rw' => 1,
                    'foto' => '/storage/foto/' . ($jenis_kelamin_anak === 'Laki-laki' ? $faker->randomElement($foto_index) : $faker->randomElement($foto_index_perempuan)) . '.png', // Path sesuai struktur direktori Laravel
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            $seeds = array_merge($seeds, $keluarga);
            $keluarga_counter++;
        }

        // Randomize the id_level for specific conditions
        $active_seeds = array_filter($seeds, function($seed) {
            return $seed['status'] == 'Aktif' && Carbon::now()->diffInYears(Carbon::parse($seed['tanggal_lahir'])) > 30;
        });

        if (count($active_seeds) >= 4) {
            // Randomize one id_level = 1
            $index = array_rand($active_seeds);
            $seeds[$index]['id_level'] = 1;

            // Randomize five id_level = 2
            $random_indices = array_rand($active_seeds, 3);
            foreach ($random_indices as $index) {
                $seeds[$index]['id_level'] = 2;
            }
        }

        DB::table('m_warga')->insert($seeds);
    }

    // Fungsi getAgama untuk menentukan agama dengan distribusi yang diinginkan
    private function getAgama($faker)
    {
        $random = $faker->numberBetween(1, 100);
        if ($random <= 90) {
            return 'Islam';
        } elseif ($random <= 95) {
            return 'Kristen';
        } else {
            return $faker->randomElement(['Hindu', 'Budha', 'Katolik', 'Konghucu']);
        }
    }
}

