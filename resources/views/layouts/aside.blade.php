<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link" style="font-size:1rem">
      <img src="{{ asset('img/logoaja.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">EBENHAEZER LARANTUKA</span>
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
                <li class="nav-item has-treeview @if(request()->segment(1) == 'baptis' || request()->segment(1) == 'sidi' || request()->segment(1) == 'nikah' || request()->segment(1) == 'ibadah' || request()->segment(1) == 'pengumuman') menu-open @endif">
                    <a href="#" class="nav-link @if(request()->segment(1) == 'baptis' || request()->segment(1) == 'sidi' || request()->segment(1) == 'nikah' || request()->segment(1) == 'ibadah' || request()->segment(1) == 'pengumuman') active @endif">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman & Jadwal <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
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
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(request()->segment(1) == 'keuangan' || request()->segment(1) == 'keuangankeluar' || request()->segment(1) == 'lapkeuangan') menu-open @endif">
                    <a href="#" class="nav-link @if(request()->segment(1) == 'keuangan' || request()->segment(1) == 'keuangankeluar' || request()->segment(1) == 'lapkeuangan') active @endif">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Keuangan Gereja <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read keuangan')
                        <li class="nav-item">
                            <a href="{{ route('keuangan.index') }}" class="nav-link @if(request()->segment(1) == 'keuangan') active @endif">
                                <i class="nav-icon fas fa-file-import"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('keuangankeluar.index') }}" class="nav-link @if(request()->segment(1) == 'keuangankeluar') active @endif">
                                <i class="nav-icon fas fa-file-export"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('lapkeuangan.index') }}" class="nav-link @if(request()->segment(1) == 'lapkeuangan') active @endif">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Setting</li>
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('setrenungan.index') }}" class="nav-link @if(request()->segment(1) == 'setrenungan') active @endif">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Setting Renungan</p>
                    </a>
                </li>
                @endrole
                @can('read setkegiatan')
                <li class="nav-item">
                    <a href="{{ route('setkegiatan.index') }}" class="nav-link @if(request()->segment(1) == 'setkegiatan') active @endif">
                        <i class="nav-icon fas fa-walking"></i>
                        <p>Setting Kegiatan</p>
                    </a>
                </li>
                @endcan
                @can('read setmajelis')
                <li class="nav-item">
                    <a href="{{ route('setmajelis.index') }}" class="nav-link @if(request()->segment(1) == 'setmajelis') active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Setting Majelis</p>
                    </a>
                </li>
                @endcan
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('setsejarah.index') }}" class="nav-link @if(request()->segment(1) == 'setsejarah') active @endif">
                        <i class="nav-icon fas fa-walking"></i>
                        <p>Setting Sejarah</p>
                    </a>
                </li>
                @endrole
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
                <li class="nav-item">
                    <a href="{{ route('changeprofile.edit') }}" class="nav-link @if(request()->segment(1) == 'changeprofile') active @endif">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Ubah Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
