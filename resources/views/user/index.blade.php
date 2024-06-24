@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center d-flex flex-column flex-md-row text-center">
                        <div class="col-12 col-md-4  mb-3 mb-md-0">
                            <img src="{{ secure_asset(Auth::user()->foto) }}" alt="SiBansos Logo" class="img-fluid rounded-circle" style="max-width: 100%; height: auto; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                        </div>
                        <div class="col-12 col-md-8  text-md-left custom-margin">
                            <h1 class="display-5 mb-2">Selamat Datang, {{ Auth::user()->nama }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
