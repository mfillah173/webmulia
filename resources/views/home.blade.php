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

<!-- What is MSA & Core Principles Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); position: relative; overflow: hidden;">
    <div class="container">
        <!-- What is MSA Part -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="msa-content">
                    <div class="msa-badge">
                        <span class="badge-text">What is</span>
                    </div>
                    <h1 class="msa-title">MSA</h1>
                    <p class="msa-description">Mulia Special Academy (MSA) adalah sekolah dan pusat terapi yang dirancang khusus untuk anak berkebutuhan khusus mulai usia 2-6 tahun.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="msa-visual">
                    <div class="visual-container">
                        <div class="main-circle">
                            <div class="inner-circle">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        
                        <div class="floating-icons">
                            <div class="icon-item icon-1">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="icon-item icon-2">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="icon-item icon-3">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="icon-item icon-4">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="icon-item icon-5">
                                <div class="pill"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Core Principles Part -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="principles-container">
                    <div class="main-principle">
                        <div class="paperclip-icon">
                            <i class="fas fa-paperclip"></i>
                        </div>
                        <h2 class="principle-title">MULIA SPECIAL ACADEMY</h2>
                    </div>
                    
                    <div class="principles-grid">
                        <div class="principle-card card-1">
                            <div class="card-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h4>Stimulation Centered School</h4>
                            <p>Pendekatan pembelajaran berbasis stimulasi untuk mengoptimalkan perkembangan anak</p>
                        </div>
                        
                        <div class="principle-card card-2">
                            <div class="card-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <h4>Optimization of growth and development of children with special needs</h4>
                            <p>Mengoptimalkan pertumbuhan dan perkembangan anak berkebutuhan khusus secara holistik</p>
                        </div>
                        
                        <div class="principle-card card-3">
                            <div class="card-icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h4>Personal & Holistic Approach</h4>
                            <p>Pendekatan personal dan holistik yang disesuaikan dengan kebutuhan setiap anak</p>
                        </div>
                        
                        <div class="principle-card card-4">
                            <div class="card-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>Development of each child's potential</h4>
                            <p>Mengembangkan potensi unik setiap anak untuk mencapai kemampuan terbaiknya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Syarat Pendaftaran Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">SYARAT PENDAFTARAN</h2>
                
                <div class="row">
                    <!-- Kindergarten Column -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0 fw-bold">Kindergarten</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-child text-primary me-3"></i>
                                            <span class="fw-medium">Children with Special Needs</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt text-primary me-3"></i>
                                            <span class="fw-medium">4 tahun (TK A)</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt text-primary me-3"></i>
                                            <span class="fw-medium">5 tahun (TK B)</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-alt text-primary me-3"></i>
                                            <span class="fw-medium">Akta Kelahiran</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-id-card text-primary me-3"></i>
                                            <span class="fw-medium">Kartu Keluarga</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-camera text-primary me-3"></i>
                                            <span class="fw-medium">Foto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Primary School Column -->
                    <div class="col-lg-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0 fw-bold">Primary School</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-child text-primary me-3"></i>
                                            <span class="fw-medium">Children with Special Needs</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt text-primary me-3"></i>
                                            <span class="fw-medium">6 tahun</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-alt text-primary me-3"></i>
                                            <span class="fw-medium">Akta Kelahiran</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-id-card text-primary me-3"></i>
                                            <span class="fw-medium">Kartu Keluarga</span>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 bg-light">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-camera text-primary me-3"></i>
                                            <span class="fw-medium">Foto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Informasi Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Daftar Harga Section -->
<section class="py-5" style="background: linear-gradient(135deg, rgba(255, 140, 0, 0.05) 0%, rgba(255, 107, 53, 0.05) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center mb-5">BIAYA PENDAFTARAN DAN LAINNYA</h2>
                
                <div class="pricing-container">
                    <!-- Pendaftaran -->
                    <div class="pricing-item">
                        <div class="pricing-label">
                            <span class="pricing-text">Pendaftaran</span>
                        </div>
                        <div class="pricing-price">
                            <span class="price-text">Rp. 350.000</span>
                        </div>
                    </div>
                    
                    <!-- Uang Pangkal -->
                    <div class="pricing-item">
                        <div class="pricing-label">
                            <span class="pricing-text">Uang Pangkal</span>
                        </div>
                        <div class="pricing-price">
                            <span class="price-text">Rp. 5.000.000</span>
                        </div>
                    </div>
                    
                    <!-- Daftar Ulang -->
                    <div class="pricing-item">
                        <div class="pricing-label">
                            <span class="pricing-text">Daftar Ulang</span>
                        </div>
                        <div class="pricing-price">
                            <span class="price-text">Rp. 1.350.000</span>
                        </div>
                    </div>
                    
                    <!-- SPP Kindergarten -->
                    <div class="pricing-item">
                        <div class="pricing-label">
                            <span class="pricing-text">S P P</span>
                            <span class="pricing-subtitle">Equivalent to Kindergarten</span>
                        </div>
                        <div class="pricing-price">
                            <span class="price-text">Rp. 1.650.000</span>
                        </div>
                    </div>
                    
                    <!-- SPP Primary -->
                    <div class="pricing-item">
                        <div class="pricing-label">
                            <span class="pricing-text">S P P</span>
                            <span class="pricing-subtitle">Equivalent to Primary</span>
                        </div>
                        <div class="pricing-price">
                            <span class="price-text">Rp. 2.250.000</span>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ route('kontak') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Informasi Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Links Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center text-white mb-5">LINK PENDAFTARAN DAN INFOMASI TERKAIT</h2>
                
                <div class="links-container">
                    <!-- Link Pendaftaran -->
                    <a href="https://bit.ly/PendaftaranSiswaBaruMuliaSpecialAcademy2025-2026" target="_blank" class="link-item">
                        <div class="link-icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="link-content">
                            <h5 class="link-title">Link Pendaftaran Siswa Baru 2025-2026</h5>
                            <p class="link-url">bit.ly/PendaftaranSiswaBaruMuliaSpecialAcademy2025-2026</p>
                        </div>
                    </a>
                    
                    <!-- Divider -->
                    <div class="link-divider"></div>
                    
                    <!-- Link Informasi Biaya -->
                    <a href="https://heyzine.com/flip-book/9a89e78d26.html" target="_blank" class="link-item">
                        <div class="link-icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="link-content">
                            <h5 class="link-title">Informasi Biaya Pendidikan Mulia Special Academy 2025-2026</h5>
                            <p class="link-url">heyzine.com/flip-book/9a89e78d26.html</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Preview -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Program Unggulan Kami</h2>
        <p class="section-subtitle">Program pembelajaran yang dirancang khusus untuk anak berkebutuhan khusus</p>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-baby fa-2x mb-2"></i>
                        <h4 class="mb-0">Program Kindergarten</h4>
                    </div>
                    <div class="card-body">
                        <p>Program khusus untuk anak usia 3-6 tahun dengan pendekatan stimulasi sensorik dan motorik yang menyenangkan.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Stimulasi sensorik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengembangan motorik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Komunikasi dan bahasa</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-school fa-2x mb-2"></i>
                        <h4 class="mb-0">Program Primary School</h4>
                    </div>
                    <div class="card-body">
                        <p>Program untuk anak usia 6-12 tahun dengan kurikulum yang disesuaikan dengan kemampuan dan kebutuhan khusus.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Kurikulum adaptif</li>
                            <li><i class="fas fa-check text-success me-2"></i>Life skills training</li>
                            <li><i class="fas fa-check text-success me-2"></i>Terapi integrasi</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-hands-helping fa-2x mb-2"></i>
                        <h4 class="mb-0">Program Terapi</h4>
                    </div>
                    <div class="card-body">
                        <p>Program terapi komprehensif termasuk okupasi, fisioterapi, dan terapi wicara untuk mendukung perkembangan optimal.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Terapi okupasi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Fisioterapi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Terapi wicara</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('program') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Berita Terbaru</h2>
        <p class="section-subtitle">Informasi terkini tentang kegiatan dan program di Mulia Special Academy</p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-user-plus fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">15 Desember 2024</span>
                        <h5 class="card-title">Pendaftaran Siswa Baru 2025-2026</h5>
                        <p class="card-text">Mulia Special Academy membuka pendaftaran siswa baru untuk tahun ajaran 2025-2026.</p>
                        <a href="{{ route('berita.show', 1) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-success d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-toilet fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">10 Desember 2024</span>
                        <h5 class="card-title">Manfaat Toilet Training Sejak Dini</h5>
                        <p class="card-text">Pelajari pentingnya toilet training untuk anak berkebutuhan khusus.</p>
                        <a href="{{ route('berita.show', 2) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-warning d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-palette fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">5 Desember 2024</span>
                        <h5 class="card-title">Manfaat Bermain Play Dough</h5>
                        <p class="card-text">Temukan manfaat bermain play dough untuk perkembangan anak.</p>
                        <a href="{{ route('berita.show', 3) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card news-card h-100">
                    <div class="card-img-top bg-info d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-hand-holding-heart fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <span class="news-date">28 November 2024</span>
                        <h5 class="card-title">Mitos vs Fakta: Sensory Play</h5>
                        <p class="card-text">Mengungkap kebenaran tentang sensory play untuk anak berkebutuhan khusus.</p>
                        <a href="{{ route('berita.show', 4) }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('berita.index') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
            </a>
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
