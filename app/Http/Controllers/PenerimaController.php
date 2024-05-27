<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\PenerimaModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenerimaController extends Controller
{
    public function index(){
        $breadcrumb = (object) [
            'title' => 'Daftar Penerima',
            'list'  => ['Home', 'Penerima']
        ];

        $page = (object) [
            'title' => 'Daftar penerima yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penerima';

        $penerima = PenerimaModel::all();

        return view('admin.penerima.index', [
            'penerima' => $penerima,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(){
        $penerima = PenerimaModel::all()->with('bansos', 'user');

        if(request()->id_penerima){
            $penerima->where('id_penerima', request()->id_penerima);
        }

        return DataTables::of($penerima)
        ->addIndexColumn()
        ->addColumn('aksi', function ($penerimas) {
            $btn = '<a href="' . url('/penerima/' . $penerimas->id_penerima) . '" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/penerima/' . $penerimas->id_penerima . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penerima/' . $penerimas->id_penerima) . '">' . csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Penerima',
            'list' => ['Home', 'Penerima', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah penerima baru'
        ];

        $activeMenu = 'penerima';

        $bansos = BansosModel::all();

        $warga = WargaModel::all();

        return view('admin.penerima.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'bansos' => $bansos,
            'warga' => $warga
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'usia' => 'required|integer',
            'pendapatan' => 'required|integer',
            'status_kesehatan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'notelp' => 'required|string|min:13|max:100',
            'id_bansos' => 'required|integer',
            'id_warga' => 'required|integer',
        ]);

        PenerimaModel::create([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'pendapatan' => $request->pendapatan,
            'status_kesehatan' => $request->status_kesehatan,
            'pekerjaan' => $request->pekerjaan,
            'notelp' => $request->notelp,
            'id_bansos' => $request->id_bansos,
            'id_warga' => $request->id_warga,
        ]);

        return redirect('/penerima')->with('success', 'Data penerima berhasil ditambahkan');
    }

    public function show(String $id){
        $penerima = PenerimaModel::with('bansos', 'user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penerima',
            'list' => ['Home', 'Penerima', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail penerima'
        ];

        $activeMenu = 'penerima';

        return view('admin.penerima.detail', [
            'penerima' => $penerima,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id){
        $penerima = PenerimaModel::find($id);
        $bansos = BansosModel::all();
        $warga = WargaModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Penerima',
            'list' => ['Home', 'Penerima', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit penerima'
        ];

        $activeMenu = 'penerima';

        return view('admin.penerima.edit', [
            'penerima' => $penerima,
            'bansos' => $bansos,
            'warga' => $warga,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, String $id){
        $request->validate([
            'nama' => 'required|string',
            'usia' => 'required|integer',
            'pendapatan' => 'required|integer',
            'status_kesehatan' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'notelp' => 'required|string|min:13|max:100',
            'id_bansos' => 'required|integer',
            'id_warga' => 'required|integer',
        ]);

        PenerimaModel::find($id)->update([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'pendapatan' => $request->pendapatan,
            'status_kesehatan' => $request->status_kesehatan,
            'pekerjaan' => $request->pekerjaan,
            'notelp' => $request->notelp,
            'id_bansos' => $request->id_bansos,
            'id_warga' => $request->id_warga,
        ]);

        return redirect('/penerima')->with('success', 'Data penerima berhasil diubah');
    }

    public function destroy($id){
        $penerima = PenerimaModel::find($id);
        $penerima->delete();

        return redirect('penerima');
    }
}
