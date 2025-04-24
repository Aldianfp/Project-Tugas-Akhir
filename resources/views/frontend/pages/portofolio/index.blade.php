<style>
    /* Banner Styles */
    .banner {
        position: relative;
        background: url('/assets/images/breadcrumbs-bg.jpg') no-repeat center center;
        background-size: cover;
        height: 60vh;
        /* Sesuaikan tinggi banner */
        color: #b6b6b6;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-align: center;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 15px;
        /* Ruang antara banner dan konten berikutnya */
        opacity: 0.8;
        /* Transparansi pada keseluruhan banner */
    }

    .banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        /* Overlay gelap dengan opasitas 30% */
        z-index: 0;
        /* Letakkan overlay di bawah konten banner */
    }

    .banner-content {
        position: relative;
        z-index: 1;
        /* Letakkan konten di atas overlay */
    }

    .banner h1 {
        font-size: 3rem;
        margin: 0;
        font-weight: 700;
        animation: fadeInUp 1.5s ease-out;
        color: #fff;
    }

    .banner p {
        font-size: 1.25rem;
        margin-top: 0.5rem;
        animation: fadeInUp 2s ease-out;
        color: #fff;
    }

    .banner .btn-custom {
        background-color: #ff5722;
        color: #fff;
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: 600;
        border: none;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 1rem;
    }

    /* Banner Content Styles */
    .banner-content {
        position: relative;
        z-index: 1;
        /* Letakkan konten di atas overlay */
        color: rgba(255, 255, 255, 0.9);
        /* Konten teks dengan transparansi */
        margin-top: 60px;
    }

    /* Banner Button Styles */
    .banner .btn-custom {
        background-color: rgba(255, 87, 34, 0.9);
        /* Warna latar belakang dengan transparansi */
        color: #fff;
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        text-transform: uppercase;
        font-weight: 600;
        border: none;
        transition: background-color 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 1rem;
    }


    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Media Entry Styles */
    .media-entry {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .media-entry:hover {
        transform: translateY(-5px);
        /* Efek mengangkat saat hover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Bayangan lebih kuat saat hover */
    }

    .media-entry img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .media-entry:hover img {
        transform: scale(1.1);
        /* Zoom in pada gambar saat hover */
    }

    .bg-white.m-body {
        padding: 15px;
        border-radius: 0 0 8px 8px;
        background: #fff;
        transition: background-color 0.3s ease;
    }

    .bg-white.m-body:hover {
        background-color: #f8f9fa;
        /* Warna latar belakang sedikit berbeda saat hover */
    }

    /* Date Style */
    .date {
        display: block;
        font-size: 0.875rem;
        color: #6c757d;
        margin-bottom: 10px;
    }

    /* Title and Description Styles */
    h3 a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s ease;
    }

    h3 a:hover {
        color: #ff5722;
        /* Warna teks saat hover */
    }

    h5 a {
        text-decoration: none;
        color: #ff5722;
    }

    h5 a:hover {
        text-decoration: underline;
    }

    p {
        margin-bottom: 15px;
        line-height: 1.6;
        color: #555;
    }

    /* More Link Styles */
    .more {
        display: inline-flex;
        align-items: center;
        color: #ff5722;
        font-weight: 600;
        text-decoration: none;
    }

    .more .label {
        margin-right: 5px;
    }

    .more .arrow {
        display: flex;
        align-items: center;
        transition: color 0.3s ease;
    }

    .more:hover .arrow {
        color: #e64a19;
        /* Warna panah saat hover */
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">



@extends('frontend.layouts.app')
@section('content')
    <div class="banner">
        <div class="banner-content" data-aos="fade-up">
            <h1>Selamat Datang di Pengalaman Perusahaan Kami</h1>
            <p>Menawarkan layanan konstruksi berkualitas dengan komitmen terhadap keunggulan dan inovasi. Lihat lebih lanjut
                tentang proyek kami dan bagaimana kami dapat membantu mewujudkan impian Anda.</p>
            {{-- <a href="#contact" class="btn-custom">Hubungi Kami</a> --}}
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                    <h3 class="mb-5 mt-3">Pengalaman Perusahaan</h3>
                </div>
            </div>
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="media-entry" data-aos="zoom-in" data-aos-delay="200">
                            <a href="{{ route('portofolio.show', $item->slug) }}">
                                <img src="{{ $item->gambar_utama() }}" alt="Image" class="img-fluid gambarportofolio">
                            </a>
                            <div class="bg-white m-body">
                                <h5><a href="{{ route('portofolio.show', $item->slug) }}">{{ $item->nama }}</a></h3>
                                <h3><a href="{{ route('portofolio.show', $item->slug) }}">
                                        Periode Pelaksanaan : {{ $item->tanggal_awal->format('d/m/y') }} -
                                        {{ $item->tanggal_akhir->format('d/m/y') }}
                                    </a>
                                </h5>
                                <p>{{ \Str::limit($item->deskripsi, 130) }}</p>

                                <a href="{{ route('portofolio.show', $item->slug) }}"
                                    class="more d-flex align-items-end float-end">
                                    <span class="label">Lihat Selengkapnya</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
{{-- <script>
    AOS.init(); // Inisialisasi AOS
</script> --}}
