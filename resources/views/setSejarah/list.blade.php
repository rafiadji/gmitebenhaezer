@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Setting Sejarah
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Setting Sejarah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setting Sejarah</h3>
                <div class="card-tools">
                    {{-- @can('create nikah') --}}
                    <a href="{{ route('setsejarah.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Nama Ketua</a>                        
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                <thead>
                <tr>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 10%">Tahun Awal</th>
                    <th style="width: 10%">Tahun Akhir</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($sejarahs as $sejarah)
                    <tr>
                        <td>{{ $sejarah->nama }}</td>
                        <td>{{ $sejarah->tahun_awal }}</td>
                        <td>@if ($sejarah->tahun_akhir != ""){{ $sejarah->tahun_akhir }}@else Sampai Sekarang @endif</td>
                        <td>
                            <div class="btn-group">
                                {{-- @can('update nikah') --}}
                                <a href="{{ route('setsejarah.edit',$sejarah->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>                                    
                                {{-- @endcan --}}
                                {{-- @can('delete katibadah') --}}
                                <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#confrimModal{{ $sejarah->id }}"><i class="fas fa-trash"></i> Hapus</button>                                    
                                {{-- @endcan --}}
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
@foreach ($sejarahs as $sejarah)
<div class="modal fade" id="confrimModal{{ $sejarah->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Nama <strong>{{ $sejarah->nama }}</strong></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form action="{{ route('setsejarah.destroy',$sejarah->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-light">Ya, Saya Yakin</button>
                </form>
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