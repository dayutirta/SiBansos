<div class="sidebar" >
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-header">Menu Administrasi</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Warga
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/level') }}" class="nav-link">
                            <i class="fas fa-user-shield nav-icon"></i>
                            <p>Level</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                            <i class="fas fa-user-edit nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-header">Menu Bantuan Sosial</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hand-holding-heart"></i>
                    <p>
                        Bantuan Sosial
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/kategori') }}" class="nav-link">
                            <i class="fas fa-database nav-icon"></i>
                            <p>Data Bansos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/barang') }}" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Data Penerima</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/stok') }}" class="nav-link">
                            <i class="fas fa-print nav-icon"></i>
                            <p>Cetak Data Penerima</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
