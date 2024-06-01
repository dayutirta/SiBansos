@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Bagian Profil -->
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <!-- Tambahkan gambar profil -->
                    <img src="{{ $user->profile_picture }}" alt="Profil" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                    <!-- Ganti ukuran gambar sesuai kebutuhan -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-details">
                    <h4 class="mb-4">Informasi Profil</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr style="margin-bottom: 10px;"> <!-- Tambahkan margin bottom 10px -->
                                    <th class="bg-primary text-white rounded-start px-4">NIK</th>
                                    <td class="rounded-end px-4">{{ $user->nik }}</td>
                                </tr>
                                <tr style="margin-bottom: 10px;"> <!-- Tambahkan margin bottom 10px -->
                                    <th class="bg-primary text-white rounded-start px-4">Nama</th>
                                    <td class="rounded-end px-4">{{ $user->nama }}</td>
                                </tr>
                                <tr style="margin-bottom: 10px;"> <!-- Tambahkan margin bottom 10px -->
                                    <th class="bg-primary text-white rounded-start px-4">Jenis Kelamin</th>
                                    <td class="rounded-end px-4">{{ $user->jenis_kelamin }}</td>
                                </tr>
                                <!-- Tambahkan kolom profil lainnya sesuai kebutuhan -->
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
                    <h4 class="mb-4">Informasi Tambahan 1</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr style="margin-bottom: 10px;"> <!-- Tambahkan margin bottom 10px -->
                                    <th class="bg-success text-white rounded-start px-4">Status</th>
                                    <td class="rounded-end px-4">{{ $user->status }}</td>
                                </tr>
                                <!-- Tambahkan baris informasi tambahan lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bagian 2 -->
            <div class="col-md-6">
                <div class="profile-details">
                    <h4 class="mb-4">Informasi Tambahan 2</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr style="margin-bottom: 10px;"> <!-- Tambahkan margin bottom 10px -->
                                    <th class="bg-success text-white rounded-start px-4">Kewarganegaraan</th>
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
            padding: 10px 20px; /* Tambahkan padding horizontal */
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
            background-color: #f2f2f2;
        }

        /* Pinggiran melengkung pada kolom pertama */
        .rounded-start {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        /* Pinggiran melengkung pada kolom terakhir */
        .rounded-end {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Garis pemisah di antara baris */
        .profile-details table tbody tr {
            border-bottom: 4px solid #dee2e6;
        }

        /* Shadow */
        .table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
