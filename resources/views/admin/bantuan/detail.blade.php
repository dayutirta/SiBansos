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
        @empty($bantuan)
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
                    <th>Kode Bantuan</th>
                    <td>{{ $bantuan->kode_bantuan }}</td>
                </tr>
                <tr>
                    <th>Nama Bantuan</th>
                    <td>{{ $bantuan->nama_bantuan }}</td>
                <tr>
            </table>
        @endempty
        <a href="{{ url('bantuan') }}" class="btn btn-sm btn-default mt-2">
            kembali
        </a>
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush