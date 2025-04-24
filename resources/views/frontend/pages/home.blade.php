@extends('frontend.layouts.app')
@section('content')
    <script src="https://kit.fontawesome.com/c131da55dd.js" crossorigin="anonymous"></script>
    <style>
        .h1 {
            color: #343661;
        }

        .banner {
            position: relative;
            background: url("/assets/images/breadcrumbs-bg.jpg") no-repeat center center;
            background-size: cover;
            height: 80vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            overflow: hidden;
            z-index: 1;
        }

        /* Overlay Styles */
        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(175, 175, 174, 0.5);
            /* Dark overlay with 50% opacity */
            z-index: 0;
            /* Place overlay behind text */
        }

        .banner-content {
            margin-top: 60px;
            position: relative;
            max-width: 500px;
            animation: fadeInLeft 2s ease-in-out;
            z-index: 1;
            /* Ensure text is above overlay */
            right: -50px;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: slideInLeft 2s ease-out;
            color: #343661;
        }

        .banner p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            line-height: 1.5;
            animation: fadeInUp 2s ease-in-out;
        }

        .btn-custom {
            background-color: #ff5722;
            color: #fff;
            border-radius: 5px;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 600;
            border: none;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #e64a19;
        }

        .cards-container {
            margin-top: 80px;
            display: grid;
            grid-template-columns: repeat(2, 150px);
            grid-template-rows: repeat(2, 150px);
            gap: 7px;
            animation: fadeInRight 2s ease-in-out;
            position: relative;
            z-index: 1;
            /* Ensure cards are above overlay */
            transform: translateX(-60px);
        }

        .card {
            background-color: #646363;
            color: #333;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100px;
            /* Square shape */
            height: 100px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadeInUp 2s ease-in-out, scaleUp 2s ease-in-out;
        }

        .card:hover {
            animation: scaleUpHover 0.5s ease-in-out forwards;
        }

        .card-img-top {
            width: 80%;
            height: 80%;
            object-fit: cover;
        }

        .card-body {
            padding: 0.5rem;
        }

        .card-title {
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .card-text {
            font-size: 0.65rem;
        }

        @media (max-width: 768px) {
            .banner h1 {
                font-size: 2rem;
            }

            .banner p {
                font-size: 1rem;
            }

            .card {
                width: 70px;
                /* Adjust card size for smaller screens */
                height: 70px;
            }
        }

        */
    </style>

    <div class="banner section">
        <div class="banner-content">
            <h1>Selamat Datang</h1>
            <p>Kami menyediakan layanan konstruksi berkualitas tinggi dengan komitmen terhadap keunggulan dan inovasi. Dari
                proyek perumahan hingga komersial, kami mewujudkan impian Anda.</p>
            <a href="{{ route('kontak') }}" class="btn btn-custom">Hubungi Kami</a>
        </div>

        <!--<div class="cards-container">-->
            <!-- Card 1 -->
        <!--    <div class="card">-->
        <!--        <img src="\assets\images\employee-engagement_15332452.gif" class="card-img-top" alt="Service 1">-->
        <!--    </div>-->
            <!-- Card 2 -->
        <!--    <div class="card">-->
        <!--        <img src="\assets\images\folder_15332435.gif" class="card-img-top" alt="Service 2">-->
        <!--    </div>-->
            <!-- Card 3 -->
        <!--    <div class="card">-->
        <!--        <img src="\assets\images\user_14251527.gif" class="card-img-top" alt="Service 3">-->
        <!--    </div>-->
            <!-- Card 4 -->
        <!--    <div class="card">-->
        <!--        <img src="\assets\images\agenda_12205149.gif" class="card-img-top" alt="Service 4">-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    {{-- Visi Perusahaan --}}
    <div class="hero overlay">
        <div class="img-bg rellax">
            <img src="\assets\images\visibg.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="d-flex justify-content-center icon-container col-md-6 border-end border-4">
                    <i class="fa-solid fa-helmet-safety" style="font-size:100px; color: #343661"></i>
                </div>
                <div class="col-md-6">
                    <h1 class="heading mb-6" data-aos="fade-up" style="color: #343661">VISI PERUSAHAAN</h1>
                    <p class="mb-5" data-aos="fade-up">{{ $visi }}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Misi Perusahaan --}}
    <div class="section service-section-1">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="heading-content" data-aos="fade-up">
                        <h2>MISI <span class="d-block">PERUSAHAAN</span></h2>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($misisplit as $index => $item)
                            @if (!empty(trim($item)))
                                <!-- This ensures empty items are skipped -->
                                <div class="col-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                                    <div class="service-1">
                                        <span class="icon">
                                            <img src="{{ asset('assets/frontend') }}/images/svg/05.svg" alt="Image"
                                                class="img-fluid">
                                        </span>
                                        <div>
                                            <h3>Misi {{ $index + 1 }}</h3>
                                            <p>{{ trim($item) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Kebijakan Perusahaan --}}
    <div class="section section-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                    <div class="image-stack mb-5 mb-lg-0">
                        <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up">
                            <img src="\assets\images\contoh_gambar4.jpg" alt="Image" class="img-fluid rellax">
                        </div>
                        <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"
                            data-rellax-percentage="0.5">
                            <img src="\assets\images\contoh_gambar10.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div>
                        <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">KEBIJAKAN PERUSAHAAN</h2>
                        @foreach ($kebijakansplit as $index => $item)
                            @if (!empty(trim($item)))
                                <p data-aos="fade-up" data-aos-delay="200">{{ trim($item) }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Jasa Pelayanan Perusahaan --}}
    <div class="section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0 order-lg-2" data-aos="fade-up">
                    <img src="\assets\images\contoh_gambar9.jpg" alt="Image" class="img-fluid" width="200"
                        height="150">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="heading mb-4">JASA PELAYANAN</h2>
                    @foreach ($jasapelayanansplit as $index => $item)
                        @if (!empty(trim($item)))
                            <!-- This ensures empty items are skipped -->
                            <p>{{ trim($item) }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
