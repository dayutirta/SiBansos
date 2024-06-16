<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerimaSeeder extends Seeder
{
    public function run()
    {
        $warga = DB::table('m_warga')->get();
        $nokk_list = $warga->pluck('nokk')->unique()->shuffle()->toArray();
        $total_nokk = count($nokk_list);
        $penerima_nokk_count = ceil(0.4 * $total_nokk);

        $selected_nokk = array_slice($nokk_list, 0, $penerima_nokk_count);

        $data = [];
        foreach ($selected_nokk as $nokk) {
            $warga_in_nokk = $warga->where('nokk', $nokk)->first();

            $data[] = [
                'id_bansos' => rand(1, 3), // Randomly choose between two types of bansos
                'id_warga' => $warga_in_nokk->id_warga,
                'pendapatan' => rand(1, 5),
                'status_rumah' => rand(1, 5),
                'pln' => rand(1, 5),
                'pdam' => rand(1, 5),
                'status_kesehatan' => rand(1, 5),
                'status' => 'Pending',
                'skoredas' => null,
                'skoresaw' => null,

            ];
        }

        DB::table('m_penerima')->insert($data);
    }
}

