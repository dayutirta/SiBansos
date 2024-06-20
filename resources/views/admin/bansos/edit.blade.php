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
                    <label class="col-12 col-md-2 col-form-label control-label">
                       Tanggal Mulai
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" value="{{ $bansos->tanggal_mulai }}" required>
                        @error('tanggal_mulai')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-2 col-form-label control-label">
                        Tanggal Berakhir
                    </label>
                    <div class="col-12 col-md-10">
                        <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" value="{{ $bansos->tanggal_akhir }}" required disabled>
                        <small id="error-tanggal-berakhir" class="form-text text-danger d-none">
                            Silakan isi tanggal mulai terlebih dahulu.
                        </small>
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
<script>
    $(document).ready(function() {
        $('#tanggal_mulai').on('change', function() {
            var tanggalMulai = $(this).val();
            if (tanggalMulai) {
                $('#tanggal_akhir').prop('disabled', false); // Aktifkan input tanggal berakhir jika tanggal mulai sudah diisi
                $('#tanggal_akhir').attr('min', tanggalMulai);
                $('#error-tanggal-berakhir').addClass('d-none'); // Sembunyikan pesan kesalahan saat tanggal mulai diubah
            } else {
                $('#tanggal_akhir').prop('disabled', true); // Matikan input tanggal berakhir jika tanggal mulai belum diisi
                $('#tanggal_akhir').val(''); // Kosongkan nilai input tanggal berakhir jika tanggal mulai belum diisi
            }
        });

        $('#tanggal_akhir').on('change', function() {
            var tanggalMulai = $('#tanggal_mulai').val();
            var tanggalAkhir = $(this).val();
            
            if (!tanggalMulai) {
                $('#error-tanggal-berakhir').removeClass('d-none'); // Tampilkan pesan kesalahan jika tanggal mulai kosong
            } else {
                $('#error-tanggal-berakhir').addClass('d-none'); // Sembunyikan pesan kesalahan jika tanggal mulai sudah diisi
            }
        });
    });
</script>
@endpush
