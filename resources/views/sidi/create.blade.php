@extends('layouts.base')

@section('css')
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
    Tambah Sidi
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sidi.index') }}">Sidi</a></li>
    <li class="breadcrumb-item active">Tambah Sidi</li>
@endsection

@section('content')
<form action="{{ route('sidi.store') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Sidi</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tgl_sidi" class="col-sm-3 col-form-label">Tanggal Sidi</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_sidi" name="tgl_sidi" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_jemaat_sidi" class="col-sm-3 col-form-label">Peserta Sidi</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_sidi" id="id_jemaat_sidi">
                                <option value="" disabled selected>Pilih Peserta</option>
                                @foreach($jemaats as $jemaat)
                                <option value="{{ $jemaat->id }}">{{ $jemaat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="belum" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="status_sidi" value="belum selesai" id="belum" checked>
                                <label for="belum">Belum Selesai</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="status_sidi" value="selesai" id="selesai">
                                <label for="selesai">Selesai</label>
                            </div>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('sidi.index') }}" class="btn btn-default float-right">Batal</a>
                </div>
            </div>
        </div>
    </div>
    
</form>
@endsection

@section('javascript')
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
        $('.datepick').datetimepicker({
            format: 'L'
        });
        $('[data-mask]').inputmask();
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endsection