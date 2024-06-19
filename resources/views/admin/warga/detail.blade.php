@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{ $page->title }}
        </h3>
    </div>

    <div class="card-body">
        @empty($warga)
            <div class="alert alert-danger alert-dismissible">
                <h5>
                    <i class="icon fas fa-ban">
                        Kesalahan!
                    </i>
                    Data warga tidak ditemukan!
                </h5>
            </div>
        @else
        {{-- Data Pribadi --}}
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped table-hover table-sm" >
                <thead>
                    <tr>
                        <th>NoKK</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kewarganegaraan</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $warga->nokk }}</td>
                            <td>{{ $warga->nik }}</td>
                            <td>{{ $warga->nama }}</td>
                            <td>{{ $warga->alamat }}, RT {{ $warga->rt }} / RW {{ $warga->rw }}</td>
                            <td class="text-center">{{ $warga->kewarganegaraan }}</td>
                        </tr>
                </tbody>
            </table>
            <br><br><br>
            {{-- Data Keluarga --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_warga">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Status Pernikahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keluarga as $index => $data)
                        <tr>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ $data->pekerjaan }}</td>
                            <td>{{ $data->pendidikan }}</td>
                            <td>{{ $data->status_pernikahan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
            <a href="{{ url('warga') }}" class="btn btn-sm btn-default mt-2">
                Kembali
            </a>
        </div>     
        @endempty
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
        $('#table_warga').DataTable({
            searching:false,
            "autoWidth": false,
                "responsive": true,
                "ordering":false           
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

