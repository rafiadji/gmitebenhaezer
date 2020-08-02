<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
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
                    <a href="{{ url('/home') }}" class="nav-link @if(request()->segment(1) == 'home') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('read jemaat')
                <li class="nav-item">
                    <a href="{{ route('jemaat.index') }}" class="nav-link @if(request()->segment(1) == 'jemaat') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Jemaat</p>
                    </a>
                </li>
                @endcan
                <li class="nav-header">PENGUMUMAN & JADWAL</li>
                @can('read baptis')
                <li class="nav-item">
                    <a href="{{ route('baptis.index') }}" class="nav-link @if(request()->segment(1) == 'baptis') active @endif">
                        <i class="nav-icon fas fa-pray"></i>
                        <p> Jadwal Pembabtisan</p>
                    </a>
                </li>
                @endcan
                @can('read sidi')
                <li class="nav-item">
                    <a href="{{ route('sidi.index') }}" class="nav-link @if(request()->segment(1) == 'sidi') active @endif">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Jadwal Sidi</p>
                    </a>
                </li>
                @endcan
                @can('read nikah')
                <li class="nav-item">
                    <a href="{{ route('nikah.index') }}" class="nav-link @if(request()->segment(1) == 'nikah') active @endif">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Jadwal Pernikahan</p>
                    </a>
                </li>
                @endcan
                @can('read ibadah')
                <li class="nav-item">
                    <a href="{{ route('ibadah.index') }}" class="nav-link @if(request()->segment(1) == 'ibadah') active @endif">
                        <i class="nav-icon fas fa-bible"></i>
                        <p>Jadwal Ibadah</p>
                    </a>
                </li>
                @endcan
                @can('read pengumuman')
                <li class="nav-item">
                    <a href="{{ route('pengumuman.index') }}" class="nav-link @if(request()->segment(1) == 'pengumuman') active @endif">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                @endcan
                <li class="nav-header">Keuangan Gereja</li>
                @can('read keuangan')
                <li class="nav-item">
                    <a href="{{ route('keuangan.index') }}" class="nav-link @if(request()->segment(1) == 'keuangan') active @endif">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>Pemasukan & Pengeluaran</p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('lapkeuangan.index') }}" class="nav-link @if(request()->segment(1) == 'lapkeuangan') active @endif">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Laporan Keuangan</p>
                    </a>
                </li>
                <li class="nav-header">Setting</li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link @if(request()->segment(1) == 'jabatan') active @endif">
                        <i class="nav-icon fas fa-child"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                @endrole
                @can('read katibadah')
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link @if(request()->segment(1) == 'kategori') active @endif">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Rayon / Kategori Ibadah</p>
                    </a>
                </li>
                @endcan
                @can('read setkeuangan')
                <li class="nav-item">
                    <a href="{{ route('setKeuangan.index') }}" class="nav-link @if(request()->segment(1) == 'setKeuangan') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Setting Keuangan</p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>