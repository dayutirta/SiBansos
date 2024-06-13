<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiBansos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Leaflet -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/leaflet.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/styles.css') }}">

    <!-- Logo Icon -->
    <link rel="icon" type="image/png" href="{{ asset('adminlte/dist/img/SiB_new.png') }}">
</head>


<body>
    <nav class="navbar navbar-light bg-secondary bg-opacity-10 static-top">
        <div class="container">
            <a class="navbar-brand">
                SIBANSOS
            </a>
            <a href="{{ url('login') }}" class="btn btn-primary">
                Login
            </a>
        </div>
    </nav>
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Selamat datang di web SIBANSOS</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Tentang SIBANSOS</h2>
            <p>
                Selamat datang di SIBANSOS, platform inovatif yang dirancang khusus untuk memfasilitasi sistem administrasi RT dan RW. 
                Kami memahami betapa pentingnya efisiensi dan transparansi dalam pengelolaan administrasi dan bantuan sosial di tingkat komunitas, 
                dan itulah mengapa SIBANSOS hadir sebagai solusi terbaik untuk kebutuhan ini. 
            </p>
        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('adminlte/dist/img/showcase-1.jpg') }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Apa itu SIBANSOS?</h2>
                    <p class="lead mb-0">
                        SIBANSOS adalah sistem yang memungkinkan warga untuk dengan mudah mengajukan permohonan bantuan sosial. 
                        Platform ini juga memudahkan pengurus RT dan RW dalam mengelola dan meninjau setiap permintaan yang masuk, 
                        memastikan bahwa bantuan sosial tepat sasaran dan diberikan kepada mereka yang benar-benar membutuhkan.
                    </p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset('adminlte/dist/img/showcase-2.jpg') }}')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Mengapa memilih SIBANSOS</h2>
                    <p class="lead mb-0">
                        SIBANSOS hadir untuk menjawab tantangan dalam pengelolaan bantuan sosial di tingkat komunitas. 
                        Kami berkomitmen untuk meningkatkan kesejahteraan warga dengan menyediakan alat yang memudahkan proses administrasi dan distribusi bantuan.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <h2 class="mb-5">Contact</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-envelope-at-fill m-auto text-secondary"></i></div>
                        <h5>Email</h5>
                        <p class="lead mb-0">rwgriyadamai@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-telephone-fill m-auto text-secondary"></i></div>
                        <h5>Phone Number</h5>
                        <p class="lead mb-0">(022) 9821-0441</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-phone-fill m-auto text-secondary"></i></div>
                        <h5>Mobile</h5>
                        <p class="lead mb-0">0821-4891-6303</p>
                    </div>
                </div>
            </div>
            <h2 class="mb-5 mt-5">Location</h2>
            <div class="card card-outline card-primary">
                {{-- <div class="card-header">
                    <h3 class="card-title">Peta Lokasi</h3>
                </div> --}}
                <div class="card-body">
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-secondary bg-opacity-10">
        <div class="container">
            <div class="row">
                <div class="h-100 text-lg-center my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3 text-secondary"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3 text-secondary"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3 text-secondary"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="h-100 text-center text-lg-start my-auto">
                    <p class="text-muted small mt-3 mb-4 mb-lg-0">&copy; Your Website 2024. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Leaflet -->
    <script src="{{ asset('adminlte/dist/js/leaflet.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi peta
            var map = L.map('map').setView([-7.921090, 112.640879], 17); // Menyesuaikan ke koordinat Jakarta

            // Menambahkan tile layer ke peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Menambahkan marker ke lokasi tertentu
            var marker = L.marker([-7.921090, 112.640879]).addTo(map)
                .bindPopup('Ini Lokasinya')
                .openPopup();
        });
    </script>
</body>

</html>