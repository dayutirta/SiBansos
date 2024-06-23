@extends('layouts.template')

@section('content')
<div class="container-fluid">
    {{-- Logo avatar --}}
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
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Keluarga</span>
                    <span class="info-box-number">{{ $nokk }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Warga di RT</span>
                    <span class="info-box-number">{{ $totalWarga }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-hand-holding-heart"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Penerima Bansos</span>
                    <span class="info-box-number">{{ $totalSPenerima }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-clock"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Baru</span>
                    <span class="info-box-number">{{ $penerimaCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    
        <!-- /.col -->
    </div>
<!-- Chart -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Demografi Warga Di RT ini</h3>
            </div>  
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Demografi Penerima Bansos Di RT ini</h3>
            </div>  
            <div class="card-body">
                <div class="chart">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<!-- Hidden input to store RT logged in -->
<input type="hidden" id="rt_logged_in" value="{{ Auth::user()->rt }}">

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function () {
        // Bar Chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: '{{ $dataSets[0]['label'] }}',
                        backgroundColor: 'rgba(54, 162, 235, 1)', // More visible color
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: @json($dataSets[0]['data'])
                    },
                    {
                        label: '{{ $dataSets[1]['label'] }}',
                        backgroundColor: 'rgba(255, 99, 132, 1)', // More visible color
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: @json($dataSets[1]['data'])
                    }
                ]
            },
            options: {
                indexAxis: 'x', // Change to 'x' for vertical bar chart
                responsive: true, // Make the chart responsive
                maintainAspectRatio: false, // Don't maintain aspect ratio
                scales: {
                    y: {
                        beginAtZero: true,
                        max: @json($totalWarga) 
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    },
                    title: {
                        display: false,
                    },
                    tooltips: {
                        displayColors: false,
                    },
                    bar: {
                        borderWidth: 2, // Border width of bars
                    }
                }
            }
        });
    
// Pie Chart
var ctx2 = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: @json($pieData['labels']),
                    datasets: [{
                        data: @json($pieData['data']),
                        backgroundColor: [
                            'rgba(0, 128, 0, 0.7)',  
                            'rgba(255, 0, 0, 0.7)',  
                            'rgba(201, 203, 207, 1)'  
                        ],
                        borderColor: 'rgba(0, 0, 0, 0.7)', 
                        borderWidth: 1 
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>
    
@endpush
