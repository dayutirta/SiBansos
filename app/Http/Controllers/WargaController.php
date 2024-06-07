<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class WargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Warga',
            'list'  => ['Home', 'Warga']
        ];

        $page = (object) [
            'title' => 'Daftar warga yang terdaftar dalam sistem'
        ];

        $activeMenu = 'warga';

        $rts = WargaModel::select('rt')->distinct()->get();

        return view('admin.warga.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'rts' => $rts, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $userLevel = $user->id_level;
        $userRt = $user->rt;

        $warga = WargaModel::with('level');

        if ($userLevel == 1) {
            // Level RW: dapat melihat semua data
            if ($request->rt) {
                $warga->where('rt', $request->rt);
            }
        } elseif ($userLevel == 2) {
            // Level RT: dapat melihat data dirinya sendiri dan data warga dengan RT yang sama
            $warga->where(function ($query) use ($user, $userRt) {
                $query->where('id_warga', $user->id_warga)
                    ->orWhere('rt', $userRt);
            });
        } elseif ($userLevel == 3) {
            // Level Warga: dapat melihat data dirinya sendiri
            $warga->where('id_warga', $user->id_warga);
        }

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="' . url('/warga/' . $wargas->id_warga) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/warga/' . $wargas->id_warga . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/warga/' . $wargas->id_warga) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga',
            'list' => [
                'Home',
                'Warga',
                'Tambah Warga'
            ]
        ];

        $page = (object) [
            'title' => 'Tambah Warga',
        ];

        $level = LevelModel::all();

        $activeMenu = 'warga';

        $user = Auth::user();
        $rt = null;

        if ($user->id_level == 2) {
            $rt = $user->rt;
        }

        // dd($rt);

        return view('admin.warga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    // public function create()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Tambah Warga',
    //         'list' => [
    //             'Home',
    //             'Warga',
    //             'Tambah Warga'
    //         ]
    //     ];

    //     $page = (object) [
    //         'title' => 'Tambah Warga',
    //     ];

    //     $level = LevelModel::all();

    //     $activeMenu = 'warga';

    //     $user = Auth::user(); // Ambil data pengguna yang login
    //     $rt = null;

    //     if ($user->id_level == 2) { // Jika pengguna adalah level RT
    //         $rt = $user->rt; // Misalnya, pengguna memiliki atribut 'rt'
    //     }

    //     return view('admin.warga.create', [
    //         'breadcrumb' => $breadcrumb,
    //         'page' => $page,
    //         'level' => $level,
    //         'activeMenu' => $activeMenu,
    //         'rt' => $rt // Kirim data 'rt' ke view
    //     ]);
    // }


    public function store(Request $request)
    {
        $request->validate([
            'id_level' => 'required|integer',
            'nik' => 'required|string',
            'nokk' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendidikan' => 'required|string',
            'status_pernikahan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ]);

        WargaModel::create([
            'id_level' => $request->id_level,
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status' => $request->status,
            'kewarganegaraan' => $request->kewarganegaraan,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'status_pernikahan' => $request->status_pernikahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect('/warga')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(String $id_warga)
    {
        $warga = WargaModel::with('level')->where('id_warga', $id_warga)->first();

        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => [
                'Home',
                'Warga',
                'Detail Warga'
            ]
        ];

        $page = (object) [
            'title' => 'Detail Warga',
        ];

        $activeMenu = 'warga';

        return view('admin.warga.detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'warga' => $warga,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id_warga)
    {
        $warga = WargaModel::where('id_warga', $id_warga)->first();
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => [
                'Home',
                'Warga',
                'Edit Warga'
            ]
        ];

        $page = (object) [
            'title' => 'Edit Warga',
        ];

        $activeMenu = 'warga';

        return view('admin.warga.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'warga' => $warga,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }


    public function update(Request $request, String $id_warga)
    {
        $request->validate([
            'id_level' => 'required|integer',
            'nik' => 'required|string',
            'nokk' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'pekerjaan' => 'required|string',
            'pendidikan' => 'required|string',
            'status_pernikahan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ]);

        $warga = WargaModel::where('id_warga', $id_warga)->first();

        if ($warga) {
            $warga->update([
                'id_level' => $request->id_level,
                'nik' => $request->nik,
                'nokk' => $request->nokk,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'kewarganegaraan' => $request->kewarganegaraan,
                'pekerjaan' => $request->pekerjaan,
                'pendidikan' => $request->pendidikan,
                'status_pernikahan' => $request->status_pernikahan,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ]);
        }

        return redirect('/warga')->with('success', 'Data berhasil diubah');
    }
}
