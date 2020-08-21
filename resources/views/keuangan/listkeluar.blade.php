@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Pengeluaran Gereja
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengeluaran Gereja</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengeluaran Gereja</h3>
                <div class="card-tools">
                    @can('create keuangan')
                    <a href="{{ route('keuangankeluar.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Pengeluaran Gereja</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nominal (Rp)</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($keuangans as $keuangan)
                    @if ($keuangan->setting->jenis_keuangan == 'pengeluaran')
                    <tr>
                        <td>{{ $keuangan->tgl_keuangan }}</td>
                        <td>@if ($keuangan->id_set == '2') {{ $keuangan->keterangan_lain }} @else {{ $keuangan->setting->keterangan }} @endif</td>
                        <td>{{ number_format(abs($keuangan->nominal), 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group">
                                @can('update keuangan')
                                <a href="{{ route('keuangankeluar.edit',$keuangan->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>
                                @endcan
                                @can('delete keuangan')
                                <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#confrimModal{{ $keuangan->id }}"><i class="fas fa-trash"></i> Hapus</button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="confrimModal{{ $keuangan->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda Yakin Ingin Menghapus Data Keuangan <strong>@if ($keuangan->id_set == '2') {{ $keuangan->keterangan_lain }} @else {{ $keuangan->setting->keterangan }} @endif</strong></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <form action="{{ route('keuangankeluar.destroy',$keuangan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-light">Ya, Saya Yakin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
