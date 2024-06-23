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
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group row">
                    <label class="col-3 col-sm-2 control-label col-form-label">Filter:</label>
                    <div class="col-6 col-sm-6">
                        <select class="form-control" id="id_surat" name="id_surat" required>
                            <option value="">- Semua -</option>
                            @foreach ($surati as $item)
                                <option value="{{ $item->id_surat }}">{{ $item->nama_surat }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Nama Surat</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_pengajuan">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Surat</th>
                        <th>Nama Pemohon</th>
                        <th>Keterangan</th>
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
        var table = $('#table_pengajuan').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ url('pengajuan/showup') }}",
                type: 'POST',
                data: function(d) {
                    d.id_surat = $('#id_surat').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'surat.nama_surat', name: 'surat.nama_surat', orderable: false, searchable: true },
                { data: 'warga.nama', name: 'warga.nama', orderable: false, searchable: true },
                { data: 'keterangan', name: 'surat.keterangan', orderable: false, searchable: true },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ],
            "autoWidth": false,
                "responsive": true,
                "ordering":false
        });

        $('#id_surat').on('change', function() {
            table.ajax.reload();
        });

        var resizeTimer;
        $(window).on('resize', function(e) {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                table.ajax.reload(null, false);
            }, 200);
        });
    });
</script>
@endpush