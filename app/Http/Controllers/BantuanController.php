<?php

namespace App\Http\Controllers;

use App\Models\BantuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BantuanController extends Controller
{

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Bantuan',
            'list'  => ['Home', 'Bantuan']
        ];

        $page = (object) [
            'title' => 'Daftar bantuan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'bantuan';

        return view('admin.bantuan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $bantuan = BantuanModel::all();     

        return DataTables::of($bantuan)
        ->addIndexColumn()
        ->addColumn('aksi', function ($bantuans) {
            $btn = '<a href="'.url('/bantuan/' . $bantuans->id_bantuan . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/bantuan/'.$bantuans->id_bantuan).'">'. csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
           
        })
        ->rawColumns(['aksi'])
        ->make(true);
        }


    public function create()
    {
        $page = (object) [
            'title' => 'Daftar bantuan yang terdaftar dalam sistem'
        ];
        $breadcrumb = (object) [
            'title' => 'Tambah Bantuan',
            'list' => [
                'Home',
                'Bantuan',
                'Tambah Bantuan'
            ]
        ];

        $page = (object) [
            'title' => 'Tambah Bantuan',
        ];

        $activeMenu = 'bantuan';

        return view('admin.bantuan.create',[            'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bantuan' => 'required|string|max:10|unique:m_bantuan,kode_bantuan',
            'nama_bantuan' => 'required|string|max:100',
        ]);

        BantuanModel::create([
            'kode_bantuan' => $request->kode_bantuan,
            'nama_bantuan' => $request->nama_bantuan
        ]);

        return redirect('/bantuan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(String $id)
    {
        $bantuan = BantuanModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Bantuan',
            'list' => [
                'Home',
                'Bantuan',
                'Detail Bantuan'
            ]
        ];

        $page = (object) [
            'title' => 'Detail Bantuan',
        ];

        $activeMenu = 'bantuan';

        return view('admin.bantuan.detail', [
            'bantuan' => $bantuan,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(String $id)
    {
        $bantuan = BantuanModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Bantuan',
            'list' => [
                'Home',
                'Bantuan',
                'Edit Bantuan'
            ]
        ];

        $page = (object) [
            'title' => 'Edit Bantuan',
        ];

        $activeMenu = 'bantuan';

        return view('admin.bantuan.edit', [
            'bantuan' => $bantuan,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request,String $id)
    {
        $request->validate([
            'kode_bantuan' => 'required|string|max:10|unique:m_bantuan,kode_bantuan,'.$id.',id_bantuan',
            'nama_bantuan' => 'required|string|max:100',
        ]);

        BantuanModel::where('id_bantuan', $id)->update([
            'kode_bantuan' => $request->kode_bantuan,
            'nama_bantuan' => $request->nama_bantuan
        ]);

        return redirect('/bantuan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $bantuan = BantuanModel::find($id);
        $bantuan->delete();

        return redirect('bantuan');
    }
}
