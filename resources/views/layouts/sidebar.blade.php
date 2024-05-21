<div class="sidebar">
    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            <li class="nav-header">Menu Administrasi</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link ">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>
                        Data Warga
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link ">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Cetak Data Warga
                    </p>
                </a>
            </li>
            <li class="nav-header">Menu Bantuan Sosial</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>
                        Data Bansos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>
                        Data Penerima
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link ">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        Cetak Data Penerima
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>