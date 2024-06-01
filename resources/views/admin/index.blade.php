@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-4 col-md-3 text-center text-md-left">
                            <img src="{{ asset('adminlte/dist/img/1.png') }}" alt="SiBansos Logo" class="img-fluid rounded-circle" style="max-width: 100%; height: auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                        </div>                       
                        <div class="col-12 col-sm-8 col-md-9">
                            <h1 class="display-4 mb-4">Selamat Datang, {{ Auth::user()->nama }}</h1>
                            <p class="lead">Silahkan klik menu yang tersedia.</p>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
