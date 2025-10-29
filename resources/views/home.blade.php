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
            <!-- Testimonial Card 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card testimonial-card h-100">
                    <!-- Photo Section (Top Half) -->
                    <div class="testimonial-photo-section">
                        <div class="photo-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <!-- Content Section (Bottom Half) -->
                    <div class="card-body text-center">
                        <div class="testimonial-quote mb-3">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">"Alhamdulillah, sejak bergabung dengan MSA, anak saya menunjukkan perkembangan yang sangat pesat. Tim pengajar sangat sabar dan profesional dalam menangani anak berkebutuhan khusus."</p>
                        <h5 class="testimonial-name">Ibu Sarah</h5>
                        <p class="testimonial-role text-muted">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Card 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card testimonial-card h-100">
                    <!-- Photo Section (Top Half) -->
                    <div class="testimonial-photo-section">
                        <div class="photo-placeholder">
                            <i class="fas fa-user"></i>
                    </div>
                    </div>
                    <!-- Content Section (Bottom Half) -->
                    <div class="card-body text-center">
                        <div class="testimonial-quote mb-3">
                            <i class="fas fa-quote-left"></i>
                </div>
                        <p class="testimonial-text">"Program one-on-one di MSA sangat membantu anak saya dalam meningkatkan kemampuan sosial dan komunikasi. Terima kasih MSA!"</p>
                        <h5 class="testimonial-name">Bapak Ahmad</h5>
                        <p class="testimonial-role text-muted">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Card 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card testimonial-card h-100">
                    <!-- Photo Section (Top Half) -->
                    <div class="testimonial-photo-section">
                        <div class="photo-placeholder">
                            <i class="fas fa-user"></i>
                    </div>
                    </div>
                    <!-- Content Section (Bottom Half) -->
                    <div class="card-body text-center">
                        <div class="testimonial-quote mb-3">
                            <i class="fas fa-quote-left"></i>
                </div>
                        <p class="testimonial-text">"Fasilitas di MSA sangat lengkap dan mendukung kebutuhan anak berkebutuhan khusus. Saya sangat merekomendasikan MSA untuk orang tua yang mencari sekolah terbaik."</p>
                        <h5 class="testimonial-name">Ibu Fitri</h5>
                        <p class="testimonial-role text-muted">Orang Tua Siswa</p>
                    </div>
                </div>
            </div>
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
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                Bagaimana cara mendaftarkan anak saya di Mulia Special Academy?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Anda dapat mendaftarkan anak melalui link pendaftaran online yang tersedia di halaman kontak kami, atau datang langsung ke sekolah untuk konsultasi dan pendaftaran. Tim kami akan membantu Anda dengan proses pendaftaran yang mudah dan cepat.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                Apa saja program yang tersedia di MSA?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                MSA menyediakan berbagai program seperti Toilet Training Program, Pengembangan Akidah Akhlaq, Terapi Perilaku, Terapi Sensori, dan Stimulasi Tahap Perkembangan. Semua program dirancang khusus untuk memenuhi kebutuhan anak berkebutuhan khusus usia 2-6 tahun.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                Bagaimana sistem pembelajaran di Mulia Special Academy?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sistem pembelajaran kami menggunakan pendekatan one-on-one (1:1) dengan stimulasi bertahap yang disesuaikan dengan kebutuhan setiap anak. Kami menggabungkan pendidikan akademik, terapi perkembangan, dan pembentukan karakter dalam program yang terintegrasi.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Apakah ada program konsultasi untuk orang tua?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami menyediakan program konsultasi rutin untuk orang tua, termasuk konseling keluarga, pelatihan keterampilan parenting, dan dukungan emosional. Kolaborasi dengan orang tua adalah kunci keberhasilan pembelajaran anak.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                Berapa biaya pendidikan di Mulia Special Academy?
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Untuk informasi detail mengenai biaya pendidikan, silakan kunjungi halaman kontak kami atau hubungi langsung tim MSA. Kami juga menyediakan brosur digital yang berisi informasi lengkap tentang biaya pendidikan tahun ajaran 2025-2026.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                Apa saja fasilitas yang tersedia di MSA?
                            </button>
                        </h2>
                        <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="faq6" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                MSA dilengkapi dengan fasilitas lengkap seperti Ruang Belajar One-on-One, Ruang Terapi, Playground, Ruang Konsultasi, Toilet khusus anak, dan Kolam Renang. Semua fasilitas dirancang khusus untuk mendukung kebutuhan anak berkebutuhan khusus.
                            </div>
                        </div>
                    </div>
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
    height: 200px;
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

/* Responsive */
@media (max-width: 768px) {
    .testimonial-card {
        margin-bottom: 1.5rem;
    }
    
    .testimonial-text {
        min-height: auto;
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
