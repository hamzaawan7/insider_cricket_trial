<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Plugins CSS -->
    <!-- @Bootstrap 4.1.1
        @Fontawesome 4.7.0
        @mCustomScrollbar
        @Slick Slider (main + theme)
        @fancy box 1.3.4
        @custom slidin menu -->
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    </link>
    <link rel="stylesheet" href="{{ asset('css/menu-slide.css') }}">
    </link>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </link>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet"/>

    <title>Cricket - @yield('title')</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>
<!-- Header -->
<div class="first-view">
    <div class="ex-container">
        <header class="site-header clearboth">
            <div class="left-side">
                <!-- logo -->
                <a href="#">
                    <img src="{{ asset('images/logo.png') }}" width="150" height="50">
                </a>
            </div>
            <div class="mid-side">
                <!-- Primary Menu -->
                <nav class="main-menu-nav">
                    <div class="">
                        <div class="body-overlay"></div>
                        <div class="menu-toggler"></div>
                    </div>
                </nav>
            </div>
        </header>

    </div>
</div>
<!-- header ends -->

<main class="site-main main-pb0">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="white-area">
        <div class="container">
            <div class="footer-social">
                <a href="#" onclick="return false;"><span class="fa fa-facebook"></span></a>
                <a href="#" onclick="return false;"><span class="fa fa-twitter"></span></a>
                <a href="#" onclick="return false;"><span class="fa fa-linkedin"></span></a>
                <a href="#" onclick="return false;"><span class="fa fa-youtube"></span></a>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="footer-menu second-menu">
                        <ul class="clearboth">
                            <li><a href="#" onclick="return false;">About Sports</a></li>
                            <li><a href="#" onclick="return false;">Contact with us</a></li>
                            <li><a href="#" onclick="return false;">Terms of Service</a></li>
                            <li><a href="#" onclick="return false;">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <p class="copyright-text">© {{ date('Y') }} Insider Cricket </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Plugins JS -->
<!-- @migrate 3.0.1
    @Bootstrap 4.1.1 + Popper
    @Slick Slider
    @mCustomScrollbar
    @fancy box 1.3.4 -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/hashe.js') }}"></script>
@yield('scripts')

</body>
</html>
