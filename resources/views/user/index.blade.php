@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
    
            </div>
        </div>
        <div class="card-body">
            <h1>Selamat Datang Halaman Warga</h1>
            <p>Silahkan klik menu yang tersedia.</p>
        </div>
        <a href="{{ route('logout') }}">
            logout
        </a>
    </div>
@endsection