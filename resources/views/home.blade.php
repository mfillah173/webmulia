@extends('layouts.app')

@section('title', 'Beranda - Mulia Special Academy')
@section('description', 'Sekolah Berbasis Stimulasi for Children with Special Needs - Kindergarten & Primary School di Surabaya')

@section('content')
<!-- Photo Slider Section -->
<!-- 
    PANDUAN FOTO SLIDER:
    - Ukuran Desktop: 2000x700 pixels (landscape)
    - Ukuran Mobile: 768x400 pixels
    - Format: JPG (ukuran file < 300KB untuk performa optimal)
    - Rasio Desktop: 3.25:1
    - Rasio Mobile: 1.92:1
    - Foto akan otomatis di-crop dan di-center agar tidak pecah/distorsi
-->
<section class="hero-slider-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false" data-bs-wrap="true">
        @if($banners && $banners->count() > 0)
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($banners as $index => $banner)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="hero-slide" style="background-image: url('{{ asset('storage/images/media/' . $banner->gambar) }}');">
                    <img src="{{ asset('storage/images/media/' . $banner->gambar) }}" alt="Banner {{ $index + 1 }}" class="hero-slide-img">
                    <div class="hero-slide-overlay"></div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @else
        <!-- Default placeholder jika belum ada banner -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero-slide hero-slide-placeholder-1">
                    <div class="hero-slide-overlay"></div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="hero-slide-title">Selamat Datang di MSA</h2>
                            <p class="hero-slide-subtitle">Mulia Special Akademik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">Mulia Special Academy (MSA)</h1>
                    <p class="hero-subtitle">Sekolah dan Pusat Terapi untuk Anak Berkebutuhan Khusus</p>
                    <p class="lead">Mulia Special Academy (MSA) adalah pusat terapi yang dirancang khusus untuk anak berkebutuhan khusus mulai usia 2-7 tahun. MSA memadukan pendidikan akademik, terapi perkembangan, dan pembentukan karakter melalui sistem stimulasi bertahap dan pembelajaran individual (one-on-one).</p>
                    <div class="hero-buttons">
                        <a href="{{ route('program') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-info-circle me-2"></i>Pelajari Program
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <div class="hero-placeholder">
                        <i class="fas fa-hand-holding-heart" style="font-size: 8rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">TESTIMONIAL</h2>
                <p class="section-subtitle">Testimoni dari orang tua siswa Mulia Special Academy</p>
            </div>
        </div>

        <!-- Testimonial Slider with Navigation -->
        <div class="testimonial-slider-wrapper position-relative">
            <!-- Previous Button -->
            <button class="testimonial-nav-btn testimonial-prev" id="testimonialPrev">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Testimonial Container -->
            <div class="testimonial-container" id="testimonialContainer">
                <div class="testimonial-row">
                    @forelse($testimoni as $item)
                    <!-- Testimonial Card -->
                    <div class="testimonial-item">
                        <div class="card testimonial-card">
                            <!-- Photo Section (Top Half) -->
                            <div class="testimonial-photo-section">
                                @if($item->gambar)
                                <img src="{{ asset('storage/images/media/' . $item->gambar) }}" alt="{{ $item->nama_narasumber }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                <div class="photo-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                                @endif
                            </div>
                            <!-- Content Section (Bottom Half) -->
                            <div class="card-body text-center">
                                <div class="testimonial-quote mb-3">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">"{{ $item->deskripsi }}"</p>
                                <h5 class="testimonial-name">{{ $item->nama_narasumber }}</h5>
                                <p class="testimonial-role text-muted">{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Default Testimonials jika database kosong -->
                    <div class="testimonial-item">
                        <div class="card testimonial-card">
                            <div class="testimonial-photo-section">
                                <div class="photo-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="testimonial-quote mb-3">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <p class="testimonial-text">"Belum ada testimoni. Silakan tambahkan dari panel admin."</p>
                                <h5 class="testimonial-name">Admin</h5>
                                <p class="testimonial-role text-muted">Mulia Special Academy</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Next Button -->
            <button class="testimonial-nav-btn testimonial-next" id="testimonialNext">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">FAQ</h2>
                <p class="section-subtitle">Temukan jawaban atas pertanyaan umum tentang Mulia Special Academy</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="accordion" id="faqAccordion">
                    @forelse($faqs as $index => $faq)
                    <!-- FAQ {{ $index + 1 }} -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq{{ $faq->id }}">
                            <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->pertanyaan }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="faq{{ $faq->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->jawaban }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Default FAQ jika database kosong -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                Bagaimana cara mendaftarkan anak saya di Mulia Special Academy?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Belum ada FAQ. Silakan tambahkan dari panel admin.
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<!-- <section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Siap Memberikan Yang Terbaik untuk Anak Anda?</h3>
                <p class="mb-0">Bergabunglah dengan keluarga besar Mulia Special Academy dan berikan pendidikan terbaik untuk masa depan anak berkebutuhan khusus Anda.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </div>
</section> -->
@endsection
@section('styles')
<style>
    /* ========== CSS RESET - Spesifik untuk Gambar & Slider Saja ========== */
    /* Reset HANYA untuk image containers - tidak menyentuh Bootstrap */
    .hero-slider-section .carousel-inner,
    .hero-slider-section .carousel-item,
    .hero-slider-section .hero-slide,
    .hero-slider-section img,
    .testimonial-photo-section,
    .testimonial-photo-section img {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    /* Image rendering consistency - hanya untuk gambar */
    .hero-slider-section img,
    .testimonial-photo-section img {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        border: 0;
        outline: 0;
    }

    /* Normalize rendering untuk konsistensi cross-browser */
    .hero-slider-section .carousel-inner,
    .hero-slider-section .carousel-item {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        text-size-adjust: 100%;
    }

    /* ========== HERO SLIDER SECTION STYLES ========== */
    .hero-slider-section {
        position: relative;
        width: 100%;
        margin: -90px 0 0;
        padding: 90px 0 0;
        overflow: hidden;
    }

    .carousel-inner,
    .carousel-item {
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        image-rendering: auto;
        -ms-interpolation-mode: bicubic;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        image-orientation: from-image;
        will-change: auto;
    }

    .carousel-fade .carousel-item {
        opacity: 0;
        transition-duration: 1s;
        transition-property: opacity;
    }

    .carousel-fade .carousel-item.active,
    .carousel-fade .carousel-item-next.carousel-item-start,
    .carousel-fade .carousel-item-prev.carousel-item-end {
        opacity: 1;
    }

    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev {
        position: absolute;
        top: 0;
        left: 0;
    }

    .hero-slide {
        height: 700px;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        will-change: transform;
        image-rendering: auto;
        -ms-interpolation-mode: bicubic;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        image-orientation: from-image;
    }

    .hero-slide-img {
        display: none;
        width: 100%;
        height: auto;
    }

    .hero-slide img,
    .hero-slide-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        -o-object-fit: cover; /* Opera fallback */
        object-position: center center;
        display: block;
        image-rendering: auto;
        -ms-interpolation-mode: bicubic;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        backface-visibility: hidden;
        image-orientation: from-image;
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        -moz-transform: translateZ(0);
        will-change: auto;
        max-width: 100%;
        max-height: 100%;
    }

    .hero-slide-img {
        display: none;
    }

    @media (max-width: 767.98px) {
        .hero-slider-section {
            margin-top: -85px;
            padding-top: 115px;
            padding-bottom: 0.5rem;
            margin-bottom: 0;
        }

        .carousel {
            width: 100%;
            position: relative;
        }

        .carousel-inner {
            width: 100%;
            aspect-ratio: 16/9;
            position: relative;
            overflow: hidden;
            border-radius: 0;
        }

        .carousel-item {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-slide {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            min-height: 0;
            background-image: none !important;
            background-color: #ffffff;
            padding: 0;
            overflow: hidden;
            border-radius: 0;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-slide-img {
            display: block !important;
        }

        .hero-slide img,
        .hero-slide-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center center;
            display: block;
            image-rendering: auto;
            -ms-interpolation-mode: bicubic;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            image-orientation: from-image;
            transform: translateZ(0);
            -webkit-transform: translateZ(0);
            will-change: auto;
            max-width: 100%;
            max-height: 100%;
            background-color: #ffffff;
            border-radius: 0;
            position: relative;
            z-index: 1;
        }
    }

    .hero-slide-overlay {
        display: none;
    }

    .hero-slide-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 2rem;
    }

    .hero-slide-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1rem;
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .hero-slide-subtitle {
        font-size: 1.5rem;
        font-weight: 600;
        color: white;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        margin-bottom: 0;
    }

    /* Placeholder slides dengan gradient background */
    .hero-slide-placeholder-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Carousel Controls */
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
        opacity: 0.7;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(255, 255, 255, 0.5);
        opacity: 1;
        -webkit-transform: translateY(-50%) scale(1.05);
        -moz-transform: translateY(-50%) scale(1.05);
        transform: translateY(-50%) scale(1.05);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
    }

    /* Carousel Indicators */
    .carousel-indicators {
        bottom: 20px;
        margin-bottom: 0;
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.6);
        border: none;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
        margin: 0 4px;
        opacity: 0.7;
    }

    .carousel-indicators .active {
        width: 10px;
        border-radius: 50%;
        background-color: white;
        opacity: 1;
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        transform: scale(1.2);
    }

    /* Responsive Slider - Tablet */
    @media (max-width: 991.98px) {
        .hero-slide-title {
            font-size: 2.5rem;
        }

        .hero-slide-subtitle {
            font-size: 1.25rem;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 45px;
            height: 45px;
        }

        .carousel-control-prev {
            left: 15px;
        }

        .carousel-control-next {
            right: 15px;
        }
    }

    /* Responsive Slider - Mobile (Controls & Indicators) */
    @media (max-width: 767.98px) {
        main {
            margin-top: 0 !important;
        }

        .hero-slider-section .container {
            padding: 0 15px;
        }

        .hero-slide-content {
            padding: 1rem;
        }

        .hero-slide-title {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
        }

        .hero-slide-subtitle {
            font-size: 1rem;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 18px;
            height: 18px;
        }

        .carousel-indicators {
            bottom: 15px;
        }

        .carousel-indicators [data-bs-target] {
            width: 8px;
            height: 8px;
            margin: 0 3px;
        }

        .carousel-indicators .active {
            width: 8px;
            height: 8px;
            -webkit-transform: scale(1.3);
            -moz-transform: scale(1.3);
            transform: scale(1.3);
        }
    }

    /* Responsive Slider - Mobile Small */
    @media (max-width: 575.98px) {
        .hero-slider-section {
            margin-top: -80px;
            padding-top: 165px;
            padding-bottom: 0.5rem;
            margin-bottom: 0;
        }

        .hero-slide-title {
            font-size: 1.5rem;
        }

        .hero-slide-subtitle {
            font-size: 0.9rem;
        }
    }

    /* ========== HERO SECTION STYLES ========== */

    /* Hero Section - Desktop */
    .hero-section {
        padding-top: 5rem !important;
        padding-bottom: 10rem !important;
        background: white !important;
        background-color: white !important;
    }

    /* Testimonial Section - White background */
    .hero-section+section.py-5 {
        background: white !important;
        padding-top: 3rem !important;
        padding-bottom: 5rem !important;
    }

    .hero-content {
        padding: 2rem 0;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--primary-orange);
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .hero-content .lead {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 2rem;
        text-align: justify;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-buttons .btn {
        padding: 0.875rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .hero-buttons .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 140, 0, 0.2);
    }

    .hero-placeholder {
        min-height: 400px;
        background: linear-gradient(135deg, rgba(255, 140, 0, 0.1) 0%, rgba(255, 107, 107, 0.1) 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Hero - Tablet (768px - 991px) */
    @media (max-width: 991.98px) {
        .hero-section {
            padding-top: 4rem !important;
            padding-bottom: 2rem !important;
        }

        .hero-section+section.py-5 {
            padding-top: 2.5rem !important;
            padding-bottom: 4rem !important;
        }

        .hero-content {
            padding: 1.5rem 0;
        }

        .hero-title {
            font-size: 2rem;
            margin-bottom: 0.875rem;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            margin-bottom: 1.25rem;
        }

        .hero-content .lead {
            font-size: 1rem;
            margin-bottom: 1.75rem;
        }

        .hero-placeholder {
            min-height: 300px;
            margin-top: 2rem;
        }
    }

    /* Hero - Mobile (< 768px) */
    @media (max-width: 767.98px) {
        .hero-section {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }

        .hero-section+section.py-5 {
            padding-top: 2rem !important;
            padding-bottom: 3rem !important;
        }

        .hero-content {
            padding: 0;
            text-align: center;
        }

        .hero-title {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .hero-subtitle {
            font-size: 1rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .hero-content .lead {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 0.75rem;
        }

        .hero-buttons .btn {
            width: 100%;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
        }

        /* Hide hero image on mobile to save space */
        .hero-image {
            display: none;
        }
    }

    /* Hero - Extra Small Mobile (< 576px) */
    @media (max-width: 575.98px) {
        .hero-section {
            padding-top: 1rem !important;
            padding-bottom: 1.25rem !important;
        }

        .hero-section+section.py-5 {
            padding-top: 1.75rem !important;
            padding-bottom: 2.5rem !important;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .hero-subtitle {
            font-size: 0.95rem;
        }

        .hero-content .lead {
            font-size: 0.85rem;
        }
    }

    /* ========== TESTIMONIAL CARD STYLES ========== */
    .testimonial-card {
        border: 4px solid #FF6B6B;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        background: white;
        display: flex;
        flex-direction: column;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(255, 140, 0, 0.2);
    }

    .testimonial-photo-section {
        width: 100%;
        height: 350px;
        /* Diperbesar untuk desktop agar foto lebih jelas */
        position: relative;
        overflow: hidden;
    }

    .photo-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
    }

    .testimonial-quote {
        font-size: 2rem;
        color: var(--primary-orange);
        opacity: 0.3;
    }

    .testimonial-text {
        font-size: 1rem;
        line-height: 1.8;
        color: #666;
        font-style: italic;
        margin-bottom: 1.5rem;
    }

    .testimonial-name {
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 0.5rem;
    }

    .testimonial-role {
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    /* Responsive - Tablet */
    @media (max-width: 991.98px) {
        .testimonial-photo-section {
            height: 290px;
            /* Diperbesar agar foto tidak terpotong */
        }

        .section-title {
            font-size: 1.75rem;
        }

        .section-subtitle {
            font-size: 0.95rem;
        }
    }

    /* Responsive - Mobile */
    @media (max-width: 767.98px) {
        .testimonial-card {
            margin-bottom: 1.5rem;
            border-width: 3px;
        }

        .testimonial-photo-section {
            height: 280px;
            /* Diperbesar agar foto tidak terpotong */
        }

        .testimonial-card .card-body {
            padding: 1.25rem 1rem;
        }

        .testimonial-text {
            min-height: auto;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .testimonial-quote {
            font-size: 1.5rem;
            margin-bottom: 0.5rem !important;
        }

        .testimonial-name {
            font-size: 1rem;
        }

        .testimonial-role {
            font-size: 0.85rem;
        }

        .photo-placeholder i {
            font-size: 3rem;
        }

        .section-title {
            font-size: 1.5rem !important;
            margin-bottom: 0.75rem;
        }

        .section-subtitle {
            font-size: 0.9rem !important;
            line-height: 1.5;
            margin-bottom: 2rem;
        }

        /* Section spacing mobile */
        section.py-5 {
            padding: 2rem 0 !important;
        }
    }

    /* Responsive - Mobile Small */
    @media (max-width: 575.98px) {
        .testimonial-photo-section {
            height: 250px;
            /* Diperbesar agar foto tidak terpotong */
        }
    }

    /* ========== FAQ SECTION STYLES ========== */
    .accordion-item {
        border: 2px solid #f0f0f0;
        border-radius: 10px !important;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .accordion-button {
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--dark-color);
        background-color: white;
        padding: 1.25rem 1.5rem;
    }

    .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
        color: white;
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: var(--primary-orange);
    }

    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .accordion-body {
        padding: 1.5rem;
        font-size: 1rem;
        line-height: 1.8;
        color: #666;
        background-color: #fafafa;
    }

    /* FAQ Responsive - Mobile */
    @media (max-width: 767.98px) {
        .accordion-button {
            font-size: 0.95rem !important;
            padding: 1rem !important;
            line-height: 1.4;
        }

        .accordion-body {
            padding: 1rem !important;
            font-size: 0.9rem !important;
            line-height: 1.6;
        }
    }

    /* ========== TESTIMONIAL SLIDER STYLES ========== */
    .testimonial-slider-wrapper {
        padding: 0 60px;
        position: relative;
        max-width: 1400px;
        margin: 0 auto;
    }

    .testimonial-container {
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
        padding: 20px 0;
        width: 100%;
        max-width: 1170px;
        /* 3 cards @ 390px = 1170px */
        margin: 0 auto;
    }

    .testimonial-container::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }

    .testimonial-row {
        display: flex;
        flex-wrap: nowrap;
        gap: 0;
        /* Tidak ada gap, pakai padding di item */
    }

    .testimonial-item {
        flex: 0 0 auto;
        width: 390px;
        /* Diperbesar dari 350px ke 390px */
        padding: 0 15px;
    }

    /* Navigation Buttons */
    .testimonial-nav-btn {
        position: absolute;
        top: 220px;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff8c00, #ff6b35);
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 1.2rem;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .testimonial-nav-btn:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 6px 20px rgba(255, 140, 0, 0.5);
    }

    .testimonial-nav-btn:active {
        transform: translateY(-50%) scale(0.95);
    }

    .testimonial-nav-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
        pointer-events: none;
    }

    .testimonial-prev {
        left: 0;
    }

    .testimonial-next {
        right: 0;
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .testimonial-slider-wrapper {
            padding: 0 50px;
            max-width: 1000px;
        }

        .testimonial-container {
            max-width: 700px;
            /* 2 cards @ 350px = 700px */
        }

        .testimonial-nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
            top: 205px;
        }

        .testimonial-item {
            width: 350px;
            /* Diperbesar dari 320px ke 350px */
        }
    }

    @media (max-width: 767.98px) {
        .testimonial-slider-wrapper {
            padding: 0 40px;
            max-width: 500px;
        }

        .testimonial-container {
            max-width: 320px;
            /* Dikurangi sedikit agar tidak terpotong */
        }

        .testimonial-nav-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
            top: 190px;
        }

        .testimonial-prev {
            left: -5px;
        }

        .testimonial-next {
            right: -5px;
        }

        .testimonial-item {
            width: 320px;
            /* Dikurangi agar pas dengan container */
            padding: 0 10px;
            /* Padding dikurangi untuk mobile */
        }
    }

    @media (max-width: 575.98px) {
        .testimonial-slider-wrapper {
            padding: 0 35px;
            max-width: 400px;
        }

        .testimonial-container {
            max-width: 300px;
            /* Dikurangi sedikit agar tidak terpotong */
        }

        .testimonial-nav-btn {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
            top: 180px;
        }

        .testimonial-item {
            width: 300px;
            /* Dikurangi agar pas dengan container */
            padding: 0 10px;
            /* Padding dikurangi untuk mobile */
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ========== AUTO-SLIDE CAROUSEL ==========
        // Inisialisasi carousel dengan autoplay (non-stop)
        const heroCarousel = document.getElementById('heroCarousel');
        if (heroCarousel) {
            const carousel = new bootstrap.Carousel(heroCarousel, {
                interval: 5000,  // 5 detik per slide
                wrap: true,      // Loop infinite
                pause: false,    // TIDAK pause - terus berjalan
                ride: 'carousel' // Auto-start
            });

            // Force start carousel setelah page load
            carousel.cycle();
        }

        // ========== TESTIMONIAL SLIDER ==========
        const container = document.getElementById('testimonialContainer');
        const prevBtn = document.getElementById('testimonialPrev');
        const nextBtn = document.getElementById('testimonialNext');

        if (container && prevBtn && nextBtn) {
            // Get scroll amount based on viewport
            function getScrollAmount() {
                if (window.innerWidth <= 575) return 300; // Mobile small: 1 card @ 300px
                if (window.innerWidth <= 767) return 320; // Mobile: 1 card @ 320px
                if (window.innerWidth <= 991) return 350; // Tablet: 1 card @ 350px
                return 390; // Desktop: 1 card @ 390px
            }

            prevBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: -getScrollAmount(),
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: getScrollAmount(),
                    behavior: 'smooth'
                });
            });

            // Hide/show buttons based on scroll position
            function updateButtons() {
                const scrollLeft = container.scrollLeft;
                const maxScroll = container.scrollWidth - container.clientWidth;

                // Disable prev button if at start
                if (scrollLeft <= 5) {
                    prevBtn.setAttribute('disabled', 'true');
                } else {
                    prevBtn.removeAttribute('disabled');
                }

                // Disable next button if at end
                if (scrollLeft >= maxScroll - 5) {
                    nextBtn.setAttribute('disabled', 'true');
                } else {
                    nextBtn.removeAttribute('disabled');
                }
            }

            container.addEventListener('scroll', updateButtons);
            updateButtons(); // Initial check

            // Update on window resize
            window.addEventListener('resize', function() {
                updateButtons();
            });
        }
    });
</script>
@endsection