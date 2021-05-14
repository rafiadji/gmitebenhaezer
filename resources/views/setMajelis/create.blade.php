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
    Tambah Data Majelis
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('setmajelis.index') }}">Setting Majelis</a></li>
    <li class="breadcrumb-item active">Tambah Data Majelis</li>
@endsection

@section('content')
<form action="{{ route('setmajelis.store') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Majelis</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id_jemaat_majelis" class="col-sm-3 col-form-label">Nama Majelis</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_majelis" id="id_jemaat_majelis">
                                <option value="" disabled selected>Pilih Nama Majelis</option>
                                @foreach($jemaats as $jemaat)
                                    <option value="{{ $jemaat->id }}">{{ $jemaat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan_majelis" class="col-sm-3 col-form-label">Jabatan Majelis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="jabatan_majelis" name="jabatan_majelis" placeholder="Jabtan Majelis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="urutan" class="col-sm-3 col-form-label">Urutan</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan" value="{{ ($urut->urutan + 100)}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="animasi" class="col-sm-3 col-form-label">Animasi</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="animasi" id="animasi">
                                <option value="" disabled selected>Pilih Animasi</option>
                                <option value="fade-up">fade-up</option>
                                <option value="fade-down">fade-down</option>
                                <option value="fade-right">fade-right</option>
                                <option value="fade-left">fade-left</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('setmajelis.index') }}" class="btn btn-default float-right">Batal</a>
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
