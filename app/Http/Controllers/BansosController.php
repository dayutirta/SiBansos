<?php
namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\BantuanModel;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $id_level = $user->id_level;
        $activeMenu = 'bansos';
        $penerimaCount = Penerimamodel::where('status', 'Pending')->count();
        $pengajuanCount = PengajuanModel::where('status', 'Pending')->count();
        $rt_logged_in = $user->rt;
        
        $bantuan = BantuanModel::all();
        if ($id_level == 1) {
            return view('admin.bansos.index', ['penerimaCount' => $penerimaCount,'breadcrumb' => $breadcrumb, 'page' => $page, 'bantuan' => $bantuan, 'activeMenu' => $activeMenu,'pengajuanCount' => $pengajuanCount]);
        }
        elseif($id_level == 2){
            $penerimaCount = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $pengajuanCount = PengajuanModel::whereHas('warga', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            return view('rt.bansos.index', ['penerimaCount' => $penerimaCount,'breadcrumb' => $breadcrumb, 'page' => $page, 'bantuan' => $bantuan, 'activeMenu' => $activeMenu,'pengajuanCount' => $pengajuanCount]);
        }
        
    }

    public function list(Request $request) 
    {
        $bansos = BansosModel::with('bantuan');
        $user = Auth::user();
        $level = $user->id_level;
    
        if ($request->id_bantuan) {
            $bansos->where('id_bantuan', $request->id_bantuan);
        }
    
        $today = now(); // Get the current date and time
    
        if ($level == '1') {
            return DataTables::of($bansos)
                ->addIndexColumn()
                ->addColumn('aksi', function ($bansoss) use ($today) {
                    $btn = '<a href="'.url('/bansos/cek/' . $bansoss->id_bansos ).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                    if ($bansoss->tanggal_akhir >= $today) {
                        $btn .= '<a href="'.url('/bansos/' . $bansoss->id_bansos . '/edit').'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                        $btn .= '<form class="d-inline-block" method="POST" action="'. url('/bansos/'.$bansoss->id_bansos).'">'. csrf_field() . method_field('DELETE') .
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-trash-alt"></i></button></form>';
                    }
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        } elseif ($level == '2') {
            return DataTables::of($bansos)
                ->addIndexColumn()
                ->addColumn('aksi', function ($bansossi) {
                    $btn = '<a href="'.url('/bansos/' . $bansossi->id_bansos).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        } else {
            return DataTables::of($bansos)->make(true);
        }
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

    public function show(String $id_bansos){
        $user = Auth::user();
        $userRt = $user->rt; 
        
        $bansos = BansosModel::with('bantuan')->where('id_bansos', $id_bansos)->first();
    
        $penerima = PenerimaModel::with(['user', 'bansos'])
            ->where('id_bansos', $id_bansos)
            ->where('status', 'Diterima')
            ->whereHas('user', function ($query) use ($userRt) {
                $query->where('rt', $userRt);
            })
            ->get();
    
        $breadcrumb = (object) [
            'title' => 'Detail Bansos',
            'list' => [
                'Home',
                'Bansos',
                'Detail Bansos'
            ]
        ];
    
        $page = (object) [
            'title' => 'Detail Bansos',
        ];
    
        $activeMenu = 'bansos';
        
        $id_level = $user->id_level;
        if($id_level == 1){
            return view('admin.bansos.detail', [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'bansos' => $bansos,
                'activeMenu' => $activeMenu
            ]);
        }
        else{
            return view('rt.bansos.detail', [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'bansos' => $bansos,
                'penerima' => $penerima,
                'activeMenu' => $activeMenu
            ]);
        }
    }
 
    public function cek(String $id_bansos){
        $bansos = BansosModel::with('bantuan')->where('id_bansos', $id_bansos)->first();
    
        $penerima = PenerimaModel::with(['user', 'bansos'])
        ->where('id_bansos', $id_bansos)
        ->where('status', 'Diterima')
        ->get();
    
        $breadcrumb = (object) [
            'title' => 'Detail Bansos',
            'list' => [
                'Home',
                'Bansos',
                'Detail Bansos'
            ]
        ];
    
        $page = (object) [
            'title' => 'Detail Bansos',
        ];
    
        $activeMenu = 'bansos';
        return view('rt.bansos.detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'bansos' => $bansos,
            'penerima' => $penerima,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id_bansos)
    {
        $bansos = BansosModel::where('id_bansos', $id_bansos)->first();
        $bantuan = BantuanModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Bansos',
            'list' => [
                'Home',
                'Bansos',
                'Edit Bansos'
            ]
        ];

        $page = (object) [
            'title' => 'Edit Bansos',
        ];

        $activeMenu = 'bansos';

        return view('admin.bansos.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'bansos' => $bansos,
            'bantuan' => $bantuan,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, String $id_bansos)
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

        $bansos = BansosModel::where('id_bansos', $id_bansos)->first();

        if ($bansos) {
            $bansos->update([
            'id_bantuan' => $request->id_bantuan,
            'nama_program' => $request->nama_program,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jumlah_penerima' => $request->jumlah_penerima,
            'anggaran' => $request->anggaran,
            'lokasi' => $request->lokasi
            ]);
        }

        return redirect('/bansos')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $bansos = BansosModel::find($id);
        $bansos->delete();

        return redirect('bansos');
    }
}

// $btn = '<a href="'.url('/bansos/' . $bansoss->id_bansos).'" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a> '; // Detail
// $btn .= '<a href="'.url('/bansos/' . $bansoss->id_bansos . '/edit').'" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a> '; 
// $btn .= '<form class="d-inline-block" method="POST" action="'. url('/bansos/'.$bansoss->id_bansos).'">'. csrf_field() . method_field('DELETE') .
//         '<button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-trash-alt"></i></button></form>'; 
// $btn .= '<a href="'.url('/bansos/cek/' . $bansoss->id_bansos ).'" class="btn btn-outline-success  btn-sm"><i class="fas fa-user-check"></i> Cek Penerima</a> '; 