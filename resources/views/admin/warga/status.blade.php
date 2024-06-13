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
            @empty($warga)
                <div class="alert alert-danger alert-dismissible">
                    <h5>
                        <i class="icon fas fa-ban"></i>
                        Kesalahan! Data yang Anda cari tidak ditemukan!
                    </h5>
                </div>
                <a href="{{ url('warga') }}" class="btn btn-sm btn-default mt-2">
                    Kembali
                </a>
            @else
                <form action="{{ url('/warga/' . $warga->id_warga . '/update_status') }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Nonaktif" {{ $warga->status == 'Nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                <option value="Meninggal" {{ $warga->status == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                            </select>
                            @error('status')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{ url('warga') }}" class="btn btn-default btn-sm ml-1">Kembali</a>
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
