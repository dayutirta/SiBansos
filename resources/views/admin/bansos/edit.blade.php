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
            <a href="{{ url('bansos') }}" class="btn btn-sm btn-default mt-2">
                Kembali
            </a>
        @else
            <form action="{{ url('/bansos/' . $bansos->id_bansos) }}" method="POST" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                       Jenis Bantuan
                    </label>
                    <div class="col-12 col-md-10">
                        <select name="id_bantuan" id="id_bantuan" class="form-control" required>
                            <option value="">- Pilih Bantuan -</option>
                            @foreach ($bantuan as $item)
                                <option value="{{ $item->id_bantuan }}" @if ($item->id_bantuan == $bansos->id_bantuan)
                                selected @endif>
                                    {{ $item->nama_bantuan }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_bantuan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Nama Program
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="text" name="nama_program" id="nama_program" class="form-control" value="{{ $bansos->nama_program }}" required>
                        @error('nama_program')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Tanggal Mulai
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ $bansos->tanggal_mulai }}" required>
                        @error('tanggal_mulai')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Tanggal Berakhir
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ $bansos->tanggal_akhir }}" required>
                        @error('tanggal_akhir')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Jumlah Penerima
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="number" name="jumlah_penerima" id="jumlah_penerima" class="form-control" value="{{ $bansos->jumlah_penerima }}" required>
                        @error('jumlah_penerima')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Anggaran
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="number" name="anggaran" id="anggaran" class="form-control" value="{{ $bansos->anggaran }}" required>
                        @error('anggaran')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 control-label col-form-label">
                        Lokasi
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $bansos->lokasi }}" required>
                        @error('lokasi')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Simpan
                        </button>
                        <a href="{{ url('bansos') }}" class="btn btn-default btn-sm ml-1">
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
