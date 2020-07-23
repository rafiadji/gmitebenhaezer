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
    Ubah Jadwal Pembaptisan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('baptis.index') }}">Pembaptisan</a></li>
    <li class="breadcrumb-item active">Ubah Jadwal Pembaptisan</li>
@endsection

@section('content')
<form action="{{ route('baptis.update', $baptis->id) }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jadwal Pembaptisan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tgl_baptis" class="col-sm-3 col-form-label">Tanggal Pembaptisan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_baptis" name="tgl_baptis" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ $baptis->tgl_baptis }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jemaatbaptis" class="col-sm-3 col-form-label">Calon</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_baptis" id="jemaatbaptis">
                                <option value="" disabled selected>Pilih Calon</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jabatan->jabatan != "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($baptis->id_jemaat_baptis == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jemaatayah" class="col-sm-3 col-form-label">Ayah Calon</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_ayah" id="jemaatayah">
                                <option value="" disabled selected>Pilih Ayah Calon</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jk == "laki-laki" && $jemaat->jabatan->jabatan != "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($baptis->id_jemaat_ayah == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jemaatibu" class="col-sm-3 col-form-label">Ibu Calon</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_ibu" id="jemaatibu">
                                <option value="" disabled selected>Pilih Ibu Calon</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jk == "perempuan" && $jemaat->jabatan->jabatan != "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($baptis->id_jemaat_ibu == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jemaatpendeta" class="col-sm-3 col-form-label">Pendeta</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_pendeta" id="jemaatpendeta">
                                <option value="" disabled selected>Pilih Pendeta</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jabatan->jabatan == "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($baptis->id_jemaat_pendeta == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_1" class="col-sm-3 col-form-label">Nama Saksi 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_1" name="name_saksi_1" placeholder="Nama Saksi 1" value="{{ $baptis->name_saksi_1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_2" class="col-sm-3 col-form-label">Nama Saksi 2</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_2" name="name_saksi_2" placeholder="Nama Saksi 2" value="{{ $baptis->name_saksi_2 }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('baptis.index') }}" class="btn btn-default float-right">Batal</a>
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