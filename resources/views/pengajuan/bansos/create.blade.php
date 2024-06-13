@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('pengajuan-bansos') }}" method="POST" class="form-horizontal">
            @csrf
            <!-- Data Penerima -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">NIK</label>
                <div class="col-md-10">
                    <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                    @error('nik')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">No KK</label>
                <div class="col-md-10">
                    <input type="text" name="nokk" class="form-control" value="{{ old('nokk') }}" required>
                    @error('nokk')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Nama</label>
                <div class="col-md-10">
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Pekerjaan Ayah</label>
                <div class="col-md-10">
                    <input type="text" name="pekerjaanx" class="form-control" value="{{ old('pekerjaanx') }}" required>
                    @error('pekerjaanx')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Pekerjaan Ibu</label>
                <div class="col-md-10">
                    <input type="text" name="pekerjaany" class="form-control" value="{{ old('pekerjaany') }}" required>
                    @error('pekerjaany')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Gaji Ayah</label>
                <div class="col-md-10">
                    <input type="number" name="gajix" class="form-control" value="{{ old('gajix') }}" required>
                    @error('gajix')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Gaji Ibu</label>
                <div class="col-md-10">
                    <input type="number" name="gajiy" class="form-control" value="{{ old('gajiy') }}" required>
                    @error('gajiy')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label control-label">Kewarganegaraan</label>
                <div class="col-md-10">
                    <input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan') }}" required>
                    @error('kewarganegaraan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
<!-- Data Penerima -->
<div class="form-group row">
    <label class="col-md-2 col-form-label control-label">Bahan Tembok</label>
    <div class="col-md-10">
        <select name="status_rumah" class="form-control" required>
            <option value="" selected disabled>--- Pilih sesuai dengan kondisi Anda ---</option>
            <option value="5">Bambu/Kayu (Diperlukan perbaikan besar-besaran)</option>
            <option value="4">Asbes (Diperlukan perbaikan besar-besaran)</option>
            <option value="3">Bata dengan banyak retakan (Diperlukan perbaikan)</option>
            <option value="2">Bata (Diperlukan perbaikan kecil)</option>
            <option value="1">Batako/Bahan solid/Cor (Kondisi baik)</option>
        </select>
        @error('status_rumah')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label control-label">Lampu/PLN</label>
    <div class="col-md-10">
        <select name="pln" class="form-control" required>
            <option value="" selected disabled>--- Pilih sesuai dengan kondisi Anda ---</option>
            <option value="5">Nonlistrik (obor/cemplon/kompor bakar) (Tidak tersedia listrik PLN)</option>
            <option value="4">Daya <= 450 VA (Listrik rumah tangga)</option>
            <option value="3">Daya > 450 VA <= 900 VA (Listrik rumah tangga)</option>
            <option value="2">Daya > 900 VA <= 1300 VA (Listrik rumah tangga)</option>
            <option value="1">Daya > 1300 VA (Listrik rumah tangga)</option>
        </select>
        @error('pln')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label control-label">PDAM</label>
    <div class="col-md-10">
        <select name="pdam" class="form-control" required>
            <option value="" selected disabled>--- Pilih sesuai dengan kondisi Anda ---</option>
            <option value="5">Sumur, sungai, bendungan (Tidak tersedia akses PDAM)</option>
            <option value="4">Kubik <= 10m3 (Penggunaan air terbatas)</option>
            <option value="3">Kubik > 10m3 <= 15m3 (Penggunaan air terbatas)</option>
            <option value="2">Kubik > 15m3 <= 20m3 (Penggunaan air terbatas)</option>
            <option value="1">Kubik > 20m3 (Penggunaan air terbatas)</option>
        </select>
        @error('pdam')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label control-label">Kesehatan</label>
    <div class="col-md-10">
        <select name="status_kesehatan" class="form-control" required>
            <option value="" selected disabled>--- Pilih sesuai dengan kondisi Anda ---</option>
            <option value="5">Tidak memiliki jaminan kesehatan (Tidak ada jaminan)</option>
            <option value="4">Memiliki Asuransi BPJS (Jaminan kesehatan utama)</option>
            <option value="3">Memiliki Asuransi selain BPJS (minimal 1) (Jaminan kesehatan tambahan)</option>
            <option value="2">Memiliki Asuransi selain BPJS (lebih dari 1) (Jaminan kesehatan tambahan)</option>
            <option value="1">Memiliki Asuransi selain BPJS dan BPJS juga (Jaminan kesehatan lengkap)</option>
        </select>
        @error('status_kesehatan')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

            <input type="hidden" name="id_bansos" value="{{ $id_bansos }}">
            <input type="hidden" name="status" value="Pending">
            <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{ url('pengajuan-bansos') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
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
