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
    Ubah Profile
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Ubah Profile</li>
@endsection

@section('content')
<?php
    if (Auth::user()->name == "Admin") {
        $ava = asset('img/avatar.png');
    }
    else {
        $ava = asset('img/upload/'.Auth::user()->jemaat->foto);
    }
?>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ $ava }}" alt="User profile picture">
                    </div>
                    @if (!empty(Auth::user()->jemaat->id))
                    <h3 class="profile-username text-center">{{ Auth::user()->jemaat->name }}</h3>
                    @else
                    <h3 class="profile-username text-center">Admin</h3>
                    @endif
                    <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadModal">Ubah Foto</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body">
                @if (!empty(Auth::user()->jemaat->id))
                <form action="{{ route('changeprofile.update') }}" class="form-horizontal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK jemaat" value="{{ Auth::user()->jemaat->nik }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomer_kk" class="col-sm-3 col-form-label">No. Kartu Keluarga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomer_kk" name="nomer_kk" placeholder="No. Kartu Keluarga jemaat" value="{{ Auth::user()->jemaat->nomer_kk }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email jemaat" value="{{ Auth::user()->jemaat->user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama jemaat" value="{{ Auth::user()->jemaat->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_baptis" class="col-sm-3 col-form-label">Nama Baptis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_baptis" name="name_baptis" placeholder="Nama Baptis jemaat" value="{{ Auth::user()->jemaat->name_baptis }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="M" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="jk" value="laki-laki" id="M" @if (Auth::user()->jemaat->jk == 'laki-laki') checked @endif>
                                <label for="M">Laki-Laki</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="jk" value="perempuan" id="W" @if (Auth::user()->jemaat->jk == 'perempuan') checked @endif>
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
                                <input type="text" id="no_tlp" name="no_tlp" class="form-control" data-inputmask='"mask": "999 999 999 999 999"' data-mask value="{{ Auth::user()->jemaat->no_tlp }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir jemaat" value="{{ Auth::user()->jemaat->tempat_lahir }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ Auth::user()->jemaat->tgl_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="alamat">{{ Auth::user()->jemaat->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ayah" class="col-sm-3 col-form-label">Status Keluarga</label>
                        <div class="col-sm-9">
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="status_keluarga" value="ayah" id="ayah" @if (Auth::user()->jemaat->status_keluarga == 'ayah') checked @endif>
                                <label for="ayah">Ayah</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="status_keluarga" value="ibu" id="ibu" @if (Auth::user()->jemaat->status_keluarga == 'ibu') checked @endif>
                                <label for="ibu">Ibu</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="radio" name="status_keluarga" value="anak" id="anak" @if (Auth::user()->jemaat->status_keluarga == 'anak') checked @endif>
                                <label for="anak">Anak</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_baptis" class="col-sm-3 col-form-label">Tanggal Baptis</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_baptis" name="tgl_baptis" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ Auth::user()->jemaat->tgl_baptis }}">
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
                                <input type="text" id="tgl_sidi" name="tgl_sidi" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ Auth::user()->jemaat->tgl_sidi }}">
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
                                <input type="text" id="tgl_nikah" name="tgl_nikah" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ Auth::user()->jemaat->tgl_pernikahan }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir jemaat" value="{{ Auth::user()->jemaat->pendidikan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan jemaat" value="{{ Auth::user()->jemaat->pekerjaan }}">
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/home') }}" class="btn btn-default float-right">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@if (!empty(Auth::user()->jemaat->id))
<form action="{{ route('changeprofile.fotoup') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="uploadModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Unggah Foto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Unggah Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
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