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
    Ubah Password
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Ubah Password</li>
@endsection

@section('content')
<form action="{{ route('changepassword.update') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Password</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control {{ session('err_pass_lama') ? ' is-invalid' : '' }}" id="password_lama" name="password_lama" placeholder="Password Lama" value="{{ old('password_lama') }}">
                            @if (session('err_pass_lama'))
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ session('err_pass_lama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control {{ session('err_pass_baru') ? ' is-invalid' : '' }}" id="password_baru" name="password_baru" placeholder="Password Baru" value="{{ old('password_baru') }}">
                            @if (session('err_pass_baru'))
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ session('err_pass_baru') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="konfirm_password" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control {{ session('err_pass_konfirm') ? ' is-invalid' : '' }}" id="konfirm_password" name="konfirm_password" placeholder="Konfirmasi Password Baru">
                            @if (session('err_pass_konfirm'))
                                <span class="error invalid-feedback" role="alert">
                                    <strong>{{ session('err_pass_konfirm') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/home') }}" class="btn btn-default float-right">Batal</a>
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