<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RiwayatController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Riwayat warga yang pernah terdaftar dalam sistem'
        ];
        $activeMenu = 'riwayat';
        $user = Auth::user();
        $nokkrw = WargaModel::select('nokk')
            ->where('rt', $user->rt)
            ->where('status', '!=', 'Aktif')
            ->distinct()->get();
        $level = $user->id_level;

        if ($level == 1) {
            $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
            $pengajuanCount = pengajuanModel::where('status', 'Pending')->count();
            $nokkrw = WargaModel::select('nokk')
                ->where('status', '!=', 'Aktif')
                ->distinct()->get();
            $breadcrumb = (object) [
                'title' => 'Daftar Riwayat Warga',
                'list' => ['Home', 'Riwayat']
            ];
            return view('admin.riwayat.index', [
                'breadcrumb' => $breadcrumb,
                'penerimaCount' => $penerimaCount,
                'pengajuanCount' => $pengajuanCount,
                'page' => $page,
                'nokkrw' => $nokkrw,
                'activeMenu' => $activeMenu
            ]);
        } elseif ($level == 2) {
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $pengajuanCount = pengajuanModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $breadcrumb = (object) [
                'title' => 'Daftar Riwayat Warga per RT',
                'list' => ['Home', 'Riwayat']
            ];
            return view('admin.riwayat.index', [
                'breadcrumb' => $breadcrumb,
                'penerimaCount' => $penerimaCount,
                'pengajuanCount' => $pengajuanCount,
                'page' => $page,
                'nokkrw' => $nokkrw,
                'activeMenu' => $activeMenu
            ]);
        }
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $userLevel = $user->id_level;
        $userRt = $user->rt;

        $warga = WargaModel::with('level')->where('status', '!=', 'Aktif');
        if ($request->nokk) {
            $warga->where('nokk', $request->nokk);
        }
        if ($userLevel == 2) {
            $warga->where(function ($query) use ($user, $userRt) {
                $query->where('id_warga', $user->id_warga)
                    ->orWhere('rt', $userRt);
            });
            return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="' . url('/riwayat/' . $wargas->id_warga) . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }else{
            return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="' . url('/riwayat/' . $wargas->id_warga) . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
    }

    public function show(String $id)
    {
        $riwayat = WargaModel::with('level')->where('id_warga', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => [
                'Home',
                'Riwayat',
                'Detail Riwayat'
            ]
        ];

        $page = (object) [
            'title' => 'Detail Warga',
        ];

        $activeMenu = 'riwayat';

        return view('admin.riwayat.detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'riwayat' => $riwayat,
            'activeMenu' => $activeMenu
        ]);
    }
}
