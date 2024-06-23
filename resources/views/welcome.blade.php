<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SiBansosi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('adminlte/dist/img/SiB_new.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ secure_asset('landingpage/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('landingpage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('landingpage/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ secure_asset('landingpage/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ secure_asset('landingpage/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-2 py-lg-0">
                    <div class="container-fluid">
                        <a href="" class="navbar-brand p-0">
                            <h1 class="m-0">SiBansosi</h1>
                        </a>
                        <div class="d-flex align-items-center ms-auto">
                            <a href="{{ url('login') }}" class="btn btn-secondary rounded-pill py-2 px-4 ms-3">Login</a>
                        </div>
                    </div>
                </nav>

                <div class="container-xxl bg-primary hero-header">
                    <div class="container px-lg-3 py-4">
                        <div class="row g-5 align-items-end">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="text-white mb-4 animated slideInDown">Selamat datang di web SIBANSOS</h1>
                                <p class="text-white pb-3 animated slideInDown">SiBansos, merupakan platform yang dirancang khusus untuk memudahkan administrasi dan pengajuan bantuan sosial di tingkat RW. Kami hadir untuk memberikan solusi praktis, transparan, dan efisien dalam pengelolaan bantuan sosial bagi warga.</p>
                            </div>
                            <div class="col-lg-6 text-center text-lg-start">
                                <img class="img-fluid animated zoomIn" src="{{ asset('landingpage/img/hero-3.png') }}" alt="" style="width: 100%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Navbar & Hero End -->

        <!-- Feature Start -->
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Tentang Kami<span></span></p>
            </div>
            <div class="container-xxl py-5">
                <div class="container py-5 px-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-users text-primary mb-4"></i>
                                <h5 class="mb-3">Tentang SiBansos</h5>
                                <p class="m-0">Sebuah sistem inovatif yang mengintegrasikan proses administrasi dan pengajuan bantuan sosial dalam satu platform digital. Dengan SiBansos, seluruh proses pengajuan, verifikasi, dan distribusi bantuan sosial dapat dilakukan dengan lebih mudah dan cepat, memastikan bantuan tepat sasaran dan transparan.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                                <h5 class="mb-3">Apa itu SiBansos</h5>
                                <p class="m-0">SiBansos adalah singkatan dari Sistem Bantuan Sosial, sebuah platform digital yang membantu warga dan pengurus RW dalam mengelola bantuan sosial. Melalui SiBansos, warga dapat mengajukan permohonan bantuan secara online, memantau status pengajuan, dan mendapatkan informasi terkini mengenai program bantuan yang tersedia.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-cogs text-primary mb-4"></i>
                                <h5 class="mb-3">Mengapa Memilih SiBansos</h5>
                                <p class="m-0">SiBansos hadir untuk menjawab kebutuhan masyarakat akan sistem yang transparan dan efisien dalam pengelolaan bantuan sosial. Dengan menggunakan teknologi terkini, kami memastikan setiap proses dilakukan dengan cepat dan akurat. Kami juga berkomitmen untuk menjaga keamanan data pengguna dan memberikan pelayanan terbaik.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-handshake text-primary mb-4"></i>
                                <h5 class="mb-3">Keuntungan SiBansos</h5>
                                <ul class="m-0 text-start">
                                    <li>Mudah Diakses: Pengguna dapat mengajukan bantuan dari mana saja dan kapan saja.</li>
                                    <li>Transparan: Setiap langkah proses pengajuan dapat dipantau secara real-time.</li>
                                    <li>Efisien: Mengurangi birokrasi dan mempercepat proses distribusi bantuan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        <!-- Feature End -->

        <!-- Facts Start -->
            <div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                </div>
            </div>
        <!-- Facts End -->

        <!-- Service Start -->
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Layanan Kami<span></span></p>
            </div>
            <div class="container-xxl py-5">
                <div class="container py-5 px-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Administrasi Efisien</h5>
                                <p class="m-0">Mengelola administrasi data warga dengan sistem yang terintegrasi dan efisien.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-file-alt fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Pengajuan Surat/Dokumen Online</h5>
                                <p class="m-0">Memudahkan pengajuan surat atau dokumen secara online dengan proses yang cepat.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-handshake fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Pengajuan Bantuan Sosial</h5>
                                <p class="m-0">Mempermudah pengajuan bantuan sosial dengan proses yang transparan dan mudah diakses.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-clock fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Proses Cepat</h5>
                                <p class="m-0">Menyediakan proses layanan yang cepat untuk meningkatkan efisiensi waktu pengguna.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-globe fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Akses Mudah</h5>
                                <p class="m-0">Dapat diakses dari mana saja dan kapan saja untuk kenyamanan pengguna.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.1s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fa fa-heart fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Pelayanan Terbaik</h5>
                                <p class="m-0">Memberikan pelayanan terbaik dan responsif untuk kepuasan pengguna.</p>
                                {{-- <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Service End -->   

        <!-- Footer Start -->
            <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-3">
                            <p class="section-title text-white h5 mb-4">Alamat<span></span></p>
                            <p><i class="fa fa-map-marker-alt me-3"></i>Perum Griya Damai Sejahtera, Balearjosari, Blimbing, Malang City, East Java 65126</p>
                            <p><i class="fa fa-phone-alt me-3"></i>+62 827-9624-6172</p>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <p class="section-title text-white h5 mb-4">Disclaimer<span></span></p>
                            <p class="text-white pb-3 animated slideInDown">Informasi dan data yang terdapat dalam situs web ini adalah data dummy dan hanya digunakan untuk tujuan pemenuhan tugas proyek kuliah. Data yang disajikan tidak bersifat asli dan tidak dimaksudkan untuk digunakan dalam konteks yang sebenarnya.</p>
                        </div>
                        <div class="col-md-12 col-lg-6">
                                <img class="img-fluid animated zoomIn" src="{{ asset('landingpage/img/hero.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="container px-lg-3">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-9 text-center text-md-start mb-3 mb-md-0">
                                &copy; 
                                <a class="border-bottom" href="#">SiBansos</a>
                                , All Right Reserved. Designed By 
                                <a class="border-bottom" href="https://htmlcodex.com">
                                    HTML Codex
                                </a> 
                                Distributed By a 
                                <a class="border-bottom" href="https://themewagon.com" target="_blank">
                                    ThemeWagon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landingpage/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
</body>

</html>
