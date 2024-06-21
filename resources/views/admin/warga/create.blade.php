@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form action="{{ url('warga') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <label class="col-form-label">Level</label>
                
                    <select name="id_level" class="form-control" id="id_level" required>
                        <option value="" disabled selected>-- Pilih Level --</option>
                        @foreach ($level as $item)
                            <option value="{{ $item->id_level }}">
                                {{ $item->nama_level }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_level')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">NIK</label>
                
                    <input type="text" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                    @error('nik')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">No. KK</label>
                
                    <input type="text" name="nokk" class="form-control" id="nokk" value="{{ old('nokk') }}" required>
                    @error('nokk')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Nama</label>
                
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Jenis Kelamin</label>
                
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Tempat Lahir</label>
                
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>

            <div class="form-group ">
                <label class="col-form-label">Tanggal Lahir</label>
                
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Alamat</label>
                
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                    @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
        </div>

        <div class="col-md-6">            
            <div class="form-group ">
                <label class="col-form-label">Agama</label>
                
                    <select name="agama" class="form-control" id="agama" required>
                        <option value="" disabled selected>-- Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                    @error('agama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Status</label>
                
                    <select name="status" class="form-control" id="status" required>
                        <option value="" disabled selected>-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                    @error('status')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Kewarganegaraan</label>
                
                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" value="{{ old('kewarganegaraan') }}" required>
                    @error('kewarganegaraan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Pekerjaan</label>
                
                    <select name="pekerjaan" class="form-control" id="pekerjaan" required>
                        <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                        <option value="Buruh">Buruh</option>
                        <option value="PNS">PNS</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                        <option value="TNI/Polri">TNI/Polri</option>
                        <option value="Petani/Nelayan">Petani/Nelayan</option>
                        <option value="Dokter/Perawat">Dokter/Perawat</option>
                        <option value="Guru/Dosen">Guru/Dosen</option>
                    </select>
                    
                    @error('pekerjaan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Pendidikan</label>
                
                    <select name="pendidikan" class="form-control" id="pendidikan" required>
                        <option value=""disabled selected >-- Pilih Pendidikan --</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA/SMK">SMA/SMK Sederajat</option>
                        <option value="Sarjana">Sarjana/Diploma</option>
                        <option value="Magister">Magister</option>
                        <option value="Doktor">Doktor</option>
                    </select>
                    @error('pendidikan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>
            
            <div class="form-group ">
                <label class="col-form-label">Status Pernikahan</label>
                
                    <select name="status_pernikahan" class="form-control" id="status_pernikahan" required>
                        <option value="" disabled selected>-- Pilih Status Pernikahan --</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>
                    @error('status_pernikahan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>

            <div class="form-group ">
                <label class="col-form-label">RT</label>
                
                    @if($rt)
                        <input type="text" name="rt" class="form-control" id="rt" value="{{ $rt }}" readonly required>
                    @else
                        <input type="text" name="rt" class="form-control" id="rt" value="{{ old('rt') }}" required>
                    @endif
                    @error('rt')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>

            <div class="form-group ">
                <label class="col-form-label">RW</label>
                
                    <input type="text" name="rw" class="form-control" id="rw" value="{{ old('rw', '1') }}" readonly required>
                    @error('rw')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                
            </div>

            <div class="form-group">
                <label class="col-form-label">Foto</label>
                <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="foto" required>
                    <label class="custom-file-label" for="foto">Choose file</label>
                </div>
                @error('foto')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
            <div class="form-group ">
                <label class="col-form-label"></label>
                
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="{{ url('warga') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
                
            </div>

        </form>
    </div>
</div>

@endsection

@push('css')
    
@endpush

@push('js')
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("foto").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush
