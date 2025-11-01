@extends('layouts.app')

@section('title', 'Kontak - Mulia Special Academy')
@section('description', 'Hubungi Mulia Special Academy untuk informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus')

@section('content')
<!-- Page Header -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Hubungi Kami</h1>
                <p class="section-subtitle">Kami siap membantu Anda dengan informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus</p>
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

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Details -->
            <div class="col-lg-6 mx-auto">
                <div class="contact-info">
                    <h3 class="mb-4">Informasi Kontak</h3>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Alamat</h5>
                            <p>{{ $setting->alamat }}<br>{{ $setting->kota }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Telepon</h5>
                            <p>{{ $setting->telepon }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p>{{ $setting->email }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Jam Operasional</h5>
                            <p>{{ $setting->jam_operasional_senin_jumat }}<br>{{ $setting->jam_operasional_sabtu }}</p>
                        </div>
                    </div>
                    
                </div>

                <!-- Quick Links -->
                <div class="quick-links mt-5">
                    <h4 class="mb-3">Link Cepat</h4>
                    <div class="d-grid gap-2">
                        <a href="https://bit.ly/PendaftaranSiswaBaruMuliaSpecialAcademy2025-2026" 
                           class="btn btn-outline-primary" target="_blank">
                            <i class="fas fa-user-plus me-2"></i>Pendaftaran Online
                        </a>
                        <a href="{{ route('program') }}" class="btn btn-outline-success">
                            <i class="fas fa-graduation-cap me-2"></i>Program Pembelajaran
                        </a>
                        <a href="{{ route('fasilitas') }}" class="btn btn-outline-info">
                            <i class="fas fa-building me-2"></i>Fasilitas Sekolah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Lokasi Sekolah</h2>
        <div class="row">
            <div class="col-12">
                <div class="map-placeholder bg-primary text-white text-center py-5 rounded">
                    <i class="fas fa-map fa-3x mb-3"></i>
                    <h4>Peta Lokasi Mulia Special Academy</h4>
                    <p>Jl. Medokan Semampir Indah 99-101, Surabaya</p>
                    <a href="https://maps.google.com/maps?q=Jl.+Medokan+Semampir+Indah+99-101,+Surabaya" target="_blank" class="btn btn-light">
                        <i class="fas fa-external-link-alt me-2"></i>Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('styles')
<style>
/* Links Container */
.links-container {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.link-item {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
    text-decoration: none;
    color: #2c3e50 !important;
}

.link-item:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.link-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-orange), var(--secondary-orange));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-right: 1.5rem;
    flex-shrink: 0;
}

.link-content {
    flex: 1;
}

.link-title {
    font-weight: 600;
    color: #2c3e50 !important;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.link-url {
    color: #ff8c00 !important;
    margin-bottom: 0;
    font-size: 0.9rem;
    word-break: break-all;
}

.link-divider {
    height: 1px;
    background: #dee2e6;
    margin: 1.5rem 0;
}

/* Contact Info */
.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-details h5 {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.contact-details p {
    color: #666;
    margin-bottom: 0;
}

.map-placeholder {
    min-height: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.quick-links .btn {
    text-align: left;
    border-radius: 0 !important;
    width: 100%;
    padding: 0.75rem 1rem !important;
    font-size: 1rem;
    line-height: 1.5;
    min-height: 48px;
    display: flex;
    align-items: center;
}

/* Page Header - Add more space from navbar */
section.py-5:first-child {
    padding-top: 5.5rem !important;
    padding-bottom: 3rem !important;
}

/* Responsive - Mobile */
@media (max-width: 767.98px) {
    /* Page Header Mobile */
    section.py-5:first-child {
        padding-top: 3.5rem !important;
        padding-bottom: 2rem !important;
    }
    
    .section-title {
        font-size: 1.5rem !important;
        margin-bottom: 0.75rem;
    }
    
    .section-subtitle {
        font-size: 0.9rem !important;
        line-height: 1.5;
    }
    
    /* Important Links Section Mobile */
    section[style*="gradient"] {
        padding: 2rem 0 !important;
    }
    
    section[style*="gradient"] h2 {
        font-size: 1.25rem !important;
        line-height: 1.3;
        margin-bottom: 2rem !important;
        padding: 0 0.5rem;
    }
    
    .links-container {
        padding: 1rem;
    }
    
    .link-item {
        flex-direction: column;
        text-align: center;
        padding: 1rem;
    }
    
    .link-icon {
        margin-right: 0;
        margin-bottom: 1rem;
        width: 45px;
        height: 45px;
        font-size: 1.25rem;
    }
    
    .link-title {
        font-size: 0.95rem;
        line-height: 1.4;
    }
    
    .link-url {
        font-size: 0.8rem;
    }
    
    .link-divider {
        margin: 1rem 0;
    }
    
    /* Contact Info Mobile */
    .contact-info h3 {
        font-size: 1.25rem !important;
        margin-bottom: 1.5rem !important;
    }
    
    .contact-item {
        flex-direction: row;
        text-align: left;
        margin-bottom: 1.5rem;
    }
    
    .contact-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
        margin-right: 1rem;
    }
    
    .contact-details h5 {
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }
    
    .contact-details p {
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    /* Quick Links Mobile */
    .quick-links h4 {
        font-size: 1.1rem !important;
        margin-bottom: 1rem !important;
    }
    
    .quick-links .btn {
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
    }
    
    /* Map Section Mobile */
    .map-placeholder {
        min-height: 250px;
        padding: 2rem 1rem !important;
    }
    
    .map-placeholder h4 {
        font-size: 1.1rem !important;
    }
    
    .map-placeholder p {
        font-size: 0.9rem;
    }
    
    .map-placeholder .btn {
        font-size: 0.9rem;
        padding: 0.75rem 1.25rem;
    }
    
    .map-placeholder i {
        font-size: 2rem !important;
    }
    
    /* Section Spacing Mobile */
    section.py-5 {
        padding: 2rem 0 !important;
    }
}
</style>
@endsection
