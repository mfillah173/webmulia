@extends('layouts.app')

@section('title', 'Kontak - Mulia Special Academy')
@section('description', 'Hubungi Mulia Special Academy untuk informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus')

@section('content')
<!-- Page Header -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">CONTACT US</h1>
                <p class="section-subtitle">Kami siap membantu Anda dengan informasi lebih lanjut tentang program pembelajaran untuk anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact Details -->
            <div class="col-lg-8 col-xl-7">
                <div class="contact-info-card">
                    <h3 class="contact-info-title">Informasi Kontak</h3>
                    
                    <div class="contact-items-wrapper">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Alamat</h5>
                                <p>{{ $setting->alamat }}<br>{{ $setting->kota }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Telepon</h5>
                                <p>{{ $setting->telepon }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Email</h5>
                                <p>{{ $setting->email }}</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Jam Operasional</h5>
                                <p>{{ $setting->jam_operasional_senin_jumat }}<br>{{ $setting->jam_operasional_sabtu }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="quick-links-card">
                    <h4 class="quick-links-title">Link Cepat</h4>
                    <div class="quick-links-grid">
                        <a href="https://bit.ly/PendaftaranSiswaBaruMuliaSpecialAcademy2025-2026" 
                           class="quick-link-btn btn-outline-primary" target="_blank">
                            <i class="fas fa-user-plus"></i>
                            <span>Pendaftaran Online</span>
                        </a>
                        <a href="{{ route('program') }}" class="quick-link-btn btn-outline-success">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Program Pembelajaran</span>
                        </a>
                        <a href="{{ route('fasilitas') }}" class="quick-link-btn btn-outline-info">
                            <i class="fas fa-building"></i>
                            <span>Fasilitas Sekolah</span>
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
        <h2 class="section-title">School Location</h2>
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
    /* Contact Info Card */
    .contact-info-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        margin-bottom: 2rem;
        transition: box-shadow 0.3s ease;
    }

    .contact-info-card:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .contact-info-title {
        color: var(--dark-color);
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--primary-color);
        text-align: center;
    }

    /* Contact Items Wrapper */
    .contact-items-wrapper {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* Contact Item */
    .contact-item {
        display: flex;
        align-items: flex-start;
        padding: 1.25rem;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .contact-item:hover {
        background: #ffffff;
        border-color: var(--primary-color);
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .contact-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        margin-right: 1.25rem;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .contact-item:hover .contact-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .contact-details {
        flex: 1;
    }

    .contact-details h5 {
        color: var(--dark-color);
        margin-bottom: 0.5rem;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.3px;
    }

    .contact-details p {
        color: #555;
        margin-bottom: 0;
        line-height: 1.7;
        font-size: 1rem;
    }
    
    /* Quick Links Card */
    .quick-links-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        transition: box-shadow 0.3s ease;
    }

    .quick-links-card:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .quick-links-title {
        color: var(--dark-color);
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--primary-color);
        text-align: center;
    }

    .quick-links-grid {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .quick-link-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid;
        min-height: 56px;
        text-align: center;
    }

    .quick-link-btn i {
        font-size: 1.2rem;
    }

    .quick-link-btn.btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
        background: rgba(13, 110, 253, 0.05);
    }

    .quick-link-btn.btn-outline-primary:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(13, 110, 253, 0.3);
    }

    .quick-link-btn.btn-outline-success {
        color: #198754;
        border-color: #198754;
        background: rgba(25, 135, 84, 0.05);
    }

    .quick-link-btn.btn-outline-success:hover {
        background: #198754;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(25, 135, 84, 0.3);
    }

    .quick-link-btn.btn-outline-info {
        color: #0dcaf0;
        border-color: #0dcaf0;
        background: rgba(13, 202, 240, 0.05);
    }

    .quick-link-btn.btn-outline-info:hover {
        background: #0dcaf0;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(13, 202, 240, 0.3);
    }

    /* Map Placeholder */
    .map-placeholder {
        min-height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .contact-info-card,
        .quick-links-card {
            padding: 2rem;
        }
    }

    @media (max-width: 767.98px) {
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

        .contact-info-card,
        .quick-links-card {
            padding: 1.5rem;
            border-radius: 12px;
        }

        .contact-info-title,
        .quick-links-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .contact-item {
            padding: 1rem;
            border-radius: 10px;
        }

        .contact-item:hover {
            transform: translateX(0);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            font-size: 1.2rem;
            margin-right: 1rem;
        }

        .contact-details h5 {
            font-size: 1rem;
        }

        .contact-details p {
            font-size: 0.9rem;
        }

        .quick-link-btn {
            padding: 0.875rem 1.25rem;
            font-size: 0.95rem;
            min-height: 52px;
        }

        .quick-link-btn i {
            font-size: 1.1rem;
        }

        .map-placeholder {
            min-height: 250px;
            padding: 2rem 1rem !important;
        }
    }

    @media (max-width: 575.98px) {
        .contact-info-card,
        .quick-links-card {
            padding: 1.25rem;
        }

        .contact-items-wrapper {
            gap: 1rem;
        }

        .contact-item {
            padding: 0.875rem;
            flex-direction: column;
            text-align: center;
        }

        .contact-icon {
            margin-right: 0;
            margin-bottom: 0.75rem;
        }

        .contact-details {
            width: 100%;
        }
    }
</style>
@endsection
