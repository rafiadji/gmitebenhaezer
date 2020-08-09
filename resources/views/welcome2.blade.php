<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>GMIT EBENHAEZER LARANTUKA</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">GMIT EBENHAEZER LARANTUKA</span>
            </a>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-default card-outline">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="7000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset('img/slider/gambar1.jpg') }}" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/slider/gambar2.jpg') }}" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/slider/gambar3.jpg') }}" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Pengumuman</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 322px;">
                                <table class="table table-striped table-striped">
                                    <tbody>
                                        @foreach ($pengumumans as $pengumuman)
                                        <tr>
                                            <td style="width: 20%"><a href="#" class="" data-toggle="modal" data-target="#detailPengumuman{{ $pengumuman->id }}">{{ $pengumuman->judul }}</a></td>
                                            <td>{{ substr(strip_tags($pengumuman->isi), 0, 100)."...." }}</td>
                                        </tr>
                                        <div class="modal fade" id="detailPengumuman{{ $pengumuman->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ $pengumuman->judul }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{!! $pengumuman->isi !!}</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Info Ibadah Rumah Tangga</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 322px;">
                                <table class="table table-striped table-striped">
                                    <tbody>
                                        @foreach ($ibadahs as $ibadah)
                                        <tr>
                                            <td style="width: 20%">{{ $ibadah->tgl_ibadah }}</td>
                                            <td style="width: 20%">{{ $ibadah->waktu_ibadah }}</td>
                                            <td><a href="#" class="" data-toggle="modal" data-target="#detailIbadah{{ $ibadah->id }}">info Ibadah <br>{{ $ibadah->kategori->kategori }}</a></td>
                                        </tr>
                                        <div class="modal fade" id="detailIbadah{{ $ibadah->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Info Ibadah {{ $ibadah->kategori->kategori }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="tgl_ibadah" class="col-sm-4 col-form-label">Tanggal Ibadah</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="tgl_ibadah" name="tgl_ibadah" value="{{ $ibadah->tgl_ibadah }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="waktu_ibadah" class="col-sm-4 col-form-label">Waktu Ibadah</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="waktu_ibadah" name="waktu_ibadah" value="{{ $ibadah->waktu_ibadah }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="tempat_ibadah" class="col-sm-4 col-form-label">Tempat Ibadah</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="tempat_ibadah" name="tempat_ibadah" value="{{ $ibadah->tempat_ibadah }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="pelayan" class="col-sm-4 col-form-label">Pelayan</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="pelayan" name="pelayan" value="{{ $ibadah->pelayan }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Jadwal Pembaptisan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 322px;">
                                <table class="table table-striped table-striped">
                                    <tbody>
                                        @foreach ($baptiss as $baptis)
                                        <tr>
                                            <td style="width: 20%">{{ $baptis->tgl_baptis }}</td>
                                            <td style="width: 20%"><a href="#" class="" data-toggle="modal" data-target="#detailBaptis{{ $baptis->id }}">Calon Pembaptisan : {{ $baptis->calon->name }}<br>Pendeta : {{ $baptis->pendeta->name }}</a></td>
                                        </tr>
                                        <div class="modal fade" id="detailBaptis{{ $baptis->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Calon Pembaptisan : {{ $baptis->calon->name }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="tgl_baptis" class="col-sm-4 col-form-label">Tanggal Baptis</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="tgl_baptis" name="tgl_baptis" value="{{ $ibadah->tgl_baptis }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="ayah" name="ayah" value="{{ $ibadah->ayah->name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="ibu" name="ibu" value="{{ $ibadah->ibu->name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="pendeta" class="col-sm-4 col-form-label">Nama Pendeta</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="pendeta" name="pendeta" value="{{ $ibadah->pendeta->name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_1" class="col-sm-4 col-form-label">Saksi 1</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_1" name="name_saksi_1" value="{{ $ibadah->name_saksi_1 }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_2" class="col-sm-4 col-form-label">Saksi 2</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_2" name="name_saksi_2" value="{{ $ibadah->name_saksi_2 }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Jadwal Sidi</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 322px;">
                                <table class="table table-striped table-striped">
                                    <tbody>
                                        @foreach ($sidis as $sidi)
                                        <tr>
                                            <td style="width: 20%">{{ $sidi->tgl_sidi }}</td>
                                            <td style="width: 20%">Peserta Sidi : {{ $sidi->jemaat->name }}<br>Status : {{ $sidi->status_sidi }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Jadwal Pernikahan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 322px;">
                                <table class="table table-striped table-striped">
                                    <tbody>
                                        @foreach ($nikahs as $nikah)
                                            <tr>
                                                <td style="width: 20%">{{ $nikah->tgl_nikah }}</td>
                                                <td style="width: 20%"><a href="#" class="" data-toggle="modal" data-target="#detailNikah{{ $nikah->id }}">Calon Suami : {{ $nikah->pria->name }} Calon Istri : {{ $nikah->wanita->name }}<br>Pendeta : {{ $nikah->pendeta->name }}</a></td>
                                            </tr>
                                        <div class="modal fade" id="detailNikah{{ $nikah->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Pernikahan {{ $nikah->pria->name }} dengan {{ $nikah->wanita->name }} </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="tgl_nikah" class="col-sm-4 col-form-label">Tanggal Pernikahan</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="tgl_nikah" name="tgl_nikah" value="{{ $ibadah->tgl_nikah }}" disabled>
                                                                </div>
                                                            </div>
                                                            <h5>Data Mempelia Pria</h5>
                                                            <div class="form-group row">
                                                                <label for="pria" class="col-sm-4 col-form-label">Calon Suami</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="pria" name="pria" value="{{ $ibadah->pria->name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_p_1" class="col-sm-4 col-form-label">Saksi 1</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_p_1" name="name_saksi_p_1" value="{{ $ibadah->name_saksi_p_1 }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_p_2" class="col-sm-4 col-form-label">Saksi 2</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_p_2" name="name_saksi_p_2" value="{{ $ibadah->name_saksi_p_2 }}" disabled>
                                                                </div>
                                                            </div>
                                                            <h5>Data Mempelia Wanita</h5>
                                                            <div class="form-group row">
                                                                <label for="wanita" class="col-sm-4 col-form-label">Calon Istri</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="wanita" name="wanita" value="{{ $ibadah->wanita->name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_w_1" class="col-sm-4 col-form-label">Saksi 1</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_w_1" name="name_saksi_w_1" value="{{ $ibadah->name_saksi_w_1 }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name_saksi_w_2" class="col-sm-4 col-form-label">Saksi 2</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="name_saksi_w_2" name="name_saksi_w_2" value="{{ $ibadah->name_saksi_w_2 }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="pendeta" class="col-sm-4 col-form-label">Nama Pendeta</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control-plaintext" id="pendeta" name="pendeta" value="{{ $ibadah->pendeta->name }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function(){
        $(".datatabel").DataTable({
            "ordering": false,
            "info": false,
            "lengthChange": false,
            "lengthMenu": [[5], [5]]
        });
    });
</script>
</body>
</html>
