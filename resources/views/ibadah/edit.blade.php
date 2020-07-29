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
    Ubah Jadwal Ibadah
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('ibadah.index') }}">Jadwal Ibadah</a></li>
    <li class="breadcrumb-item active">Ubah Jadwal Ibadah</li>
@endsection

@section('content')
<form action="{{ route('ibadah.update', $ibadah->id) }}" class="form-horizontal" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Jadwal Ibadah</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $ibadah->user->name }}" disabled>
                            <input type="hidden" name="id_user" value="{{ $ibadah->id_user }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-sm-3 col-form-label">Rayon / Kategori Ibadah</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_kategori" id="id_kategori">
                                <option value="" disabled selected>Pilih Rayon / Kategori Ibadah</option>
                                @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" @if ($ibadah->id_kategori == $kategori->id) selected @endif>{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_ibadah" class="col-sm-3 col-form-label">Tanggal Ibadah</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_ibadah" name="tgl_ibadah" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ $ibadah->tgl_ibadah }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="waktu_ibadah" class="col-sm-3 col-form-label">Waktu Ibadah</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <input type="text" id="waktu_ibadah" name="waktu_ibadah" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="HH:MM" data-mask value="{{ $ibadah->waktu_ibadah }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_ibadah" class="col-sm-3 col-form-label">Tempat Ibadah</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tempat_ibadah" name="tempat_ibadah" placeholder="Tempat Ibadah" value="{{ $ibadah->tempat_ibadah }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pelayan" class="col-sm-3 col-form-label">Pelayan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="pelayan" name="pelayan" placeholder="Pelayan" value="{{ $ibadah->pelayan }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('ibadah.index') }}" class="btn btn-default float-right">Batal</a>
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