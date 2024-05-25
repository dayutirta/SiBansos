@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
    
            </div>
        </div>
        <div class="card-body">
            <h1>Selamat Datang, {{ Auth::user()->nama }}</h1>
            <ul>
                @foreach(Auth::user()->toArray() as $key => $value)
                    <li>{{ $key }}: {{ $value }}</li>
                @endforeach
            </ul>
            <p>Silahkan klik menu yang tersedia.</p>
            <a href="{{ route('logout') }}">
                Logout
            </a>
        </div>
    </div>
@endsection
