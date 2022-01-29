@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Setting Renungan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Setting Renungan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setting Renungan</h3>
                <div class="card-tools">
                    {{-- @can('create nikah') --}}
                    <a href="{{ route('setrenungan.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Renungan</a>                        
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                <thead>
                <tr>
                    <th style="width: 30%">Judul</th>
                    <th style="width: 30%">Renungan</th>
                    <th style="width: 10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($setrenungan as $srenungan)
                    <tr>
                        <td>{{ strip_tags($srenungan->judul) }}</td>
                        <td>{{ strip_tags($srenungan->renungan) }}</td>
                        <td>
                            <div class="btn-group">
                                {{-- @can('update nikah') --}}
                                <a href="{{ route('setrenungan.edit',$srenungan->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>                                    
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