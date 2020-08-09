<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.front.head')
    <!-- =======================================================
    * Template Name: BizPage - v3.1.0
    * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
    @include('layouts.front.header')
    @include('layouts.front.slider')
    <main id="main">
        @yield('main')
    </main><!-- End #main -->
    @include('layouts.front.footer')
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->
    @include('layouts.front.foot')
</body>
</html>