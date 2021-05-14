@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Setting Majelis
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Setting Majelis</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setting Majelis</h3>
                <div class="card-tools">
                    {{-- @can('create nikah') --}}
                    <a href="{{ route('setmajelis.create') }}" class="btn btn-block btn-sm bg-gradient-success"><i class="fas fa-plus"></i> Tambah Majelis</a>                        
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatabel">
                <thead>
                <tr>
                    <th style="width: 30%">Nama</th>
                    <th style="width: 20%">Jabatan Majelis</th>
                    <th style="width: 10%">Urutan</th>
                    <th style="width: 10%">Animasi</th>
                    <th style="width: 10%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($setmajelis as $smajelis)
                    <tr>
                        <td>@if (!empty($smajelis->id_jemaat_majelis)) {{ $smajelis->jemaat->name }} @endif</td>
                        <td>{{ $smajelis->jabatan_majelis }}</td>
                        <td>{{ $smajelis->urutan }}</td>
                        <td>{{ $smajelis->animasi }}</td>
                        <td>
                            <div class="btn-group">
                                {{-- @can('update nikah') --}}
                                <a href="{{ route('setmajelis.edit',$smajelis->id) }}" class="btn btn-sm bg-gradient-info"><i class="fas fa-pencil-alt"></i> Ubah</a>                                    
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