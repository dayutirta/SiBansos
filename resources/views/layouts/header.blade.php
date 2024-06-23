<!-- header.blade.php -->

<style>
    .navbar-nav .nav-link i {
        color: white;
    }
    
</style>

<nav class="main-header navbar navbar-expand navbar-purple navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item position-relative">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars">
                    @isset($penerimaCount)
                    @isset($pengajuanCount)
                        @if($penerimaCount > 0 && $pengajuanCount > 0)
                        <span class="badge badge-danger navbar-badge" style="border-radius: 50%; width: 10px; height: 10px;">
                            <span style="font-size: 8px; color: red;">&bull;</span>
                        </span>
                        @endif
                    @endisset
                @endisset
                </i>       
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Profile Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a href="{{ url('/profil') }}" class="dropdown-item">
                    <i class="fas fa-user fa-sm mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/setting') }}" class="dropdown-item">
                    <i class="fas fa-cog fa-sm mr-2"></i> Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/logout') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt fa-sm mr-2"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>