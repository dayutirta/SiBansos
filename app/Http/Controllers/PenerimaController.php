<?php
namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\PenerimaModel;
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
            'id_warga' => $id_warga,
        ]);
    
        return redirect('/pengajuan-bansos')->with('success', 'Pendaftaran sukses harap menunggu data selesai di verifikasi');
    }
    
}