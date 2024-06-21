@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                {{ $page->title }}
            </h3>
            <div class="card-tools">
                <!-- Any additional tools or buttons can be placed here -->
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
                <form action="{{ url('/warga/' . $warga->id_warga) }}" method="POST" class="form-horizontal " enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Lebih prefer untuk menggunakan @method('PUT') -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" 
                                value="{{ old('nik') ?? $warga->nik }}" required>
                                @error('nik')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">NO. KK</label>
                                <input type="text" name="nokk" id="nokk" class="form-control" 
                                value="{{ old('nokk') ?? $warga->nokk }}" required>
                                @error('nokk')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') ?? $warga->nama }}" required>
                                @error('nama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') ?? $warga->tempat_lahir }}" required>
                                @error('tempat_lahir')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    value="{{ old('tanggal_lahir') ?? $warga->tanggal_lahir }}" required>
                                @error('tanggal_lahir')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="" disabled>-- Pilih Agama --</option>
                                    <option value="Islam" {{ $warga->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $warga->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ $warga->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $warga->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $warga->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ $warga->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('agama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ old('alamat') ?? $warga->alamat }}" required>
                                @error('alamat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">RT</label>
                                <input type="text" name="rt" id="rt" class="form-control"
                                    value="{{ old('rt') ?? $warga->rt }}" required>
                                @error('rt')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">RW</label>
                                <input type="text" name="rw" id="rw" class="form-control"
                                    value="{{ old('rw') ?? $warga->rw }}" required>
                                @error('rw')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control"
                                    value="{{ old('kewarganegaraan') ?? $warga->kewarganegaraan }}" required>
                                @error('kewarganegaraan')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Pekerjaan</label>
                                <select name="pekerjaan" class="form-control" id="pekerjaan" required>
                                    <option value="" disabled>-- Pilih Pekerjaan --</option>
                                    <option value="{{ $warga->pekerjaan }}" selected>{{ $warga->pekerjaan }}</option>
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

                            <div class="form-group">
                                <label class="control-label">Pendidikan</label>
                                <select name="pendidikan" class="form-control" id="pendidikan" required>
                                    <option value=""disabled >-- Pilih Pendidikan --</option>
                                    <option value="{{ $warga->pendidikan }}" selected>{{ $warga->pendidikan }}</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP Sederajat</option>
                                    <option value="SMA/SMK">SMA/SMK Sederajat</option>
                                    <option value="Sarjana">Sarjana/Diploma</option>
                                    <option value="Magister">Magister</option>
                                    <option value="Doktor">Doktor</option>
                                </select>
                                @error('pendidikan')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label">Status Pernikahan</label>
                                <select name="status_pernikahan" id="status_pernikahan" class="form-control" required>
                                    <option value="" disabled>-- Pilih Status Pernikahan --</option>
                                    <option value="Menikah" {{ $warga->status_pernikahan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Belum Menikah" {{ $warga->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                </select>
                                @error('status_pernikahan')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Foto</label>
                            
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($warga->foto) }}" alt="foto user" style="max-width: 100px; max-height: 100px;" class="mr-3 img-thumbnail">
                            
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="foto" >
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            
                                @error('foto')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url('warga') }}" class="btn btn-default ml-2">Kembali</a>
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
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("foto").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush

