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
<section class="py-5 bg-light">
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
<section class="py-5 bg-primary text-white">
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
</section>
@endsection

@section('styles')
<style>
/* Testimonial Card Styles */
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

/* Responsive - Mobile */
@media (max-width: 768px) {
    .testimonial-card {
        margin-bottom: 1.5rem;
    }
    
    .testimonial-photo-section {
        height: 280px;
    }
    
    .testimonial-text {
        min-height: auto;
        font-size: 0.95rem;
    }
}

/* FAQ Section Styles */
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
</style>
@endsection
