@extends('layouts.app')

@section('title', 'Beranda - Mulia Special Academy')
@section('description', 'Sekolah Berbasis Stimulasi for Children with Special Needs - Kindergarten & Primary School di Surabaya')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">Mulia Special Akademik (MSA)</h1>
                    <p class="hero-subtitle">Sekolah dan Pusat Terapi untuk Anak Berkebutuhan Khusus</p>
                    <p class="lead">Mulia Special Akademik (MSA) adalah sekolah dan pusat terapi yang dirancang khusus untuk anak berkebutuhan khusus mulai usia 2-6 tahun. MSA memadukan pendidikan akademik, terapi perkembangan, dan pembentukan karakter melalui sistem stimulasi bertahap dan pembelajaran individual (one-on-one).</p>
                    <div class="hero-buttons">
                        <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-phone me-2"></i>Hubungi Kami
                        </a>
                        <a href="{{ route('program') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-info-circle me-2"></i>Pelajari Program
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <div class="hero-placeholder">
                        <i class="fas fa-graduation-cap" style="font-size: 8rem; opacity: 0.3;"></i>
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
                <h2 class="section-title">Apa Kata Mereka</h2>
                <p class="section-subtitle">Testimoni dari orang tua siswa Mulia Special Academy</p>
                </div>
            </div>
            
        <div class="row">
            @forelse($testimoni as $item)
            <!-- Testimonial Card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card testimonial-card h-100">
                    <!-- Photo Section (Top Half) -->
                    <div class="testimonial-photo-section">
                        @if($item->gambar)
                            <img src="{{ asset('storage/images/testimoni/' . $item->gambar) }}" alt="{{ $item->nama_narasumber }}" style="width: 100%; height: 100%; object-fit: cover;">
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
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card testimonial-card h-100">
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
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
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
/* ========== HERO SECTION STYLES ========== */

/* Hero Section - Desktop */
.hero-section {
    padding-top: 5rem !important;
    padding-bottom: 12rem !important;
    background: linear-gradient(135deg, rgba(255, 140, 0, 0.03) 0%, rgba(255, 107, 107, 0.03) 100%);
}

/* Testimonial Section - Same gradient background */
.hero-section + section.py-5 {
    background: linear-gradient(135deg, rgba(255, 140, 0, 0.03) 0%, rgba(255, 107, 107, 0.03) 100%);
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

.hero-buttons .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 140, 0, 0.3);
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
    
    .hero-section + section.py-5 {
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
        padding-top: 3.5rem !important;
        padding-bottom: 1.5rem !important;
    }
    
    .hero-section + section.py-5 {
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
    
    .hero-buttons .me-3 {
        margin-right: 0 !important;
    }
    
    /* Hide hero image on mobile to save space */
    .hero-image {
        display: none;
    }
}

/* Hero - Extra Small Mobile (< 576px) */
@media (max-width: 575.98px) {
    .hero-section {
        padding-top: 3rem !important;
        padding-bottom: 1.25rem !important;
    }
    
    .hero-section + section.py-5 {
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
    height: 350px; /* Diperbesar dari 200px ke 350px */
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
    min-height: 120px;
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
        height: 300px;
    }
}

/* Responsive - Tablet */
@media (max-width: 991.98px) {
    .testimonial-photo-section {
        height: 300px;
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

/* ========== CALL TO ACTION STYLES ========== */

/* Call to Action - Mobile */
@media (max-width: 767.98px) {
    .bg-primary.text-white {
        padding: 2rem 0 !important;
    }
    
    .bg-primary.text-white h3 {
        font-size: 1.25rem !important;
        margin-bottom: 1rem !important;
        line-height: 1.3;
    }
    
    .bg-primary.text-white p {
        font-size: 0.9rem !important;
        margin-bottom: 1.5rem !important;
        line-height: 1.5;
    }
    
    .bg-primary.text-white .btn {
        width: 100%;
        font-size: 0.95rem;
        padding: 0.75rem 1.5rem;
    }
    
    .bg-primary .text-lg-end {
        text-align: center !important;
        margin-top: 1rem;
    }
}
</style>
@endsection
