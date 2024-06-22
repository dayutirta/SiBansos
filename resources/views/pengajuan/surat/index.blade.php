@extends('layouts.template')

@section('content')
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $page->title }}</h3>
                <div class="card-tools">
                    <a class="btn btn-sm btn-primary mt-1" href="{{ url('pengajuan-surat/create') }}">Tambah</a>
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
                    <div class="col-md-12">
                        <div class="form-group row">
                        </div>                        
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table_pengajuan">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Mengajukan</th>
                                <th>Status</th>
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
        var dataUser = $('#table_pengajuan').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('pengajuan-surat/list') }}",
                "type": "POST",
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "warga.nama", className: "", orderable: true, searchable: true }, 
                { data: "surat.nama_surat", className: "", orderable: true, searchable: true }, 
                {
                data: "created_at",
                className: "",
                orderable: true,
                searchable: true,
                render: function(data, type, row) {
                    return moment(data).format('DD-MM-YYYY'); 
                }
            },
                { data: "aksi", className: "", orderable: false, searchable: false }
            ],

            "autoWidth": false,
                "responsive": true,
                "ordering":false
        });

        $('#id_pengajuan').on('change', function() {
            dataUser.ajax.reload();
        });
    });
</script>
@endpush
