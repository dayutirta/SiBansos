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
        <form action="{{ url('penerima') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Level
                </label>
                <div class="col-11">
                    <select name="id_bansos" class="form-control" id="id_bansos" required>
                        <option value="">-- Pilih Program --</option>
                        @foreach ($penerima as $item)
                            <option value="{{ $item->id_bansos }}">
                                {{ $item->nama_program }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_bansos')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    nama
                </label>
                <div class="col-11">
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Usia
                </label>
                <div class="col-11">
                    <input type="text" name="usia" class="form-control" id="usia" value="{{ old('usia') }}" required>
                    @error('usia')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Pendapatan
                </label>
                <div class="col-11">
                    <input type="text" name="pendapatan" class="form-control" id="pendapatan" value="{{ old('pendapatan') }}" required>
                    @error('pendapatan')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Status Kesehatan
                </label>
                <div class="col-11">
                    <input type="text" name="status_kesehatan" class="form-control" id="status_kesehatan" value="{{ old('status_kesehatan') }}" required>
                    @error('status_kesehatan')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Pekerjaan
                </label>
                <div class="col-11">
                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                    @error('pekerjaan')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    No Telepon
                </label>
                <div class="col-11">
                    <input type="date" name="notelp" class="form-control" id="notelp" value="{{ old('notelp') }}" required>
                    @error('notelp')
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
                    <a href="{{ url('warga') }}" class="btn btn-sm btn-default ml-1">
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