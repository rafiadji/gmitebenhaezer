@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Jemaat
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Jemaat</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jemaat</h3>
                <div class="card-tools">
                    @can('create jemaat')
                    <a href="{{ route('jemaat.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Jemaat</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nama Baptis</th>
                            <th>No Telp</th>
                            <th style="width: 25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jemaats as $jemaat)
                        <tr>
                            <td>{{ $jemaat->name }}</td>
                            <td>{{ $jemaat->user->email }}</td>
                            <td>{{ $jemaat->name_baptis }}</td>
                            <td>{{ $jemaat->no_tlp }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm bg-gradient-warning" data-toggle="modal" data-target="#detailJemaat{{ $jemaat->id }}"><i class="fas fa-search"></i> Detail</button>
                                    @can('update jemaat')
                                    <a href="{{ route('jemaat.edit',$jemaat->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>
                                    @endcan
                                    @can('delete jemaat')
                                    <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#confrimModal{{ $jemaat->id }}"><i class="fas fa-trash"></i> Hapus</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach ($jemaats as $jemaat)
<div class="modal fade" id="confrimModal{{ $jemaat->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus jemaat <strong>{{ $jemaat->name }}</strong></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form action="{{ route('jemaat.destroy',$jemaat->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-light">Ya, Saya Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailJemaat{{ $jemaat->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Data Jemaat {{ $jemaat->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr><th>NIK</th><td>{{ $jemaat->nik }}</td></tr>
                        <tr><th>No. KK</th><td>{{ $jemaat->nomer_kk }}</td></tr>
                        <tr><th>Nama</th><td>{{ $jemaat->name }}</td></tr>
                        <tr><th>Jenis Kelamin</th><td>{{ $jemaat->jk }}</td></tr>
                        <tr><th>No. Telp</th><td>{{ $jemaat->no_tlp }}</td></tr>
                        <tr><th>Tempat Lahir</th><td>{{ $jemaat->tempat_lahir }}</td></tr>
                        <tr><th>Tanggal Lahir</th><td>{{ $jemaat->tgl_lahir }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $jemaat->alamat }}</td></tr>
                        <tr><th>Email</th><td>{{ $jemaat->user->email }}</td></tr>
                        <tr><th>Nama Baptis</th><td>{{ $jemaat->name_baptis }}</td></tr>
                        <tr><th>Pendidikan</th><td>{{ $jemaat->pendidikan }}</td></tr>
                        <tr><th>Pekerjaan</th><td>{{ $jemaat->pekerjaan }}</td></tr>
                        <tr><th>Jabatan</th><td>{{ $jemaat->jabatan->jabatan }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('javascript')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function(){
        $(".datatabel").DataTable({
            "ordering": false,
        });
    });
</script>
@endsection