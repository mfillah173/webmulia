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
                            <p>Jl. Medokan Semampir Indah 99-101<br>Surabaya, Jawa Timur</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Telepon</h5>
                            <p>082 338 414 452</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Email</h5>
                            <p>msa@saim.sch.id</p>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00</p>
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
}

@media (max-width: 768px) {
    .contact-item {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}
</style>
@endsection
