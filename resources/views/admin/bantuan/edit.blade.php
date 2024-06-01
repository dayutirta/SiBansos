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
            <a href="{{ url('bantuan') }}" class="btn btn-sm btn-default mt-2">
                Kembali
            </a>
            @else
            <form action="{{ url('/bantuan/' . $bantuan->id_bantuan) }}" method="POST" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Kode Bantuan
                    </label>
                    <div class="col-11">
                        <input type="text" name="kode_bantuan" id="kode_bantuan" class="form-control" value="{{ old('kode_bantuan') ?? $bantuan->kode_bantuan }}" required>
                        @error('kode_bantuan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Nama Bantuan
                    </label>
                    <div class="col-11">
                        <input type="text" name="nama_bantuan" id="nama_bantuan" class="form-control" value="{{ old('nama_bantuan') ?? $bantuan->nama_bantuan }}" required>
                        @error('nama_bantuan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        
                    </label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Simpan
                        </button>
                        <a href="{{ url('bantuan') }}" class="btn btn-default btn-sm ml-1">
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush