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
    Tambah Jabatan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
    <li class="breadcrumb-item active">Tambah Jabatan</li>
@endsection

@section('content')
<form action="{{ route('jabatan.store') }}" class="form-horizontal" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jabatan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Nama Jabatan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Jemaat</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read jemaat" id="readjemaat">
                                <label for="readjemaat">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create jemaat" id="createjemaat">
                                <label for="createjemaat">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update jemaat" id="updatejemaat">
                                <label for="updatejemaat">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete jemaat" id="deletejemaat">
                                <label for="deletejemaat">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Sidi</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read sidi" id="readsidi">
                                <label for="readsidi">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create sidi" id="createsidi">
                                <label for="createsidi">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update sidi" id="updatesidi">
                                <label for="updatesidi">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete sidi" id="deletesidi">
                                <label for="deletesidi">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Pernikahan</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read nikah" id="readnikah">
                                <label for="readnikah">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create nikah" id="createnikah">
                                <label for="createnikah">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update nikah" id="updatenikah">
                                <label for="updatenikah">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete nikah" id="deletenikah">
                                <label for="deletenikah">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Pembaptisan</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read baptis" id="readbaptis">
                                <label for="readbaptis">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create baptis" id="createbaptis">
                                <label for="createbaptis">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update baptis" id="updatebaptis">
                                <label for="updatebaptis">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete baptis" id="deletebaptis">
                                <label for="deletebaptis">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Pengumuman</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read pengumuman" id="readpengumuman">
                                <label for="readpengumuman">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create pengumuman" id="createpengumuman">
                                <label for="createpengumuman">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update pengumuman" id="updatepengumuman">
                                <label for="updatepengumuman">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete pengumuman" id="deletepengumuman">
                                <label for="deletepengumuman">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Ibadah</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read ibadah" id="readibadah">
                                <label for="readibadah">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create ibadah" id="createibadah">
                                <label for="createibadah">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update ibadah" id="updateibadah">
                                <label for="updateibadah">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete ibadah" id="deleteibadah">
                                <label for="deleteibadah">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Keuangan</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read keuangan" id="readkeuangan">
                                <label for="readkeuangan">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create keuangan" id="createkeuangan">
                                <label for="createkeuangan">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update keuangan" id="updatekeuangan">
                                <label for="updatekeuangan">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete keuangan" id="deletekeuangan">
                                <label for="deletekeuangan">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Kategori Ibadah</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read katibadah" id="readkatibadah">
                                <label for="readkatibadah">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create katibadah" id="createkatibadah">
                                <label for="createkatibadah">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update katibadah" id="updatekatibadah">
                                <label for="updatekatibadah">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete katibadah" id="deletekatibadah">
                                <label for="deletekatibadah">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu Setting Keuangan</label>
                        <div class="col-sm-5">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="read setkeuangan" id="readsetkeuangan">
                                <label for="readsetkeuangan">Read</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="create setkeuangan" id="createsetkeuangan">
                                <label for="createsetkeuangan">Create</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="update setkeuangan" id="updatesetkeuangan">
                                <label for="updatesetkeuangan">Update</label>
                            </div>&nbsp;
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" name="permission[]" value="delete setkeuangan" id="deletesetkeuangan">
                                <label for="deletesetkeuangan">Delete</label>
                            </div>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('jabatan.index') }}" class="btn btn-default float-right">Batal</a>
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