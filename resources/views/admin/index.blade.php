@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
    
            </div>
        </div>
        <div class="card-body">
            <h1>Selamat Datang di Halaman Admin</h1>
            <p>Silahkan klik menu yang tersedia.</p>
            <a href="{{ route('logout') }}">
                logout
            </a>
        </div>
    </div>
@endsection