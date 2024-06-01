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
        <form action="{{ url('bantuan') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Kode Bantuan
                </label>
                <div class="col-11">
                    <input type="text" name="kode_bantuan" class="form-control" id="kode_bantuan" value="{{ old('kode_bantuan') }}" required>
                    @error('kode_bantuan')
                        <small class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 col-form-label control-label">
                    Nama Bantuan
                </label>
                <div class="col-11">
                    <input type="text" name="nama_bantuan" class="form-control" id="nama_bantuan" value="{{ old('nama_bantuan') }}" required>
                    @error('nama_bantuan')
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
                    <a href="{{ url('bantuan') }}" class="btn btn-sm btn-default ml-1">
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