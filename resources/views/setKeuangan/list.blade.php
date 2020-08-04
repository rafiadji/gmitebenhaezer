@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Setting Keuangan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Setting Keuangan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Setting Keuangan</h3>
                <div class="card-tools">
                    @can('create setkeuangan')
                    <a href="{{ route('setKeuangan.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Setting Keuangan</a>                        
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 col-sm-2">
                        <div class="nav flex-column nav-tabs h-100" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="tab-pemasukan-tab" data-toggle="pill" href="#tab-pemasukan" role="tab" aria-controls="tab-pemasukan" aria-selected="true">Pemasukan</a>
                            <a class="nav-link" id="tab-pengeluaran-tab" data-toggle="pill" href="#tab-pengeluaran" role="tab" aria-controls="tab-pengeluaran" aria-selected="false">Pengeluaran</a>
                        </div>
                    </div>
                    <div class="col-8 col-sm-10">
                        <div class="tab-content">
                            <div class="tab-pane text-left fade show active" id="tab-pemasukan" role="tabpanel" aria-labelledby="tab-pemasukan-tab">
                                <table class="table table-bordered table-striped datatabel">
                                <thead>
                                <tr>
                                    <th>Setting Keuangan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($setKeuangans as $setKeuangan)
                                    @if ($setKeuangan->jenis_keuangan == 'pemasukan')
                                    <tr>
                                        <td>{{ $setKeuangan->keterangan }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($setKeuangan->keterangan != 'Pemasukan Lain')
                                                @can('update setkeuangan')
                                                    <a href="{{ route('setKeuangan.edit',$setKeuangan->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>                                                    
                                                @endcan
                                                @can('delete setkeuangan')
                                                    <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#confrimModal{{ $setKeuangan->id }}"><i class="fas fa-trash"></i> Hapus</button>                                                    
                                                @endcan
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="confrimModal{{ $setKeuangan->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Setting Keuangan <strong>{{ $setKeuangan->keterangan }}</strong></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('setKeuangan.destroy',$setKeuangan->id) }}" method="POST">
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
                            <div class="tab-pane fade" id="tab-pengeluaran" role="tabpanel" aria-labelledby="tab-pengeluaran-tab">
                                <table class="table table-bordered table-striped datatabel">
                                <thead>
                                <tr>
                                    <th>Setting Keuangan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($setKeuangans as $setKeuangan)
                                    @if ($setKeuangan->jenis_keuangan == 'pengeluaran')
                                    <tr>
                                        <td>{{ $setKeuangan->keterangan }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($setKeuangan->keterangan != 'Pengeluaran Lain')
                                                @can('update setkeuangan')
                                                    <a href="{{ route('setKeuangan.edit',$setKeuangan->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>                                                    
                                                @endcan
                                                @can('delete setkeuangan')
                                                    <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#confrimModal{{ $setKeuangan->id }}"><i class="fas fa-trash"></i> Hapus</button>                                                    
                                                @endcan
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="confrimModal{{ $setKeuangan->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Setting Keuangan <strong>{{ $setKeuangan->keterangan }}</strong></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('setKeuangan.destroy',$setKeuangan->id) }}" method="POST">
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