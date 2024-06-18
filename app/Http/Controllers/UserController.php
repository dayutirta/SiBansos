<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\WargaModel;
use App\Models\PenerimaModel;
use Carbon\carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $level_id = $user->id_level;
        
        if ($user->id_level == '1'){
            $breadcrumb = (object) ['title' => 'Homepage RW','list' => ['Home','Welcome']];
            $page = (object) ['title' => 'Selamat Datang di Halaman Dashboard RW'];
            $activeMenu = 'dashboard';
            $rw_logged_in = $user->rw;

        try {
            // Inisialisasi array untuk menyimpan jumlah warga per RT
            $warga_per_rt = [];

            // Loop untuk menghitung jumlah warga per RT
            $rt = WargaModel::distinct('rt')->count();
            for ($i = 1; $i <= $rt; $i++) {
                $warga_per_rt["rt$i"] = WargaModel::where('rw', $rw_logged_in)->where('rt', $i)->count();
            }

            $totalWarga = WargaModel::count();
            $nokk = WargaModel::distinct('nokk')->count();
            $totalSPenerima = PenerimaModel::where('status','Diterima')->count();
            $jumlahDiterima = PenerimaModel::whereHas('user', function($query) use ($rw_logged_in) {
                $query->where('rw', $rw_logged_in);
            })->where('status', 'Diterima')->count();

            $jumlahDitolak = PenerimaModel::whereHas('user', function($query) use ($rw_logged_in) {
                $query->where('rw', $rw_logged_in);
            })->where('status', 'Ditolak')->count();

            $jumlahPending = PenerimaModel::whereHas('user', function($query) use ($rw_logged_in) {
                $query->where('rw', $rw_logged_in);
            })->where('status', 'Pending')->count();

            return view('admin.index', [
                'level_id' => $level_id,
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'activeMenu' => $activeMenu,
                'labels' => ['Warga'],
                'dataSets' => array_map(function ($key) use ($warga_per_rt) {
                    return [
                        'label' => strtoupper($key),
                        'data' => [$warga_per_rt[$key]],
                    ];
                }, array_keys($warga_per_rt)),
                'totalWarga' => $totalWarga,
                'totalSPenerima' => $totalSPenerima,
                'jumlahPending' => $jumlahPending,
                'nokk' => $nokk,
                'pieData' => [
                    'labels' => ['Diterima', 'Ditolak', 'Pending'],
                    'data' => [$jumlahDiterima, $jumlahDitolak, $jumlahPending]
                ]
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal memuat data warga: ' . $e->getMessage());
            }
        }       
        elseif ($user->id_level == '2') {
            $breadcrumb = (object) [
                'title' => 'Homepage RT',
                'list' => ['Home', 'Welcome']
            ];
            $page = (object) ['title' => 'Selamat Datang di Halaman Dashboard RT'];
            $activeMenu = 'dashboard';
            $rt_logged_in = Auth::user()->rt;
        
            try {
                // Fetch data based on the logged-in user's RT
                $jumlahLaki = WargaModel::where('rt', $rt_logged_in)->where('jenis_kelamin', 'Laki-laki')->count();
                $jumlahPerempuan = WargaModel::where('rt', $rt_logged_in)->where('jenis_kelamin', 'Perempuan')->count();
                $totalWarga = $jumlahLaki + $jumlahPerempuan;
                $totalSWarga = WargaModel::where('rt', $rt_logged_in)->count();
                
                $totalSPenerima = PenerimaModel::count();
                // Fetch recipient data
                $jumlahDiterima = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                    $query->where('rt', $rt_logged_in);
                })->where('status', 'Diterima')->count();
        
                $jumlahDitolak = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                    $query->where('rt', $rt_logged_in);
                })->where('status', 'Ditolak')->count();

                $jumlahPending = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                    $query->where('rt', $rt_logged_in);
                })->where('status', 'Pending')->count();

                return view('rt.index', [
                    'breadcrumb' => $breadcrumb,
                    'level_id' => $level_id,
                    'page' => $page,
                    'activeMenu' => $activeMenu,
                    'labels' => ['RT ' . $rt_logged_in],
                    'dataSets' => [
                        [
                            'label' => 'Laki-laki',
                            'data' => [$jumlahLaki],
                        ],
                        [
                            'label' => 'Perempuan',
                            'data' => [$jumlahPerempuan],
                        ]
                    ],
                    'totalWarga' => $totalWarga,
                    'totalSWarga' => $totalSWarga,
                    'totalSPenerima' => $totalSPenerima,
                    'jumlahPending' => $jumlahPending,
                    'pieData' => [
                        'labels' => ['Diterima', 'Ditolak', 'Pending'],
                        'data' => [$jumlahDiterima, $jumlahDitolak, $jumlahPending]
                    ]
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal memuat data warga: ' . $e->getMessage());
            }
        }
        
        else if ($user->id_level == '3') {
            $breadcrumb = (object) [
                'title' => 'Homepage Warga',
                'list' => ['Home','Welcome']
            ];
            $page = (object) ['title' => 'Selamat datang di halaman warga'];
            $activeMenu = 'dashboard';
            return view('user.index', ['breadcrumb' => $breadcrumb,'page' => $page,'activeMenu' => $activeMenu]);
        }
    }
}