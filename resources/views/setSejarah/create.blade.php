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
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('title_head')
    Tambah Data Sejarah Ketua
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('setsejarah.index') }}">Setting Sejarah</a></li>
    <li class="breadcrumb-item active">Tambah Data Sejarah Ketua</li>
@endsection

@section('content')
<form action="{{ route('setsejarah.store') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Sejarah Ketua</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Ketua</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Ketua">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahun_awal" class="col-sm-3 col-form-label">Tahun Awal</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="tahun_awal" id="tahun_awal">
                                <option value="" disabled selected>Pilih Tahun Awal</option>
                                @for ($i = 1930; $i <= 3000; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahun_akhir" class="col-sm-3 col-form-label">Tahun Akhir</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="tahun_akhir" id="tahun_akhir">
                                <option value="" disabled selected>Pilih Tahun Awal</option>
                                <option value="">Sampai Sekarang</option>
                                @for ($i = 1930; $i <= 3000; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('setsejarah.index') }}" class="btn btn-default float-right">Batal</a>
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
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function(){
        bsCustomFileInput.init();
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
