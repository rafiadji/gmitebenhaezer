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
    Ubah Jadwal Pernikahan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('nikah.index') }}">Pernikahan</a></li>
    <li class="breadcrumb-item active">Ubah Jadwal Pernikahan</li>
@endsection

@section('content')
<form action="{{ route('nikah.update', $nikah->id) }}" class="form-horizontal" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Jadwal Pernikahan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tgl_nikah" class="col-sm-3 col-form-label">Tanggal Pernikahan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            <input type="text" id="tgl_nikah" name="tgl_nikah" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ $nikah->tgl_nikah }}">
                            </div>
                        </div>
                    </div>
                    <h5>Data Mempelia Pria</h5>
                    <div class="form-group row">
                        <label for="id_jemaat_pria" class="col-sm-3 col-form-label">Calon Suami</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_pria" id="id_jemaat_pria">
                                <option value="" disabled selected>Pilih Calon Suami</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jk == "laki-laki" && $jemaat->jabatan->jabatan != "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($nikah->id_jemaat_pria == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_p_1" class="col-sm-3 col-form-label">Saksi 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_p_1" name="name_saksi_p_1" placeholder="Nama Saksi 1" value="{{ $nikah->name_saksi_p_1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_p_2" class="col-sm-3 col-form-label">Saksi 2</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_p_2" name="name_saksi_p_2" placeholder="Nama Saksi 2" value="{{ $nikah->name_saksi_p_2 }}">
                        </div>
                    </div>
                    <h5>Data Mempelia Wanita</h5>
                    <div class="form-group row">
                        <label for="id_jemaat_wanita" class="col-sm-3 col-form-label">Calon Istri</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_wanita" id="id_jemaat_wanita">
                                <option value="" disabled selected>Pilih Calon Istri</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jk == "perempuan" && $jemaat->jabatan->jabatan != "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($nikah->id_jemaat_wanita == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_w_1" class="col-sm-3 col-form-label">Saksi 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_w_1" name="name_saksi_w_1" placeholder="Nama Saksi 1" value="{{ $nikah->name_saksi_w_1 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_saksi_w_2" class="col-sm-3 col-form-label">Saksi 2</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name_saksi_w_2" name="name_saksi_w_2" placeholder="Nama Saksi 2" value="{{ $nikah->name_saksi_w_2 }}">
                        </div>
                    </div>
                    <h5>Data Pendeta</h5>
                    <div class="form-group row">
                        <label for="id_jemaat_pendeta" class="col-sm-3 col-form-label">Pendeta</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_jemaat_pendeta" id="id_jemaat_pendeta">
                                <option value="" disabled selected>Pilih Pendeta</option>
                                @foreach($jemaats as $jemaat)
                                    @if ($jemaat->jabatan->jabatan == "majelis")
                                        <option value="{{ $jemaat->id }}" @if ($nikah->id_jemaat_pendeta == $jemaat->id) selected @endif>{{ $jemaat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('nikah.index') }}" class="btn btn-default float-right">Batal</a>
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
