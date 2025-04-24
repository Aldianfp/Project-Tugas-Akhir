<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Brygada+1918:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/tiny-slider.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/style.css">
    <title>CV Yadin Karya</title>
    <style>
        .carousel-item img {
            width: 100%;
            height: 400px;
            /* Sesuaikan tinggi gambar sesuai kebutuhan */
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
        }

        .gambarportofolio {
            width: 100%;
            height: 400px;
            /* Sesuaikan tinggi gambar sesuai kebutuhan */
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
        }

        .navbar-nav .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease, transform 0.3s ease;
            display: inline-block;
            font-size: 0.9rem;
            margin-right: 1.5rem;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 100%;
            background-color: rgb(104, 75, 22);
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        .navbar-nav .nav-link:hover::before,
        .navbar-nav .nav-link.active::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .navbar-nav .nav-link:hover {
            color: rgb(104, 75, 22);
            transform: scale(1.1);
            font-weight: bold;
        }

        .navbar-nav .nav-link.active {
            color: rgb(104, 75, 22);
            font-weight: bold;
        }

        .navbar-nav .nav-link.active::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        /* Ensuring proper spacing and alignment */
        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .site-nav {
            margin-top: 1rem;
        }
    </style>

    @stack('styles')
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav mt-3 navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand logo -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/assets/images/logo png.png" alt="Logo" width="250" height="50">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">TENTANG PERUSAHAAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('portofolio.index') ? 'active' : '' }}"
                            href="{{ route('portofolio.index') }}">PORTOFOLIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('profile-perusaahaan') ? 'active' : '' }}"
                            href="{{ route('profile-perusaahaan') }}">PROFILE PERUSAHAAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('kontak') ? 'active' : '' }}"
                            href="{{ route('kontak') }}">KONTAK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="site-footer">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>CV. YADIN KARYA</h3>
                        <p>
                            Jl. Melati No. 33 Inkorba | Campago Guguk Bulek, Kec. Mandiangin Koto Selayan, Bukittinggi,
                            Sumatera Barat | 26128
                        </p>
                    </div>
                </div> <!-- /.col-lg-3 -->
                <div class="col-lg"></div>
                <div class="col-lg-3">
                    <div class="widget">
                        <h3>Hubungi Kami</h3>
                        <ul class="list-unstyled social">
                            <li><a href="{{ route('kontak') }}"><span class="icon-instagram"></span></a></li>
                            <li><a href="{{ route('kontak') }}"><span class="icon-twitter"></span></a></li>
                            <li><a href="{{ route('kontak') }}"><span class="icon-facebook"></span></a></li>
                            <li><a href="{{ route('kontak') }}"><span class="icon-whatsapp"></span></a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-3 -->

            </div> <!-- /.row -->
        </div> <!-- /.site-footer -->

        <!-- Preloader -->
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Bootstrap JS Bundle -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/tiny-slider.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/aos.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/navbar.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/counter.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/rellax.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/flatpickr.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/glightbox.min.js"></script>
        <script src="{{ asset('assets/frontend') }}/js/custom.js"></script>
        @stack('scripts')
</body>

</html>
