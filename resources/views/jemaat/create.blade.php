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
    Tambah Jemaat
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('jemaat.index') }}">Jemaat</a></li>
    <li class="breadcrumb-item active">Tambah Jemaat</li>
@endsection

@section('content')
<form action="{{ route('jemaat.store') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jemaat</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Diri</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nomer_kk" class="col-sm-3 col-form-label">No. Kartu Keluarga</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomer_kk" name="nomer_kk" placeholder="No. Kartu Keluarga jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="M" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="jk" value="laki-laki" id="M" checked>
                                                <label for="M">Laki-Laki</label>
                                            </div>&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="jk" value="perempuan" id="W">
                                                <label for="W">Perempuan</label>
                                            </div>&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_tlp" class="col-sm-3 col-form-label">No. Telepon</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" id="no_tlp" name="no_tlp" class="form-control" data-inputmask='"mask": "999 999 999 999 999"' data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ayah" class="col-sm-3 col-form-label">Status Keluarga</label>
                                        <div class="col-sm-9">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_keluarga" value="ayah" id="ayah" checked>
                                                <label for="ayah">Ayah</label>
                                            </div>&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_keluarga" value="ibu" id="ibu">
                                                <label for="ibu">Ibu</label>
                                            </div>&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_keluarga" value="anak" id="anak">
                                                <label for="anak">Anak</label>
                                            </div>&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Tambahan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_baptis" class="col-sm-3 col-form-label">Nama Baptis</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name_baptis" name="name_baptis" placeholder="Nama Baptis jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_baptis" class="col-sm-3 col-form-label">Tanggal Baptis</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="tgl_baptis" name="tgl_baptis" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_sidi" class="col-sm-3 col-form-label">Tanggal Sidi</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="tgl_sidi" name="tgl_sidi" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_nikah" class="col-sm-3 col-form-label">Tanggal Pernikahan</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="tgl_nikah" name="tgl_nikah" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan jemaat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="aktif" class="col-sm-3 col-form-label">Status Aktif</label>
                                        <div class="col-sm-9">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_aktif" value="aktif" id="aktif" checked>
                                                <label for="aktif">Aktif</label>
                                            </div>&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_aktif" value="tidak aktif" id="nonaktif">
                                                <label for="nonaktif">Tidak Aktif</label>
                                            </div>&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="status_aktif" value="meninggal" id="meninggal">
                                                <label for="meninggal">Meninggal</label>
                                            </div>&nbsp;
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2" name="id_jabatan" id="jabatan">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                @foreach($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('jemaat.index') }}" class="btn btn-default float-right">Batal</a>
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