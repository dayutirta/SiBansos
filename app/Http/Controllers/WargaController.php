<?php

namespace App\Http\Controllers;

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

        $warga = WargaModel::all();

        return view('admin.warga.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'warga' => $warga, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) 
    {
        $warga = WargaModel::with('level');

        // if ($request->nik) {
        //     $warga->where('nik', $request->nik);
        // }

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="'.url('/warga/' . $wargas->nik).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/warga/' . $wargas->nik . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/warga/'.$wargas->nik).'">'. csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
