@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Daftar Request Bansos</h2>
            <a href="{{ route('request.create') }}" class="btn btn-primary mb-3 float-right">Tambah Request</a>
            @if($requests->isEmpty())
                <p>Belum ada request yang dibuat.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->nama }}</td>
                                <td>{{ $request->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection