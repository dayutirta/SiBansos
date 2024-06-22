@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('pengajuan-surat') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-form-label">Jenis Surat</label>
                <select name="id_surat" class="form-control" id="id_surat" required>
                    <option value="" disabled selected>-- Pilih Jenis Surat --</option>
                    @foreach ($surat as $item)
                        <option value="{{ $item->id_surat }}">
                            {{ $item->nama_surat }}
                        </option>
                    @endforeach
                </select>
                @error('id_surat')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-form-label">Foto KTP</label>
                <div class="custom-file">
                    <input type="file" name="ktp" class="custom-file-input" id="ktp" required>
                    <label class="custom-file-label" for="ktp">Choose file</label>
                </div>
                @error('ktp')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-form-label">Foto KK</label>
                <div class="custom-file">
                    <input type="file" name="kk" class="custom-file-input" id="kk" required>
                    <label class="custom-file-label" for="kk">Choose file</label>
                </div>
                @error('kk')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-form-label">Foto Bukti Domisili</label>
                <div class="custom-file">
                    <input type="file" name="bukti_kepemilikan_rumah" class="custom-file-input" id="bukti_kepemilikan_rumah" required>
                    <label class="custom-file-label" for="bukti_kepemilikan_rumah">Choose file</label>
                </div>
                @error('bukti_kepemilikan_rumah')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group row">
                <label class="col-form-label">Keterangan</label>
                <input name="keterangan" class="form-control" id="keterangan" required>
                    
                </input>
                @error('keterangan')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" hidden name="status" class="form-control" value="Pending" required>
                    @error('status')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <label class="col-form-label"></label>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="{{ url('pengajuan-surat') }}" class="btn btn-sm btn-default ml-1">Kembali</a>  
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;
        });
    });
</script>
@endpush
