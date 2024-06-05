<?php
namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\WargaModel;
use App\Models\PenerimaModel;
use App\Models\BantuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

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
                    $btn = '<a href="'.url('/pengajuan-bansos/create/'.$bansoss->id_bansos).'" class="btn btn-primary btn-sm">Daftar</a>';
                    return $btn;
                }
                
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar menjadi Penerima Bansos',
            'list' => ['Home','Bansos','Daftar Penerima']
        ];

        $page = (object) [
            'title' => 'Isi Formulir Berikut :',
        ];
        
        $activeMenu = 'bansos';
        $id_bansos = request()->segment(3); 
        return view('pengajuan.bansos.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'id_bansos' => $id_bansos,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //verifikasi data
            'nik' => 'required|string',
            'nokk' => 'required|string',
            'nama' => 'required|string', 
            'pekerjaanx' => 'required|string',
            'pekerjaany' => 'required|string',
            'gajix' => 'required|integer',
            'gajiy' => 'required|integer',
            'kewarganegaraan' => 'required|string',
            //data penerima
            'pln' => 'required|integer',
            'pdam' => 'required|integer',
            'status_kesehatan' => 'required|integer',
            'status_rumah' => 'required|integer',
        ]);
        
        // Hitung nilai pendapatan berdasarkan gajix dan gajiy
        $gajix = $request->input('gajix');
        $gajiy = $request->input('gajiy');
        $average_gaji = ($gajix + $gajiy) / 2;
    
        if ($average_gaji <= 1000000) {
            $pendapatan = 5;
        } elseif ($average_gaji >= 1000000 && $average_gaji <= 1500000) {
            $pendapatan = 4;
        } elseif ($average_gaji >= 1500000 && $average_gaji <= 2000000) {
            $pendapatan = 3;
        } elseif ($average_gaji >= 2000000 && $average_gaji <= 2500000) {
            $pendapatan = 2;
        } else {
            $pendapatan = 1;
        }
        $id_warga = auth()->user()->id_warga;
        // Simpan data ke database
        PenerimaModel::create([
            'pendapatan' => $pendapatan,
            'pln' => $request->pln,
            'pdam' => $request->pdam,
            'status_kesehatan' => $request->status_kesehatan,
            'status_rumah' => $request->status_rumah,
            'id_bansos'=> $request->input('id_bansos'),
            'status'=> $request->input('status'),
            'id_warga' => $id_warga,
        ]);
    
        return redirect('/pengajuan-bansos')->with('success', 'Pendaftaran sukses harap menunggu data selesai di verifikasi');
    }

    public function show()
    {
        $breadcrumb = (object) [
            'title' => 'Data Pendaftar Bansos',
            'list'  => ['Home', 'Bansos','Pendaftar']
        ];

        $page = (object) [
            'title' => 'Data Para Pendaftar Bansos'
        ];

        $activeMenu = 'penerima';

        $bansos = BansosModel::all();

        return view('admin.penerima.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bansos' => $bansos, 'activeMenu' => $activeMenu]);
    }

    public function showup(Request $request) 
    {
        
        $user = Auth::user();
        $userRt = $user->rt; 
        $penerima = PenerimaModel::with(['bansos', 'user'])
        ->whereHas('user', function ($query) use ($userRt) {
            $query->where('rt', $userRt);
        });

    
        if ($request->id_bansos) {
            $penerima->where('id_bansos', $request->id_bansos);
        }

        return DataTables::of($penerima)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penerimas) {
                $btn = '<a href="' . url('/penerima/accept/' . $penerimas->id_penerima) . '" class="btn btn-success btn-sm">Terima</a> ';
                $btn .= '<a href="' . url('/penerima/reject/' . $penerimas->id_penerima) . '" class="btn btn-danger btn-sm onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Tolak</a> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

        public function accept($id)
    {
        $penerima = PenerimaModel::find($id);
        if ($penerima) {
            $penerima->status = 'Diterima';
            $penerima->save();
        }

        return redirect()->back()->with('success', 'Data penerimma sudah diterima');
    }

    public function reject($id)
    {
        $penerima = PenerimaModel::find($id);
        if ($penerima) {
            $penerima->status = 'Ditolak';
            $penerima->save();
        }

        return redirect()->back()->with('success', 'Data penerimma sudah ditolak');
    }
    
}