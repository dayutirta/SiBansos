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
        @empty($penerima)
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
                    <th>Nama</th>
                    <td>{{ $penerima->nama }}</td>
                </tr>
                <tr>
                    <th>Id Warga</th>
                    <td>{{ $penerima->user->id_warga }}</td>
                <tr>
                <tr>
                    <th>Usia</th>
                    <td>{{ $penerima->usia }}</td>
                </tr>
                <tr>
                    <th>Program Bansos yang diterima</th>
                    <td>{{ $penerima->bansos->nama_program }}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>{{ $penerima->notelp }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('penerima') }}" class="btn btn-sm btn-default mt-2">
            kembali
        </a>
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush