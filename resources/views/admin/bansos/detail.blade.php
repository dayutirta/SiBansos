@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{ $page->title }}
        </h3>
        <div class="card-tools">

        </div>
    </div>
    <div class="card-body">
        @empty($bansos)
            <div class="alert alert-danger alert-dismissible">
                <h5>
                    <i class="icon fas fa-ban">
                        Kesalahan!
                    </i>
                    Data yang anda cari tidak ditemukan!
                </h5>
            </div>
            @else
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID Bantuan</th>
                    <td>{{ $bansos->id_bantuan }}</td>
                </tr>
                <tr>
                    <th>Nama Program</th>
                    <td>{{ $bansos->nama_program }}</td>
                </tr>
                <tr>
                    <th>Jenis Bantuan</th>
                    <td>{{ $bansos->bantuan->nama_bantuan }}</td>
                <tr>
                <tr>
                    <th>Tanggal Mulai</th>
                    <td>{{ $bansos->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <th>Tanggal Akhir</th>
                    <td>{{ $bansos->tanggal_akhir }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penerima</th>
                    <td>{{ $bansos->jumlah_penerima }}</td>
                </tr>
                <tr>
                    <th>Anggaran</th>
                    <td>{{ $bansos->anggaran }}</td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $bansos->lokasi }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('bansos') }}" class="btn btn-sm btn-default mt-2">
            kembali
        </a>
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush