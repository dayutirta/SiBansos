@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('warga/create') }}">Tambah</a>
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
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="id_level" name="id_level" required>
                                <option value="">- Semua -</option>
                                @foreach ($warga as $item)
                                    <option value="{{ $item->warga }}">{{ $item->nama_level }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">nik</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_warga">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        {{-- <th>RT</th>
                        <th>RW</th> --}}
                        <th>Level</th>
                        <th>Agama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
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
            var dataWarga = $('#table_warga').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('warga/list') }}",
                    "type": 'POST',
                    "data": function(d) {
                        d.id_level = $('#id_level').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        orderable: false,
                        searchable: false
                    },
                    // {
                    //     data: 'rt',
                    //     name: 'rt',
                    //     orderable: true,
                    //     searchable: true
                    // },
                    // {
                    //     data: 'rw',
                    //     name: 'rw',
                    //     orderable: true,
                    //     searchable: true
                    // },
                    {
                        data: 'level.nama_level',
                        name: 'level.nama_level',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'agama',
                        name: 'agama',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#id_level').on('change', function() {
                dataWarga.ajax.reload();
            });
        });
    </script>
@endpush