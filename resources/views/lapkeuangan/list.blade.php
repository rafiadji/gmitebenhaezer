@extends('layouts.base')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('title_head')
    Laporan Keuangan Gereja
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Laporan Keuangan Gereja</li>
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
                <h3 class="card-title">Data Laporan Keuangan Gereja</h3>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="form-horizontal">
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
                                <option value="all" selected>Semua Bulan</option>
                                @foreach($bulans as $key => $val)
                                <option value="{{ $key+1 }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 15%">Tgl Pencatatan</th>
                            <th>Keterangan</th>
                            <th style="width: 15%">Pemasukan (Rp)</th>
                            <th style="width: 15%">Pengeluaran (Rp)</th>
                        </tr>
                    </thead>
                    <tbody id="setTable">

                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <div class="col-6 offset-6">
                    <p class="lead"></p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody id="setSaldo">

                            </tbody>
                        </table>
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

<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function(){
        var thn = $('#tahun').val();
        var bln = $('#bulan').val();
        $.ajax({
            type:"POST",
            dataType:"html",
            url:"{{ route('lapkeuangan.getTable') }}",
            data:{
                _token:'{{ csrf_token() }}',
                tahun:thn,
                bulan:bln
            },
            success: function(data) {
                $('#setTable').html(data);
            }
        });
        $.ajax({
            type:"POST",
            dataType:"html",
            url:"{{ route('lapkeuangan.getSaldo') }}",
            data:{
                _token:'{{ csrf_token() }}',
                tahun:thn,
                bulan:bln
            },
            success: function(data) {
                $('#setSaldo').html(data);
            }
        });
        $('#tahun').change(function() {
            var thn = $('#tahun').val();
            var bln = $('#bulan').val();
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"{{ route('lapkeuangan.getTable') }}",
                data:{
                    _token:'{{ csrf_token() }}',
                    tahun:thn,
                    bulan:bln
                },
                success: function(data) {
                    $('#setTable').html(data);
                }
            });
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"{{ route('lapkeuangan.getSaldo') }}",
                data:{
                    _token:'{{ csrf_token() }}',
                    tahun:thn,
                    bulan:bln
                },
                success: function(data) {
                    $('#setSaldo').html(data);
                }
            });
        });
        $('#bulan').change(function() {
            var thn = $('#tahun').val();
            var bln = $('#bulan').val();
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"{{ route('lapkeuangan.getTable') }}",
                data:{
                    _token:'{{ csrf_token() }}',
                    tahun:thn,
                    bulan:bln
                },
                success: function(data) {
                    $('#setTable').html(data);
                }
            });
            $.ajax({
                type:"POST",
                dataType:"html",
                url:"{{ route('lapkeuangan.getSaldo') }}",
                data:{
                    _token:'{{ csrf_token() }}',
                    tahun:thn,
                    bulan:bln
                },
                success: function(data) {
                    $('#setSaldo').html(data);
                }
            });
        });
        $('.datepick').datetimepicker({
            format: 'L'
        });
        $('[data-mask]').inputmask();
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $(".datatabel").DataTable({
            "ordering": false,
        });
    });
</script>
@endsection
