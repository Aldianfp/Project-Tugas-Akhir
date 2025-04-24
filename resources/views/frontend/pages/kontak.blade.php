<style>
    /* Banner Styles */
    .banner {
        position: relative;
        background: url('/assets/images/cs.jpg') no-repeat center center;
        background-size: cover;
        height: 60vh;
        /* Sesuaikan tinggi banner */
        color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        text-align: center;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 10px;
        /* Ruang antara banner dan konten berikutnya */
        opacity: 0.9;
        /* Transparansi pada keseluruhan banner */
    }

    .banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(17, 17, 17, 0.4);
        /* Overlay gelap dengan opasitas 40% */
        z-index: 0;
        /* Letakkan overlay di bawah konten banner */
    }

    .banner-content {
        position: relative;
        z-index: 1;
        /* Letakkan konten di atas overlay */
        color: rgba(255, 255, 255, 0.9);
        /* Konten teks dengan transparansi */
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

    /* Styling untuk Iframe Peta */
    .iframe-container {
        position: relative;
        padding-bottom: 56.25%;
        /* Rasio aspek 16:9 untuk iframe */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        border-radius: 8px;
        /* Sudut membulat pada container */
        border: 5px solid #64615fe7;
        /* Border dengan warna sesuai dengan desain */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Bayangan untuk memberikan efek kedalaman */
    }

    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        /* Menghapus border default iframe */
        border-radius: 8px;
        /* Sudut membulat pada iframe */
    }
</style>

@extends('frontend.layouts.app')

@section('content')
    <!-- Banner Section -->
    <div class="banner">
        <div class="banner-content" data-aos="fade-up">
            <h1>Hubungi Kami</h1>
            <p>Temukan informasi kontak kami dan cara mudah untuk terhubung dengan tim kami. Kami siap membantu Anda dengan
                pertanyaan atau kebutuhan Anda.</p>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-center mb-5 mt-2">
                <div class="col-md-10 mt-5">
                    <div class="text-center">
                        <div class="iframe-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7674607475415!2d100.38113901054312!3d-0.2892996997066324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5477b4c214083%3A0xed5625c1189c3379!2sCV.%20HKS%20Mandiri%20Kontruksi!5e0!3m2!1sid!2sid!4v1725277216319!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading mb-5">Hubungi Kami</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="open-hours mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">No Telepon:</h4>
                            <p>{{ $contact->no_telepon }}</p>
                        </div>
                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="phone mt-4">
                            <i class="icon-whatsapp"></i>
                            <h4 class="mb-2">Whatsapp:</h4>
                            <p>{{ $contact->whatsapp }}</p>
                        </div>
                        <div class="phone mt-4">
                            <i class="icon-instagram"></i>
                            <h4 class="mb-2">Instagram:</h4>
                            <p>{{ $contact->instagram }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-4">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Alamat:</h4>
                            <p>{{ $contact->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Inisialisasi AOS
    </script>
@endpush
