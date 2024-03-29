@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Pemasukan Gereja
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pemasukan Gereja</li>
@endsection

@section('content')
<?php
    $bulans = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $bulan_sekarang = date("m");
    $tahun_sekarang = date("Y");
    $saldo = 0;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pemasukan Gereja</h3>
                <div class="card-tools">
                    @can('create keuangan')
                    <a href="{{ route('keuangan.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Pemasukan Gereja</a>                        
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('keuangan.getTable') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="tahun" class="col-sm-1 col-form-label">Tahun</label>
                        <div class="col-sm-2">
                            <select class="form-control select2" name="tahun" id="tahun">
                                @for ($i = 2018; $i < 3030; $i++)
                                <option value="{{ $i }}" @if ($i == $tahun_sekarang) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <label for="bulan" class="col-sm-1 col-form-label">Bulan</label>
                        <div class="col-sm-2">
                            <select class="form-control select2" name="bulan" id="bulan">
                                <option value="all" @if ($bulan_nya == "all") selected @endif>Semua Bulan</option>
                                @foreach($bulans as $key => $val)
                                <option value="{{ $key+1 }}" @if (($key+1) == $bulan_nya) selected @endif>{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type='submit' class='form-control btn btn-sm bg-gradient-info'><i class='fas fa-filter'></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th style="width: 20%">Nominal (Rp)</th>
                    <th style="width: 25%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($keuangans as $keuangan)
                    @if ($keuangan->setting->jenis_keuangan == 'pemasukan')
                    <tr>
                        <td>{{ $keuangan->tgl_keuangan }}</td>
                        @if ($keuangan->id_set == '1')
                            <td>{{ $keuangan->keterangan_lain }}</td>
                        @else
                            <td>{{ $keuangan->setting->keterangan }}</td>
                        @endif
                        <td style='text-align:right'>{{ number_format($keuangan->nominal, 0, ',', '.') }}</td>
                        <td>
                            @can('update keuangan')
                            <a href="{{ route('keuangan.edit',$keuangan->id) }}" class='btn btn-sm bg-gradient-info'><i class='fas fa-pencil-alt'></i> Ubah</a>
                            @endcan
                            @can('delete keuangan')
                            <button type='button' class='btn btn-sm bg-gradient-danger' data-toggle='modal' data-target="#confrimModal{{ $keuangan->id }}"><i class='fas fa-trash'></i> Hapus</button>
                            @endcan
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
                                    <p>Apakah Anda Yakin Ingin Menghapus Data Keuangan <strong>@if ($keuangan->id_set == '1') {{ $keuangan->keterangan_lain }} @else {{ $keuangan->setting->keterangan }} @endif</strong></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <form action="{{ route('keuangan.destroy',$keuangan->id) }}" method="POST">
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