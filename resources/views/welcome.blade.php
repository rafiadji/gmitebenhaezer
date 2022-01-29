@extends('layouts.front.base')

@section('main')
    <section id="pgib" class="section-bg">
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
                </section>
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
                </section>
            </div>
        </div>
    </section>
    <section id="renungan">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                @if (!empty($renungans->renungan))
                <h3>Renungan</h3>
                <p>{{ strip_tags($renungans->judul) }} <br> {{ strip_tags($renungans->renungan) }}</p>
                @endif
            </div>
        </div>
    </section>
    <section id="tentang">
        <div class="container" data-aos="fade-right">
            <header class="section-header">
                <h3>Tentang Kami</h3>
                <p>GMIT Jemaat Ebenhaezer Larantuka adalah jemaat Kristen Diaspora di pulau Flores, salah satu Jemaat dalam Sinode Gereja Masehi Injili di Timor (GMIT) dalam Klasis Flores yang memiliki Mata Jemaat/Pos Pelayanan</p>
            </header>
            <div class="row tentang-cols">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="tentang-col">
                        <div class="img">
                            <img src="{{ asset('img/tentang/t1.jpeg') }}" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Mata Jemaat / Pos Pelayanan</a></h2>
                        <p>
                            <ol>
                                <li>Mata Jemaat Imanuel Waiwerang</li>
                                <li>Mata Jemaat Imanuel Boru</li>
                                <li>Pos Pelayanan Eklesia Waiwadan</li>
                                <li>Pos Pelayanan Lahairoi Beloaja</li>
                                <li>Bakal Pos Pelayanan Menanga</li>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="tentang-col">
                        <div class="img">
                            <img src="{{ asset('img/tentang/t2.jpeg') }}" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Tema Periode 2020-2023 </a></h2>
                        <p>
                            “Roh Tuhan menjadikan dan membaharui segenap ciptaan” (bdk. Mazmur 104:30)
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="tentang-col">
                        <div class="img">
                            <img src="{{ asset('img/tentang/t3.jpeg') }}" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-list-outline"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Sub Tema Tahun Pelayanan 2020 </a></h2>
                        <p>
                            “Roh Kudus berkuasa atas gereja, masyarakat dan semesta” (Bdk. I Samuel 16:13; Lukas 4:18-19)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="majelis">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Majelis Kami</h3>
            </div>
            <div class="row">
                @foreach ($majelis as $mj)
                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="{{ $mj->animasi }}" data-aos-delay="{{ $mj->urutan }}">
                        @if (!empty($mj->id_jemaat_majelis))
                        <img src="{{ asset('img/upload/'.$mj->jemaat->foto) }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $mj->jemaat->name }}</h4>
                                <span>{{ $mj->jabatan_majelis}}</span>
                            </div>
                        </div>
                        @else
                        <img src="{{ asset('img/avatar3.png') }}" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4></h4>
                                <span>{{ $mj->jabatan_majelis}}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="galeri" class="section-bg">
        <div class="container" data-aos="fade-left">
            <header class="section-header">
                <h3>Kegiatan Kami</h3>
            </header>
            <div class="row" data-aos="fade-up" data-aos-delay="100"">
                {{-- <div class=" col-lg-12">
                    <ul id="galeri-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div> --}}
            </div>
            <div class="row galeri-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($kegiatans as $kegiatan)
                <div class="col-lg-4 col-md-6 galeri-item filter-app">
                    <div class="galeri-wrap">
                        <figure>
                            <a href="{{ asset('img/kegiatan/'. $kegiatan->foto_kegiatan) }}" class="venobox" data-gall="portfolioGallery" title="{{ strip_tags($kegiatan->ket_kegiatan) }}">
                                <img src="{{ asset('img/kegiatan/'. $kegiatan->foto_kegiatan) }}" class="img-fluid" alt="">
                            </a>
                        </figure>

                        <div class="galeri-info">
                            <h4>{{ $kegiatan->nama_kegiatan}}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="sejarah">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Sejarah Gereja</h3>
                <p style="text-align: justify">
                    Gereja ada dan berdiri atas dasar Kuasa Roh Kudus, sehingga banyak orang yang telah percaya dan mengenal Yesus Kristus sebagai Juru Selamat dan Kepala Gereja.
                    <br><br>
                    Melalui Amanat/pesan Yesus ( Mat 28 : 19 – 20 ), maka Amanat itu terus disampaikan kepada manusia dan Dunia yang menerusi segala Zaman dimulai dari jemaat mula-mula (dari Jurusalem hingga kini) yang telah menerima kabar sukacita (Evanggelion) tentang Yesus Kristus sebagai Juru Selamat.
                    <br><br>
                    Sejarah berdirinya Gereja yang berawal dari masa kolonial Belanda dengan sistem pemerintahannya, dengan sendirinya orang-orang Belanda yang beagama Protestan di tambah lagi dengan orang pribumi dan dari luar Larantuka maka terbentuklah kelompok warga Jemaat pada masa itu.
                    <br><br>
                    Patut diketahui bahwa Gereja katholik telah mendahuluinya sejak orang portugis bersama pada Misionaris dengan tugas pelayanan missinya ,  namun dengan pergumulan Warga Jemaat yang ada pada saat itu, pelayanan rohani bagi para Tentara Belanda dan pegawai tetap dilakukan dengan mempergunakan rumah tinggal dan asrama sebagai tempat Ibadah oleh penginjil orang Belanda/Misionaris.
                    <br><br>
                    Atas dasar pergumulan maka sekelompok Warga Jemaat mulai merencanakan untuk membangun sebuah rumah Ibadah yang tetap untuk bersekutu dan ber-Ibadah kepada TUHAN. Melalui niat yang baik ini, maka rencana dapat terlaksana dengan proses pembangunan (Rumah Ibadah) berukuran 7 x 20 meter pada awal tahun 1937 dan pada 1 Januari 1938 diresmikan dan ditahbiskan sebagai tempat Ibadah resmi.
                    <br><br>
                    Sebagai suatu peringatan berdirinya Gedung Gereja Protestan di Larantuka, telah dipasang prasasti didalam Gedung yang bertulisakan nama-nama pendiri gereja sebagai berikut :
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center">PEROESAH (1 - 1 - 1938)</th>
                            </tr>
                            <tr class="hidden">
                                <th style="width: 10%">No</th>
                                <th style="width: 90%">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>D.M. WATTIMENA</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>R. FRANCIS</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>E. PATTIJ</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>F. FOE</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>W. SALAKA</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>R. DJAWA</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>R.N. SUMAMPAUW</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>J.F. RUHUPESSIJ</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>A. TAPILATU</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    Para pendiri adalah Warga Jemaat pertama yang diberi nama JEMAAT EBENHAEZER (1 sem, 7 : 12 b).
                    <br><br>
                    Para pelayan yang melayani Jemaat Ebenhaezer mulai sejak berdiri hingga saat ini :
                    <?php $no = 1; ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 45%">Nama Ketua</th>
                                <th style="width: 45%">Masa Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sejarahs as $sejarah)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $sejarah->nama }}</td>
                                    <td>{{ $sejarah->tahun_awal }} - @if ($sejarah->tahun_akhir != ""){{ $sejarah->tahun_akhir }}@else Sampai Sekarang @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    Dengan perkembangan jemaat yang begitu pesat hingga saat ini, maka gedung Gereja yang dibangun pada tahun 1937 tidak dapat lagi menampung kegiatan pelayanan warga jemaat secara keseluruhan, maka dengan keadaan ini warga jemaat terus memikirkan dan berupaya untuk mencari Dana dan lokasi baru.
                </p>
            </div>
        </div>
    </section>
    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Hubungi Kami</h3>
                <p>Anda dapat Menghubungi kami di :</p>
            </div>
            <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJF4CPlDt-rC0RKpr8LOu7D_E&key=AIzaSyCyN-AubX-z5kjWASGWgJ7z0QmqM_zPq9Q" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="row contact-info">
                <div class="col-md-6">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Alamat</h3>
                        <address>Jl. Jend. Sudirman No.123, Sarotari, Larantuka, Kabupaten Flores Timur, Nusa Tenggara Timur </address>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Nomor Telepon</h3>
                        <p><a href="tel:(0383)21141">(0383) 21141</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
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
@endsection
