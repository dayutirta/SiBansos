@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary maintenance-message">
    <div class="card-body text-center">
        <!-- Maintenance Message -->
        <h3><i class="fas fa-tools"></i> Maintenance</h3>
        <p>Menu ini sedang dalam proses Maintenance. Silakan cek kembali nanti.</p>
        <div class="spinner-icons">
            <div class="spinner-icon"><i class="fas fa-cog fa-spin fa-2x"></i></div>
            <div class="spinner-icon"><i class="fas fa-cog fa-spin fa-3x"></i></div>
            <div class="spinner-icon"><i class="fas fa-cog fa-spin fa-4x"></i></div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .maintenance-message {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .maintenance-message h3 {
            color: #333;
            font-size: 24px;
        }
        
        .maintenance-message p {
            color: #666;
            font-size: 16px;
        }
        
        .spinner-icons {
            margin-top: 20px;
        }
        
        .spinner-icon {
            display: inline-block;
            margin: 0 10px;
        }
        </style>
@endpush

