@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            {{-- Button Tambah --}}
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
            {{-- Filter RT --}}
            <div class="row">
                <div class="col-md-6 col-sm-12"> 
                    <div class="form-group row">
                        <label class="col-3 col-sm-2 control-label col-form-label">Filter:</label> 
                        <div class="col-5 col-sm-5"> 
                            <select class="form-control" id="nokk" name="nokk" required>
                                <option value="">- Semua -</option>
                                @foreach ($nokkrw as $rt)
                                    <option value="{{ $rt->nokk }}">{{ $rt->nokk }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Per KK</small>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tabel Warga --}}
            <div class="table-responsive"> 
                <table class="table table-bordered table-striped table-hover table-sm" id="table_warga">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            
        </div>
    </div>
@endsection

@push('css')
    <style>
        
        @media (max-width: 575.98px) { 
            .col-form-label {
                text-align: left !important;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table_warga').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('warga/list') }}",
                    "type": 'POST',
                    "data": function(d) {
                        d.nokk = $('#nokk').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nik', name: 'nik', orderable: false, searchable: true },
                    { data: 'nama', name: 'nama', orderable: false, searchable: true },
                    {
                        data: null,
                        name: 'rt',
                        orderable: false,
                        searchable: true,
                        render: function(data, type, row) {
                            return row.alamat+ ', '+ ' RT ' + row.rt + ' / RW ' + row.rw;
                        }
                    },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
                ],
                "autoWidth": false,
                "responsive": true,
                "ordering":false
            });

            $('#nokk').on('change', function() {
                table.ajax.reload();
            });

            
            var resizeTimer;
            $(window).on('resize', function(e) {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    table.ajax.reload(null, false); 
                }, 1); 
            });
        });
    </script>
@endpush
