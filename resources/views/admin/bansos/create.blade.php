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
        <form action="{{ url('bansos') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Jenis Bantuan
                </label>
                <div class="col-11">
                    <select name="id_bantuan" class="form-control" id="id_bantuan" required>
                        <option value="">-- Pilih Bantuan --</option>
                        @foreach ($bantuan as $item)
                            <option value="{{ $item->id_bantuan }}">
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
                <label class="col-1 col-form-label control-label">
                    Nama Program
                </label>
                <div class="col-11">
                    <input type="text" name="nama_program" class="form-control" id="nama_program" value="{{ old('nama_program') }}" required>
                    @error('nama_program')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                   Tanggal Mulai
                </label>
                <div class="col-11">
                    <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Tanggal Berakhir
                </label>
                <div class="col-11">
                    <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
                    @error('tanggal_akhir')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Jumlah Penerima
                </label>
                <div class="col-11">
                    <input type="number" min="1" name="jumlah_penerima" class="form-control" id="jumlah_penerima" value="{{ old('jumlah_penerima') }}" required>
                    @error('jumlah_penerima')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Anggaran
                </label>
                <div class="col-11">
                    <input type="number" min="1" name="anggaran" class="form-control" id="anggaran" value="{{ old('anggaran') }}" required>
                    @error('anggaran')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Lokasi
                </label>
                <div class="col-11">
                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    
                </label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
                    </button>
                    <a href="{{ url('bansos') }}" class="btn btn-sm btn-default ml-1">
                        Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
    
@endpush

@push('js')
    
@endpush