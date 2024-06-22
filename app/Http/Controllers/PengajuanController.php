<?php
namespace App\Http\Controllers;

use App\Models\SuratModel;
use App\Models\WargaModel;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Surat',
            'list'  => ['Home', 'Surat']
        ];

        $page = (object) [
            'title' => 'Silahkan Daftar Terlebih Dahulu'
        ];

        $activeMenu = 'surat';
        $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
        $user = Auth::user();
        $level = $user->id_level;
        if($level == 1){
            return view('pengajuan.surat.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'activeMenu' => $activeMenu]);
        }elseif($level == 2){
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            return view('pengajuan.surat.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'activeMenu' => $activeMenu]);
        }else{
            return view('pengajuan.surat.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
        }
    }

    public function list(Request $request) 
    {   
        $user = Auth::user();
        $id_warga = $user->id_warga;
        $surat = PengajuanModel::with('warga', 'surat')->where('id_warga', $id_warga)->get();
        return DataTables::of($surat)
            ->addIndexColumn()
            ->addColumn('aksi', function ($surats) {
              
                if ($surats) {
                    if ($surats->status == 'Pending') 
                    {
                        return '<span>Surat kamu sedang di proses</span>';
                    } elseif ($surats->status == 'Diterima Rt') 
                    {   
                        return '<span>Menunggu persetujuan Pak RW</span>';
                    } elseif ($surats->status == 'Ditolak Rt') 
                    {   
                        return '<span>Surat kamu ' . $surats->status . ', pada ' . $surats->updated_at->format('d-m-Y') . '</span>'; 
                    } elseif ($surats->status == 'Ditolak Rw') 
                    {   
                        return '<span>Surat kamu ' . $surats->status . ', pada ' . $surats->updated_at->format('d-m-Y') . '</span>';
                    } elseif ($surats->status == 'Selesai'){
                        return '<span>Surat dapat diambil</span>';
                    }
                }
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Formulir Pengajuan Surat',
            'list' => ['Home','Pengajuan','Formulir']
        ];

        $page = (object) [
            'title' => 'Isi Formulir Berikut :',
        ];
        
        $activeMenu = 'surat';
        
        $surat = SuratModel::all(); 
        return view('pengajuan.surat.create', compact('breadcrumb', 'page', 'surat', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_surat' => 'required|integer',
            'ktp' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'kk' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'bukti_kepemilikan_rumah' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'keterangan' => 'required|string',
            'status' => 'required|string',
        ]);

        // Proses unggah file
        if ($request->hasFile('ktp') && $request->hasFile('kk') && $request->hasFile('bukti_kepemilikan_rumah')) 
        {
                // Mengambil file dari request
                $fileKtp = $request->file('ktp');
                $fileKk = $request->file('kk');
                $fileBukti = $request->file('bukti_kepemilikan_rumah');
                
                $customPath = 'C:/laragon/www/SIBANSOS/storage/app/public/foto/surat';
                // memastikan directory penyimpanan ada, jika tidak,  buat directory
                if (!file_exists($customPath)) {
                    mkdir($customPath, 0755, true);
                }              

                // Menyimpan file KTP
                $fileNameKtp = time() . '_' .$fileKtp->getClientOriginalName();
                $fileKtp->move($customPath, $fileNameKtp);
                $filePathKtp = '/storage/foto/surat' . $fileNameKtp;
    
                // Menyimpan file KK
                $fileNameKk = time() . '_' . $fileKk->getClientOriginalName();
                $fileKk->move($customPath, $fileNameKk);
                $filePathkk = '/storage/foto/surat' . $fileNameKk;
    
                // Menyimpan file Bukti Kepemilikan Rumah
                $fileNameBukti = time() . '_' . $fileBukti->getClientOriginalName();
                $fileBukti->move($customPath, $fileNameBukti);
                $filePathBukti = '/storage/foto/surat' . $fileNameBukti;

        } else {
            return redirect()->back()->withErrors(['error' => 'File KTP, KK, dan Bukti Kepemilikan Rumah diperlukan']);
        }
        
        $id_warga = auth()->user()->id_warga;
        PengajuanModel::create([
            'id_surat' => $request->id_surat,
            'id_warga' => $id_warga,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'ktp' => $filePathKtp,
            'kk' => $filePathkk,
            'bukti_kepemilikan_rumah' => $filePathBukti,
        ]);
            return redirect('/pengajuan-surat')->with('success', 'Data berhasil ditambahkan');
    }
    

    public function show()
    {
        $breadcrumb = (object) [
            'title' => 'Data Pendaftar Surat',
            'list'  => ['Home', 'Surat', 'Pengajuan']
        ];
    
        $page = (object) [
            'title' => 'Data Para Pengajuan Surat Pengantar'
        ];
    
        $activeMenu = 'surat';
    
        $surati = SuratModel::all();
        $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
        $user = Auth::user();
        $level = $user->id_level;
        if($level == 1){
        return view('admin.pengajuan.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'surati' => $surati, 'activeMenu' => $activeMenu]);
        }elseif($level == 2){
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            return view('admin.pengajuan.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'surati' => $surati, 'activeMenu' => $activeMenu]);
        }
    }

    public function showup(Request $request) 
    {
        
        $user = Auth::user();
        $level = $user->id_level;
                

        if($level == 2){
            $userRt = $user->rt;
            $pengajuan2 = PenerimaModel::with(['bansos', 'user'])->where('status','Pending')
            ->whereHas('user', function ($query) use ($userRt) {
            $query->where('rt', $userRt);});
            if ($request->id_bansos) {
                $pengajuan2->where('id_bansos', $request->id_bansos);
            }

        return DataTables::of($pengajuan2)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penerimas) {
                $btn = '<a href="' . url('/penerima/accept/' . $penerimas->id_penerima) . '" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Terima</a> ';
                $btn .= '<a href="' . url('/penerima/reject/' . $penerimas->id_penerima) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-times"></i> Tolak</a> ';

                
                return $btn;})
            ->rawColumns(['aksi'])
            ->make(true);
        }
        elseif($level == 1){
            $userRw = $user->rw;
            $pengajuan1 = PengajuanModel::with(['warga', 'surat'])->where('status','Diterima RT')
            ->whereHas('user', function ($query) use ($userRw) {
            $query->where('rw', $userRw);});
            if ($request->id_bansos) {
                $pengajuan1->where('id_bansos', $request->id_bansos);
            }
        return DataTables::of($pengajuan1)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penerimas) {
                $btn = '<a href="' . url('/penerima/accept/' . $penerimas->id_penerima) . '" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Terima</a> ';
                $btn .= '<a href="' . url('/penerima/reject/' . $penerimas->id_penerima) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-times"></i> Tolak</a> ';


                return $btn;})
            ->rawColumns(['aksi'])
            ->make(true);
        } 
    }
    
    public function accept($id)
    {
        // Mengambil data penerima berdasarkan ID
        $penerima = PenerimaModel::find($id);
    
        if ($penerima) {
            $penerima->status = 'Diterima';
            // Simpan status penerima
            $penerima->save();
            // Mengambil semua data penerima dengan status 'Diterima' dan id_bansos yang sama
            $penerimas = PenerimaModel::where('status', 'Diterima')
            ->where('id_bansos', $penerima->id_bansos)
            ->get();
    
            // Memastikan bahwa tidak ada data penerima yang kosong
            if ($penerimas->isEmpty()) {
                return redirect()->back()->with('error', 'Tidak ada data penerima untuk dihitung.');
            }
    
            // Membuat matriks keputusan
            $matrix = [];
            foreach ($penerimas as $item) {
                $matrix[] = [
                    intval($item->pendapatan),
                    intval($item->status_rumah),
                    intval($item->pln),
                    intval($item->pdam),
                    intval($item->status_kesehatan)
                ];
            }
    
            // Bobot kriteria
            $bobot = [0.30, 0.20, 0.15, 0.20, 0.15];
    
            // Memanggil function Normalisasi
            $Nmatrix = $this->normalisasi($matrix);
    
            // Menghitung nilai EDAS
            $edas = $this->menghitung_edas($Nmatrix, $bobot);
            // Menghitung nilai SAW
            $saw = $this->menghitung_saw($Nmatrix, $bobot);
            
           // Menyimpan skor ke dalam model
            foreach ($penerimas as $index => $item) {
                $item->skoredas = $edas[$index];
                $item->skoresaw = $saw[$index];
                $item->save();
            }
    
            
    
            return redirect()->back()->with('success', 'Data penerima Berhasil Diterima');
        } else {
            return redirect()->back()->with('error', 'Data penerima tidak ditemukan');
        }
    }

    public function reject($id)
    {
        $penerima = PenerimaModel::find($id);
        if ($penerima) {
            $penerima->status = 'Ditolak';
            $penerima->save();
        }

        return redirect()->back()->with('success', 'Data Penerimma Berhasil Ditolak');
    }
}