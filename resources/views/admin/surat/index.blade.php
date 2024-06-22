@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_surat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Surat</th>
                        <th>Nama Surat</th>
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
        var dataBantuan = $('#table_surat').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('surat/list') }}",
                "type": 'POST',
            },
            columns: [ 
                { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                { data: "kode_surat", orderable: true, searchable: true },
                { data: "nama_surat", orderable: true, searchable: true },
                { data: "aksi", orderable: true, searchable: true },
            ],
            "autoWidth": false,
                "responsive": true,
                "ordering":false,
               

        });

        $('#id_surat').on('change', function() {
            dataBantuan.ajax.reload();
        });
    });
</script>
@endpush
