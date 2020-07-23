<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SI GEREJA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jemaat.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Jemaat</p>
                    </a>
                </li>
                <li class="nav-header">PENGUMUMAN & JADWAL</li>
                <li class="nav-item">
                    <a href="{{ route('baptis.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-pray"></i>
                        <p> Jadwal Pembabtisan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sidi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Jadwal Sidi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nikah.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Jadwal Pernikahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengumuman.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-header">Setting</li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-child"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>