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
            {{-- <div class="row">
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
            </div> --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_bantuan">
                <thead>
                    <tr>
                        <th>Kode Bantuan</th>
                        <th>Nama Bantuan</th>
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
            var dataBantuan = $('#table_bantuan').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('bantuan/list') }}",
                    "type": 'POST',
                    "data": function(d) {
                        d.id_level = $('#id_bantuan').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode_bantuan',
                        name: 'kode_bantuan',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'nama_bantuan',
                        name: 'nama_bantuan',
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

            $('#id_bantuan').on('change', function() {
                dataBantuan.ajax.reload();
            });
        });
    </script>
@endpush