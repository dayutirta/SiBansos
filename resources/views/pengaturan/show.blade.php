@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">

    <div class="card-body">
        <div class="row">
            <!-- Bagian Profil -->
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <!-- Tambahkan gambar profil -->
                    <img src="{{ asset('adminlte/dist/img/1.png') }}" alt="SiBansos Logo" class="img-fluid rounded-circle" style="max-width: 100%; height: auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                    <!-- Ganti ukuran gambar sesuai kebutuhan -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-details">
                    <h4 class="mb-4">Informasi Profil</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">NIK</th>
                                    <td class="rounded-end px-4">{{ $user->nik }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">No KK</th>
                                    <td class="rounded-end px-4">{{ $user->nokk }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Nama Lengkap</th>
                                    <td class="rounded-end px-4">{{ $user->nama }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Informasi Tambahan -->
        <div class="row mt-4">
            <!-- Bagian 1 -->
            <div class="col-md-6">
                <div class="profile-details">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Jenis Kelamin</th>
                                    <td class="rounded-end px-4">{{ $user->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Tempat, Tanggal Lahir</th>
                                    <td class="rounded-end px-4">
                                        {{ $user->tempat_lahir }}, {{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Agama</th>
                                    <td class="rounded-end px-4">{{ $user->agama }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Alamat</th>
                                    <td class="rounded-end px-4">{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">RT/RW</th>
                                    <td class="rounded-end px-4">
                                        {{ $user->rt }}/{{ $user->rw }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bagian 2 -->
            <div class="col-md-6">
                <div class="profile-details">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Status</th>
                                    <td class="rounded-end px-4">{{ $user->status }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Status Pernikahan</th>
                                    <td class="rounded-end px-4">{{ $user->status_pernikahan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Pekerjaan</th>
                                    <td class="rounded-end px-4">{{ $user->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Pendidikan</th>
                                    <td class="rounded-end px-4">{{ $user->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-4">Kewarganegaraan</th>
                                    <td class="rounded-end px-4">{{ $user->kewarganegaraan }}</td>
                                </tr>
                                <!-- Tambahkan baris informasi tambahan lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection

@push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .profile-details table th,
        .profile-details table td {
            border: none;
            padding: 10px 20px; 
            font-size: 16px;
        }

        .profile-details table th {
            width: 40%;
            font-weight: bold;
            text-align: center;
        }

        .profile-details table td {
            width: 60%;
        }

        .profile-details table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .profile-details table tbody tr:hover {
            background-color: #d1d1d1;
        }

        
        .rounded-start {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        
        .rounded-end {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        
        .profile-details table tbody tr {
            border-bottom: 4px solid #dee2e6;
        }


        .table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
