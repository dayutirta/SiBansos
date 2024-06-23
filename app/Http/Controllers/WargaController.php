<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\WargaModel;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class WargaController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Daftar warga yang terdaftar dalam sistem'
        ];
        $activeMenu = 'warga'; 
        $user = Auth::user();
        $nokk = WargaModel::select('nokk')->where('rt', $user->rt)->distinct()->get();
        $level = $user->id_level;
        $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
        $pengajuanCount = pengajuanModel::where('status', 'Pending')->count();

        if ($level == 1){
            $nokkrw = WargaModel::select('nokk')->distinct()->get();
            $breadcrumb = (object) [
                'title' => 'Daftar Warga',
                'list'  => ['Home', 'Warga']
            ];
            return view('admin.warga.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount,'pengajuanCount' => $pengajuanCount, 'page' => $page, 'nokkrw' => $nokkrw, 'activeMenu' => $activeMenu]);    
        }
        elseif($level == 2){
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $pengajuanCount = pengajuanModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $breadcrumb = (object) [
            'title' => 'Daftar Warga RT',
            'list'  => ['Home', 'Warga']
        ];
            return view('rt.warga.index', ['breadcrumb' => $breadcrumb,'pengajuanCount' => $pengajuanCount,'penerimaCount' => $penerimaCount, 'page' => $page,'nokk' => $nokk, 'activeMenu' => $activeMenu]);    
        }
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $userLevel = $user->id_level;
        $userRt = $user->rt;
        
        $warga = WargaModel::with('level')->where('status', '=', 'Aktif');
        if ($request->nokk) {
            $warga->where('nokk', $request->nokk);
        }
        if ($userLevel == 2) {
            $warga->where(function ($query) use ($user, $userRt) {
                $query->where('id_warga', $user->id_warga)
                    ->orWhere('rt', $userRt);
            });
            if ($request->nokk) {
                $warga->where('nokk', $request->nokk);
            }
            return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="' . url('/warga/' . $wargas->id_warga) . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                $btn .= '<a href="' . url('/warga/' . $wargas->id_warga . '/edit') . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                $btn .= '<a href="' . url('/warga/' . $wargas->id_warga . '/ubah_status') . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        } else {
            return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargas) {
                $btn = '<a href="' . url('/warga/' . $wargas->id_warga) . '" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> ';
                $btn .= '<a href="' . url('/warga/' . $wargas->id_warga . '/edit') . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                $btn .= '<a href="' . url('/warga/' . $wargas->id_warga . '/ubah_status') . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
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

        return view('admin.warga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

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
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:5120',
        ]);
    
        // Proses unggah file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Tentukan path penyimpanan secara manual
            $customPath = 'C:/laragon/www/SIBANSOS/storage/app/public/foto'; // Path penyimpanan sesuai dengan yang Anda tentukan
    
            // Pastikan directory penyimpanan ada, jika tidak, buat directory
            if (!file_exists($customPath)) {
                mkdir($customPath, 0755, true);
            }
    
            // Pindahkan file ke path yang ditentukan
            $file->move($customPath, $filename);
    
            // Set path file untuk disimpan di database
            $filePath = '/storage/foto/' . $filename;

    
            // Cek apakah path tidak kosong
            if (!$filePath) {
                return redirect()->back()->withErrors(['foto' => 'File upload failed']);
            }
        } else {
            return redirect()->back()->withErrors(['foto' => 'File upload failed']);
        }
    
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
            'foto' => $filePath, // Simpan path file di database
        ]);
    
        return redirect('/warga')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function show(String $id)
    {
        
        $warga = WargaModel::with('level')->where('id_warga', $id)->first();
        $nokk=$warga->nokk;

        $keluarga = WargaModel::with('level')->where('nokk', $nokk)->get();
        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => [
                'Home',
                'Warga',
                'Detail Warga'
            ]
        ];

        $page = (object) [
            'title' => 'Detail Keluarga Warga',
        ];

        $activeMenu = 'warga';

        return view('admin.warga.detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'keluarga' => $keluarga,
            'warga' => $warga,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(String $id)
    {
        $warga = WargaModel::where('id_warga', $id)->first();
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

    public function update(Request $request, String $id)
    {
        $request->validate([
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
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);
    
        $warga = WargaModel::find($id);
    
        if (!$warga) {
            return redirect()->back()->withErrors(['message' => 'Data warga tidak ditemukan']);
        }
    
        // Handle file upload if new file is provided
        if ($request->hasFile('foto')) {
            // Validate and store the new file
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Specify storage path
            $customPath = 'C:/laragon/www/SIBANSOS/storage/app/public/foto';
    
            // Ensure storage directory exists, if not, create it
            if (!file_exists($customPath)) {
                mkdir($customPath, 0755, true);
            }
    
            // Move file to specified path
            $file->move($customPath, $filename);
    
            // Set file path to be saved in the database
            $filePath = '/storage/foto/' . $filename;
    
            // Update warga data including the new photo path
            $warga->update([
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
                'foto' => $filePath, // Save new file path in database
            ]);
    
        } else {
            // Update warga data without changing the photo
            $warga->update([
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
    

    public function ubahStatus(String $id)
    {
        $breadcrumb = (object) [
            'title' => 'Ubah Status Warga',
            'list' => [
                'Home',
                'Warga',
                'Ubah Status Warga'
            ]
        ];

        $page = (object) [
            'title' => 'Ubah Status Warga',
        ];

        $warga = WargaModel::where('id_warga', $id)->first();

        $activeMenu = 'warga';

        return view('admin.warga.status', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'warga' => $warga,
            'activeMenu' => $activeMenu
        ]);
    }

    public function updateStatus(Request $request, String $id)
    {
            $request->validate([
                'status' => 'required|string',
            ]);
    
            $warga = WargaModel::where('id_warga', $id)->first();
    
            if ($warga) {
                $warga->update([
                    'status' => $request->status,
                ]);
            }
        return redirect('/warga')->with('success', 'Status warga berhasil diubah');
    }
}
