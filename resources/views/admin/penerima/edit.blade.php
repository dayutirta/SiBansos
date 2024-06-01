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
            <a href="{{ url('penerima') }}" class="btn btn-sm btn-default mt-2">
                Kembali
            </a>
            @else
            <form action="{{ url('/penerima/' . $penerima->id_penerima) }}" method="POST" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Nama Program
                    </label>
                    <div class="col-11">
                        <select name="id_bansos" id="id_bansos" class="form-control" required>
                            <option value="">- Pilih Level -</option>
                            @foreach ($bansos as $item)
                                <option value="{{ $item->id_bansos }}" @if ($item->id_bansos == $penerima->id_bansos)
                                selected @endif>
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
                    <label class="col-1 control-label col-form-label">
                        Uama
                    </label>
                    <div class="col-11">
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') ?? $penerima->nama }}" required>
                        @error('nama')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Usia
                    </label>
                    <div class="col-11">
                        <input type="text" name="usia" id="usia" class="form-control" value="{{ old('usia') ?? $penerima->usia }}" required>
                        @error('usia')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        pendapatan
                    </label>
                    <div class="col-11">
                        <input type="text" name="pendapatan" id="pendapatan" class="form-control" value="{{ old('pendapatan') ?? $penerima->pendapatan }}" required>
                        @error('pendapatan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Status Kesehatan
                    </label>
                    <div class="col-11">
                        <input type="text" name="status_kesehatan" id="status_kesehatan" class="form-control" value="{{ old('status_kesehatan') ?? $penerima->status_kesehatan }}" required>
                        @error('status_kesehatan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        Pekerjaan
                    </label>
                    <div class="col-11">
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan') ?? $penerima->pekerjaan }}" required>
                        @error('pekerjaan')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">
                        No Telepon
                    </label>
                    <div class="col-11">
                        <input type="date" name="notelp" id="notelp" class="form-control" value="{{ old('notelp') ?? $penerima->notelp }}" required>
                        @error('notelp')
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
                        <a href="{{ url('warga') }}" class="btn btn-default btn-sm ml-1">
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