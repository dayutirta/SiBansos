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
        @empty($penerima)
            <div class="alert alert-danger alert-dismissible">
                <h5>
                    <i class="icon fas fa-ban">
                        Kesalahan!
                    </i>
                    Data yang anda cari tidak ditemukan!
                </h5>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_penerima">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>NoKK</th>
                            <th>Nama</th>
                            <th>Rank EDAS</th>
                            <th>Rank SAW</th>
                            <th>Alamat</th>
                            <th>Skor EDAS</th>   
                            <th>Skor SAW</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sorted_edas = $penerima->sortByDesc('skoredas')->values();
                            $sorted_saw = $penerima->sortByDesc('skoresaw')->values();
                            
                            $rank_edas = $sorted_edas->mapWithKeys(function ($item, $key) {
                                return [$item->id_penerima => $key + 1];
                            });

                            $rank_saw = $sorted_saw->mapWithKeys(function ($item, $key) {
                                return [$item->id_penerima => $key + 1];
                            });
                        @endphp
                        @foreach($penerima as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->bansos->nama_program }}</td>
                                <td>{{ $data->user->nokk }}</td>
                                <td>{{ $data->user->nama }}</td>
                                <td>{{ $rank_edas[$data->id_penerima] }}</td>
                                <td>{{ $rank_saw[$data->id_penerima] }}</td>
                                <td>{{ $data->user->alamat }}, RT {{ $data->user->rt }} / RW {{ $data->user->rw }}</td>
                                <td>{{ $data->skoredas }}</td>
                                <td>{{ $data->skoresaw }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endempty
        <a href="{{ url('bansos') }}" class="btn btn-sm btn-default mt-2">
            Kembali
        </a>
    </div>
</div>
@endsection

@push('css')
<style>
    .table-responsive {
        overflow-x: auto;
    }
    .fit-column {
        white-space: nowrap;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#table_penerima').DataTable({
            columns: [
                { data: "DT_RowIndex", className: "text-center", orderable: true, searchable: false },
                { data: "nama_program", className: "", orderable: false, searchable: false },
                { data: "nokk", className: "text-center", orderable: false, searchable: true },
                { data: "nama", className: "", orderable: false, searchable: true },
                { data: "rank_edas", className: "text-center", orderable: true, searchable: false },
                { data: "rank_saw", className: "text-center", orderable: true, searchable: false },
                { data: "alamat", className: "", orderable: false, searchable: true},
                { data: "skoredas", className: "", orderable: false, searchable: false },              
                { data: "skoresaw", className: "", orderable: false, searchable: false },  
            ],
            "autoWidth": false,
                "responsive": true,
           
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
