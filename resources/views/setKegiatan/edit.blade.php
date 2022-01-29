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
    Ubah Data Kegiatan
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('setkegiatan.index') }}">Setting Kegiatan</a></li>
    <li class="breadcrumb-item active">Ubah Data Kegiatan</li>
@endsection

@section('content')
<form action="{{ route('setkegiatan.update', $setKegiatan->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Majelis</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="{{ $setKegiatan->nama_kegiatan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Kegiatan</label>
                        <div class="col-sm-5"><img src="{{ asset('img/kegiatan/'. $setKegiatan->foto_kegiatan) }}" class="img-fluid" alt=""></div>
                        <div class="col-sm-3"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#uploadModal">Ubah Foto</button></div>
                    </div>
                    <div class="form-group row">
                        <label for="ket_kegiatan" class="col-sm-3 col-form-label">Keterangan Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea class="ketkegiatan" id="ket_kegiatan" name="ket_kegiatan">{{ $setKegiatan->ket_kegiatan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('setkegiatan.index') }}" class="btn btn-default float-right">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('setkegiatan.fotoup',$setKegiatan->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="hidden" class="custom-file-input" name="foto_kegiatan" value="{{ $setKegiatan->foto_kegiatan }}">
                    <div class="form-group">
                        <label for="file">Foto Kegiatan</label>
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
        // Summernote
        $('.ketkegiatan').summernote({
            placeholder: 'Keterangan Kegiatan',
            height:200,
            tabDisable: true,
            disableDragAndDrop: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
        })
    });
</script>
@endsection
