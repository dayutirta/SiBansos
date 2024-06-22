<?php

namespace App\Http\Controllers;

use App\Models\SuratModel;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SuratController extends Controller
{

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Surat',
            'list'  => ['Home', 'Surat']
        ];

        $page = (object) [
            'title' => 'Daftar surat yang terdaftar dalam sistem'
        ];

        $activeMenu = 'surat';
        $penerimaCount = Penerimamodel::where('status', 'Pending')->count();
        $pengajuanCount = Pengajuanmodel::where('status', 'Pending')->count();
        return view('admin.surat.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'penerimaCount' => $penerimaCount,
            'pengajuanCount' => $pengajuanCount,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $surat = SuratModel::all();     

        return DataTables::of($surat)
        ->addIndexColumn()
        ->addColumn('aksi', function ($surats) {
            $btn = '<a href="'.url('/surat/' . $surats->id_surat . '/edit').'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/surat/'.$surats->id_surat).'">'. csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-trash-alt"></i></button></form>';
            return $btn;
           
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function edit(String $id)
    {
        $surat = SuratModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Surat',
            'list' => [
                'Home',
                'Surat',
                'Edit Surat'
            ]
        ];

        $page = (object) [
            'title' => 'Edit Surat',
        ];

        $activeMenu = 'surat';

        return view('admin.surat.edit', [
            'surat' => $surat,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request,String $id)
    {
        $request->validate([
            'kode_surat' => 'required|string|max:10|unique:m_surat,kode_surat,'.$id.',id_surat',
            'nama_surat' => 'required|string|max:100',
        ]);

        SuratModel::where('id_surat', $id)->update([
            'kode_surat' => $request->kode_surat,
            'nama_surat' => $request->nama_surat
        ]);

        return redirect('/surat')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $surat = SuratModel::find($id);
        $surat->delete();

        return redirect('surat');
    }
}
