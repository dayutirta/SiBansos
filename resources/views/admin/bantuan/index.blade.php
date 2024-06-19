@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('bantuan/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_bantuan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Bantuan</th>
                        <th>Nama Bantuan</th>
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
        var dataBantuan = $('#table_bantuan').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('bantuan/list') }}",
                "type": 'POST',
            },
            "buttons": [
    'copy', 'excel', 'pdf'
],

            columns: [ 
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "kode_bantuan", orderable: true, searchable: true },
                { data: "nama_bantuan", orderable: true, searchable: true },
                { data: "aksi", orderable: true, searchable: true },
            ],
            "autoWidth": false,
                "responsive": true,
                "ordering":false,
               

        });

        $('#id_bantuan').on('change', function() {
            dataBantuan.ajax.reload();
        });
    });
</script>
@endpush
