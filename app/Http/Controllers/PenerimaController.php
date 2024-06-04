<?php
namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\BantuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenerimaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Bansos',
            'list'  => ['Home', 'Bansos']
        ];

        $page = (object) [
            'title' => 'Silahkan Daftar Terlebih Dahulu'
        ];

        $activeMenu = 'bansos';

        $bantuan = BantuanModel::all();

        return view('pengajuan.bansos.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bantuan' => $bantuan, 'activeMenu' => $activeMenu]);
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
                if ( $bansoss->tanggal_akhir <= now()) {
                    return '';
                }
                else {
                    $btn = '<a href="'.url('/bansos/create').'" class="btn btn-primary btn-sm">Daftar</a>';
                    return $btn;
                }
                
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Bansos',
            'list' => ['Home','Bansos','Tambah Bansos']
        ];

        $page = (object) [
            'title' => 'Tambah Bansos',
        ];

        $bantuan = BantuanModel::all();

        $activeMenu = 'bansos';

        return view('admin.bansos.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'bantuan' => $bantuan,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bantuan' => 'required|integer',
            'nama_program' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'jumlah_penerima' => 'required|int',
            'anggaran' => 'required|int',
            'lokasi' => 'required|string'
        ]);

        BansosModel::create([
            'id_bantuan' => $request->id_bantuan,
            'nama_program' => $request->nama_program,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jumlah_penerima' => $request->jumlah_penerima,
            'anggaran' => $request->anggaran,
            'lokasi' => $request->lokasi
        ]);

        return redirect('/bansos')->with('success', 'Data berhasil ditambahkan');
    }
}