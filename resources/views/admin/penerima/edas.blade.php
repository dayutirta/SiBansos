@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kriteria dan Bobot</h3>
    </div>
    <div class="card-body">
        <table id="table-kriteria" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $kriteria = ['Pendapatan', 'Status Rumah', 'PLN', 'PDAM', 'Status Kesehatan'];
                    $bobot = [0.30, 0.20, 0.15, 0.20, 0.15];
                @endphp
                @foreach ($kriteria as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k }}</td>
                    <td>{{ $bobot[$index] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('bansos/cek/' . $bansos->id_bansos) }}" class="btn btn-sm btn-default mt-2">
            Kembali
        </a>
    </div>

</div>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Data Matriks</h3>
    </div>
    <div class="card-body">
        <table id="table-edas" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pendapatan</th>
                    <th>Status Rumah</th>
                    <th>PLN</th>
                    <th>PDAM</th>
                    <th>Status Kesehatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerima as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->user->nama }}</td>
                    <td>{{ $data->pendapatan }}</td>
                    <td>{{ $data->status_rumah }}</td>
                    <td>{{ $data->pln }}</td>
                    <td>{{ $data->pdam }}</td>
                    <td>{{ $data->status_kesehatan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Normalisasi Matriks</h3>
    </div>
    <div class="card-body">
        <table id="table-normalisasi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pendapatan</th>
                    <th>Status Rumah</th>
                    <th>PLN</th>
                    <th>PDAM</th>
                    <th>Status Kesehatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Nmatrix as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    @foreach ($row as $value)
                    <td>{{ number_format($value, 2) }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Menghitung Rata-rata</h3>
    </div>
    <div class="card-body">
        <table id="table-rata" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Pendapatan</th>
                    <th>Status Rumah</th>
                    <th>PLN</th>
                    <th>PDAM</th>
                    <th>Status Kesehatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($rata as $value)
                    <td>{{ number_format($value, 2) }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">PDA & NDA</h3>
    </div>
    <div class="card-body">
        <table id="table-pda-nda" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pendapatan (PDA)</th>
                    <th>Status Rumah (PDA)</th>
                    <th>PLN (PDA)</th>
                    <th>PDAM (PDA)</th>
                    <th>Status Kesehatan (PDA)</th>
                    <th>Pendapatan (NDA)</th>
                    <th>Status Rumah (NDA)</th>
                    <th>PLN (NDA)</th>
                    <th>PDAM (NDA)</th>
                    <th>Status Kesehatan (NDA)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pda_nda as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    @foreach ($row as $value)
                    <td>{{ $value['pda'] }}</td>
                    @endforeach
                    @foreach ($row as $value)
                    <td>{{ $value['nda'] }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Skor EDAS</h3>
    </div>
    <div class="card-body">
        <table id="table-skor-edas" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skor EDAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($edas as $index => $score)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('bansos/cek/' . $bansos->id_bansos) }}" class="btn btn-sm btn-default mt-2">
            Kembali
        </a>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    var tableOptions = {
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        searching: false,
    };

    $('#table-kriteria').DataTable(tableOptions).buttons().container().appendTo('#table-kriteria_wrapper .col-md-6:eq(0)');
    $('#table-edas').DataTable(tableOptions).buttons().container().appendTo('#table-edas_wrapper .col-md-6:eq(0)');
    $('#table-normalisasi').DataTable(tableOptions).buttons().container().appendTo('#table-normalisasi_wrapper .col-md-6:eq(0)');
    $('#table-rata').DataTable(tableOptions).buttons().container().appendTo('#table-rata_wrapper .col-md-6:eq(0)');
    $('#table-pda-nda').DataTable(tableOptions).buttons().container().appendTo('#table-pda-nda_wrapper .col-md-6:eq(0)');
    $('#table-skor-edas').DataTable(tableOptions).buttons().container().appendTo('#table-skor-edas_wrapper .col-md-6:eq(0)');
});
</script>
@endpush
