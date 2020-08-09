<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">
                {{-- <h1 class="logo mr-auto"><a href="{{ url('/') }}">GMIT EBENHAEZER LARANTUKA</a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{ url('/') }}" class="logo mr-auto"><img src="{{ asset('front/img/logo.png') }}" alt="" class="img-fluid"></a>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="#ibadah">Pengumuman & <br> Ibadah</a></li>
                        <li><a href="#sidi">Pembaptisan & <br> Sidi</a></li>
                        <li><a href="#nikah">Pernikahan</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="{{ url('/home') }}">Home</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </nav><!-- .nav-menu -->
            </div>
        </div>
    </div>
</header><!-- End Header -->