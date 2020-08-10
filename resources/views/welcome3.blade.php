@extends('layouts.front.base')

@section('main')
    <section id="pgib">
        <div class="container">
            <div class="row">
                <section id="pengumuman" data-aos="fade-right" class="col-md-6">
                    <header class="section-header wow fadeInUp">
                        <h3>Pengumuman</h3>
                    </header>
                    <div class="table-responsive" style="height: 500px;" data-aos="fade-right" data-aos-delay="200">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($pengumumans as $pengumuman)
                                <tr>
                                    <td style="width: 10%"><a href="#" class="" data-toggle="modal" data-target="#detailPengumuman{{ $pengumuman->id }}"><img src="{{ asset('img/Toa.png') }}" alt="" class="img-pengumuman"></a></td>
                                    <td><a href="#" class="" data-toggle="modal" data-target="#detailPengumuman{{ $pengumuman->id }}">{{$pengumuman->judul}}</a><br>{{ substr(strip_tags($pengumuman->isi), 0, 100)."...." }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section><!-- End About Us Section -->
                <section id="ibadah" data-aos="fade-left" class="col-md-6">
                    <header class="section-header wow fadeInUp">
                        <h3>Info Ibadah</h3>
                    </header>
                    <div class="table-responsive" style="height: 500px;" data-aos="fade-left" data-aos-delay="500">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($ibadahs as $ibadah)
                                <tr>
                                    <td style="width: 10%"><a href="#" class="" data-toggle="modal" data-target="#detailIbadah{{ $ibadah->id }}"><img src="{{ asset('img/Toa.png') }}" alt="" class="img-ibadah"></a></td>
                                    <td style="width: 20%">{{ $ibadah->tgl_ibadah }}</td>
                                    <td style="width: 20%">{{ $ibadah->waktu_ibadah }}</td>
                                    <td><a href="#" class="" data-toggle="modal" data-target="#detailIbadah{{ $ibadah->id }}">info Ibadah <br>{{ $ibadah->kategori->kategori }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section><!-- End About Us Section -->
            </div>
        </div>
    </section>
    <section id="bpsd">
        <div class="container">
            <div class="row">
                <section id="baptis" data-aos="fade-right" class="col-md-6">
                    <header class="section-header wow fadeInUp">
                        <h3>Jadwal Pembaptisan</h3>
                    </header>
                    <div class="table-responsive" style="height: 500px;" data-aos="fade-right" data-aos-delay="200">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($baptiss as $baptis)
                                <tr>
                                    <td style="width: 10%"><a href="#" class="" data-toggle="modal" data-target="#detailBaptis{{ $baptis->id }}"><img src="{{ asset('img/Toa.png') }}" alt="" class="img-baptis"></a></td>
                                    <td>{{ $baptis->tgl_baptis }}</td>
                                    <td><a href="#" class="" data-toggle="modal" data-target="#detailBaptis{{ $baptis->id }}">Calon Pembaptisan : {{ $baptis->calon->name }}</a><br>Pendeta : {{ $baptis->pendeta->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section><!-- End About Us Section -->
                <section id="sidi" data-aos="fade-left" class="col-md-6">
                    <header class="section-header wow fadeInUp">
                        <h3>Jadwal Sidi</h3>
                    </header>
                    <div class="table-responsive" style="height: 500px;" data-aos="fade-left" data-aos-delay="500">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($sidis as $sidi)
                                <tr>
                                    <td style="width: 10%"><img src="{{ asset('img/Toa.png') }}" alt="" class="img-sidi"></td>
                                    <td>{{ $sidi->tgl_sidi }}</td>
                                    <td>Peserta Sidi : {{ $sidi->jemaat->name }}<br>Status : {{ $sidi->status_sidi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section><!-- End About Us Section -->
            </div>
        </div>
    </section>
    <section id="nikah" data-aos="fade-up">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>Jadwal Pernikahan</h3>
            </header>
            <div class="table-responsive" style="height: 500px;" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped">
                    <tbody>
                        @foreach ($nikahs as $nikah)
                        <tr>
                            <td style="width: 10%"><a href="#" class="" data-toggle="modal" data-target="#detailNikah{{ $nikah->id }}"><img src="{{ asset('img/Toa.png') }}" alt="" class="img-nikah"></a></a></td>
                            <td>{{ $nikah->tgl_nikah }}</td>
                            <td><a href="#" class="" data-toggle="modal" data-target="#detailNikah{{ $nikah->id }}">Calon Suami : {{ $nikah->pria->name }} Calon Istri : {{ $nikah->wanita->name }}</a><br>Pendeta : {{ $nikah->pendeta->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End About Us Section -->
    @foreach ($pengumumans as $pengumuman)
    <div class="modal fade" id="detailPengumuman{{ $pengumuman->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $pengumuman->judul }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{!! $pengumuman->isi !!}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($ibadahs as $ibadah)
    <div class="modal fade" id="detailIbadah{{ $ibadah->id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Info Ibadah {{ $ibadah->kategori->kategori }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label for="tgl_ibadah" class="col-sm-4 col-form-label">Tanggal Ibadah</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="tgl_ibadah" name="tgl_ibadah" value="{{ $ibadah->tgl_ibadah }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu_ibadah" class="col-sm-4 col-form-label">Waktu Ibadah</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="waktu_ibadah" name="waktu_ibadah" value="{{ $ibadah->waktu_ibadah }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_ibadah" class="col-sm-4 col-form-label">Tempat Ibadah</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="tempat_ibadah" name="tempat_ibadah" value="{{ $ibadah->tempat_ibadah }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pelayan" class="col-sm-4 col-form-label">Pelayan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="pelayan" name="pelayan" value="{{ $ibadah->pelayan }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($baptiss as $baptis)
    <div class="modal fade" id="detailBaptis{{ $baptis->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Calon Pembaptisan : {{ $baptis->calon->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label for="tgl_baptis" class="col-sm-4 col-form-label">Tanggal Baptis</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="tgl_baptis" name="tgl_baptis" value="{{ $baptis->tgl_baptis }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="ayah" name="ayah" value="{{ $baptis->ayah->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="ibu" name="ibu" value="{{ $baptis->ibu->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendeta" class="col-sm-4 col-form-label">Nama Pendeta</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="pendeta" name="pendeta" value="{{ $baptis->pendeta->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_1" class="col-sm-4 col-form-label">Saksi 1</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_1" name="name_saksi_1" value="{{ $baptis->name_saksi_1 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_2" class="col-sm-4 col-form-label">Saksi 2</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_2" name="name_saksi_2" value="{{ $baptis->name_saksi_2 }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($nikahs as $nikah)
    <div class="modal fade" id="detailNikah{{ $nikah->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Pernikahan {{ $nikah->pria->name }} dengan {{ $nikah->wanita->name }} </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <label for="tgl_nikah" class="col-sm-4 col-form-label">Tanggal Pernikahan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="tgl_nikah" name="tgl_nikah" value="{{ $nikah->tgl_nikah }}" disabled>
                            </div>
                        </div>
                        <h5>Data Mempelia Pria</h5>
                        <div class="form-group row">
                            <label for="pria" class="col-sm-4 col-form-label">Calon Suami</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="pria" name="pria" value="{{ $nikah->pria->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_p_1" class="col-sm-4 col-form-label">Saksi 1</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_p_1" name="name_saksi_p_1" value="{{ $nikah->name_saksi_p_1 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_p_2" class="col-sm-4 col-form-label">Saksi 2</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_p_2" name="name_saksi_p_2" value="{{ $nikah->name_saksi_p_2 }}" disabled>
                            </div>
                        </div>
                        <h5>Data Mempelia Wanita</h5>
                        <div class="form-group row">
                            <label for="wanita" class="col-sm-4 col-form-label">Calon Istri</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="wanita" name="wanita" value="{{ $nikah->wanita->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_w_1" class="col-sm-4 col-form-label">Saksi 1</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_w_1" name="name_saksi_w_1" value="{{ $nikah->name_saksi_w_1 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_saksi_w_2" class="col-sm-4 col-form-label">Saksi 2</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="name_saksi_w_2" name="name_saksi_w_2" value="{{ $nikah->name_saksi_w_2 }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendeta" class="col-sm-4 col-form-label">Nama Pendeta</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="pendeta" name="pendeta" value="{{ $nikah->pendeta->name }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection