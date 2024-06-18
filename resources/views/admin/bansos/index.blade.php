@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('bansos/create')}}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-6 col-sm-12"> 
                    <div class="form-group row">
                        <label class="col-3 col-sm-2 control-label col-form-label">Filter:</label> 
                        <div class="col-5 col-sm-5"> 
                            <select class="form-control" id="id_bantuan" name="id_bantuan" required>
                                <option value="">- Semua -</option>
                                @foreach ($bantuan as $item)
                                    <option value="{{ $item->id_bantuan }}">{{ $item->nama_bantuan }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Jenis Bantuan</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive"> 
                <table class="table table-bordered table-striped table-hover table-sm" id="table_bansos">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Program</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Tipe Bantuan</th>
                            <th>Jumlah Penerima</th>
                            <th>Anggaran</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var dataUser = $('#table_bansos').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('bansos/list') }}",
                "type": "POST",
                "data": function (d) {
                    d.id_bantuan = $('#id_bantuan').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "nama_program", className: "", orderable: true, searchable: true },
                { data: "tanggal_mulai", className: "", orderable: true, searchable: true },
                { data: "tanggal_akhir", className: "", orderable: true, searchable: true },
                { data: "bantuan.nama_bantuan", className: "", orderable: false, searchable: false },
                { data: "jumlah_penerima", className: "", orderable: true, searchable: true },
                { data: "anggaran", className: "", orderable: true, searchable: true, render: function(data, type, row) {
                    return formatRupiah(data, 'Rp. ');
                }},
                { data: "lokasi", className: "", orderable: true, searchable: true },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ],
            ordering:false
        
        });

        $('#id_bantuan').on('change', function() {
            dataUser.ajax.reload();
        });

        var resizeTimer;
        $(window).on('resize', function(e) {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                dataUser.columns.adjust().draw(); 
            }, 200); 
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    });
</script>
@endpush
