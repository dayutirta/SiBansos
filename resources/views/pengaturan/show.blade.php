@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">

    <div class="card-body">
        <div class="row">
            <!-- Bagian Profil -->
            <div class="col-md-4">
                <div class="text-center mb-4">
                    
                    <img src="{{ asset('adminlte/dist/img/1.png') }}" alt="SiBansos Logo" class="img-fluid rounded-circle" style="max-width: 100%; height: auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                    
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-details">
                    <h4 class="mb-4">Informasi Profil</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">NIK</th>
                                    <td class="rounded-end px-4">{{ $user->nik }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">No KK</th>
                                    <td class="rounded-end px-4">{{ $user->nokk }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Nama Lengkap</th>
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
            <div class="col-md-7">
                <div class="profile-details">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Jenis Kelamin</th>
                                    <td class="rounded-end px-4">{{ $user->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Tempat, Tanggal Lahir</th>
                                    <td class="rounded-end px-4">
                                        {{ $user->tempat_lahir }}, {{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Status Pernikahan</th>
                                    <td class="rounded-end px-4">{{ $user->status_pernikahan }}</td>
                                </tr>
                               
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Alamat</th>
                                    <td class="rounded-end px-4">{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">RT/RW</th>
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
            <div class="col-md-5">
                <div class="profile-details">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Status</th>
                                    <td class="rounded-end px-4">{{ $user->status }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Agama</th>
                                    <td class="rounded-end px-4">{{ $user->agama }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Pekerjaan</th>
                                    <td class="rounded-end px-4">{{ $user->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Pendidikan</th>
                                    <td class="rounded-end px-4">{{ $user->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white rounded-start px-8">Kewarganegaraan</th>
                                    <td class="rounded-end px-4">{{ $user->kewarganegaraan }}</td>
                                </tr>
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

        .profile-details table tbody tr {
            background-color: #dee2e6;
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
            border-bottom: 4px solid #f9f9f9;
        }


        .table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
