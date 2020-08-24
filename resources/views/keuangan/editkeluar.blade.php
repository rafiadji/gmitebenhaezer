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
    Ubah Pengeluaran Gereja
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('keuangankeluar.index') }}">Pegeluaran Gereja</a></li>
    <li class="breadcrumb-item active">Ubah Pegeluaran Gereja</li>
@endsection

@section('content')
<form action="{{ route('keuangankeluar.update', $keuangan->id) }}" class="form-horizontal" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah Keuangan Gereja</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $keuangan->user->name }}" disabled>
                            <input type="hidden" name="id_user" value="{{ $keuangan->id_user }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_keuangan" class="col-sm-3 col-form-label">Tanggal Pengeluaran</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" id="tgl_keuangan" name="tgl_keuangan" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{ $keuangan->tgl_keuangan }}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="jenis_keuangan" id="jenis_keuangan" value="pengeluaran">
                    <div class="form-group row">
                        <label for="id_set" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="id_set" id="id_set">
                                <option value='' disabled selected>Pilih Keterangan keuangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan_lain" class="col-sm-3 col-form-label">Keterangan Lain</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="keterangan_lain" name="keterangan_lain" placeholder="Keterangan Lain" disabled value="{{ $keuangan->keterangan_lain }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="nominal" name="nominal" class="form-control" data-inputmask-alias="currency" value="{{ abs($keuangan->nominal) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('keuangankeluar.index') }}" class="btn btn-default float-right">Batal</a>
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
        var jenis_keuangan = $('#jenis_keuangan').val();
        var id_set_lama = "{{ $keuangan->id_set }}";
        $.ajax({
            type:"POST",
            dataType:"html",
            url:"{{ route('keuangankeluar.getData') }}",
            data:{
                _token:'{{ csrf_token() }}',
                jenis:jenis_keuangan,
                id_set:id_set_lama
            },
            success: function(data) {
                $('#id_set').html(data);
                var id_set = $('#id_set').val();
                if (id_set == '1' || id_set == '2') {
                    $('#keterangan_lain').prop('disabled', false);
                }
                else{
                    $('#keterangan_lain').prop('disabled', true);
                }
            }
        });

        $('.datepick').datetimepicker({
            format: 'L'
        });
        $('[data-mask]').inputmask();
        $('#nominal').inputmask({
            prefix: "",
            groupSeparator:".",
            alias:"numeric",
            placeholder:"0",
            autoGroup:true,
            digits:0,
            digitsOptional:false,
            clearMaskOnLostFocus:false
        })
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('#id_set').change(function() {
            var id_set = $('#id_set').val();
            $('#keterangan_lain').val("");
            if (id_set == '1' || id_set == '2') {
                $('#keterangan_lain').prop('disabled', false);
            }
            else{
                $('#keterangan_lain').prop('disabled', true);
            }
        });
    });
</script>
@endsection
