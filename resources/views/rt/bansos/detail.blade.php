@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{ $page->title }}
        </h3>
        <div class="card-tools d-flex">
            <a class="btn btn-outline-secondary btn-sm mr-2" href="{{ route('penerima.edas', $bansos->id_bansos) }}">EDAS</a>
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('penerima.saw', $bansos->id_bansos) }}">SAW</a>
        </div>
    </div>
    
    <div class="card-body">
        @empty($penerima)
            <div class="alert alert-danger alert-dismissible">
                <h5>
                    <i class="icon fas fa-ban"></i>
                    Kesalahan! Data yang anda cari tidak ditemukan!
                </h5>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_penerima">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NoKK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Rank EDAS</th>
                            <th>Rank SAW</th>
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
                                <td>{{ $data->user->nokk }}</td>
                                <td>{{ $data->user->nama }}</td>
                                <td>{{ $data->user->alamat }}, RT {{ $data->user->rt }} / RW {{ $data->user->rw }}</td>
                                <td>{{ $rank_edas[$data->id_penerima] }}</td>
                                <td>{{ $rank_saw[$data->id_penerima] }}</td>
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
        var table = $('#table_penerima').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel"></i> Excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf"></i> PDF',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Print',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: 5 },
                { responsivePriority: 3, targets: 2 },
                { responsivePriority: 4, targets: 4 },
                { responsivePriority: 5, targets: 1 }
            ]
        });

        table.buttons().container().appendTo('#table_penerima_wrapper .col-md-6:eq(0)');

        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                table.columns.adjust().responsive.recalc();
            }, 200);
        });
    });
</script>
@endpush