<?php
namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\BantuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Bansos',
            'list'  => ['Home', 'Bansos']
        ];

        $page = (object) [
            'title' => 'Daftar bansos yang terdaftar dalam sistem'
        ];

        $activeMenu = 'bansos';

        $bantuan = BantuanModel::all();

        return view('admin.bansos.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bantuan' => $bantuan, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) 
    {
        $bansos = BansosModel::with('bantuan');

        if ($request->id_bantuan) {
            $bansos->where('id_bantuan', $request->id_bantuan);
        }

        return DataTables::of($bansos)
            ->addIndexColumn()
            ->addColumn('aksi', function ($bansoss) {
                $btn = '<a href="'.url('/bansos/' . $bansoss->id_bansos).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/bansos/' . $bansoss->id_bansos . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/bansos/'.$bansoss->id_bansos).'">'. csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
