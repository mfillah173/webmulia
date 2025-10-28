@extends('layouts.app')

@section('title', 'Fasilitas - Mulia Special Academy')
@section('description', 'Fasilitas lengkap dan modern untuk mendukung pembelajaran anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">Fasilitas Kami</h1>
                <p class="section-subtitle">Fasilitas lengkap dan modern yang dirancang khusus untuk mendukung pembelajaran dan perkembangan anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Ruang Belajar One-on-One -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'ruang-belajar-one-on-one') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Belajar+One-on-One" alt="Ruang Belajar One-on-One" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Ruang Belajar One-on-One</h3>
                            <p class="lead">Ruang pembelajaran individual yang dirancang khusus untuk pembelajaran one-on-one dengan fasilitas yang mendukung konsentrasi dan fokus anak.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Pencahayaan yang optimal</li>
                                <li><i class="fas fa-check text-success me-2"></i>Akustik yang terkontrol</li>
                                <li><i class="fas fa-check text-success me-2"></i>Furnitur yang dapat disesuaikan</li>
                                <li><i class="fas fa-check text-success me-2"></i>Area khusus untuk sensory break</li>
                                <li><i class="fas fa-check text-success me-2"></i>Teknologi pembelajaran interaktif</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ruang Terapi -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'ruang-terapi') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Terapi" alt="Ruang Terapi" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-hands-helping fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Ruang Terapi</h3>
                            <p class="lead">Fasilitas terapi lengkap dengan peralatan modern untuk berbagai jenis terapi yang dibutuhkan anak berkebutuhan khusus.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Ruang terapi okupasi</li>
                                <li><i class="fas fa-check text-success me-2"></i>Ruang fisioterapi</li>
                                <li><i class="fas fa-check text-success me-2"></i>Ruang terapi wicara</li>
                                <li><i class="fas fa-check text-success me-2"></i>Ruang terapi sensori</li>
                                <li><i class="fas fa-check text-success me-2"></i>Peralatan terapi modern</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Playground -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'playground') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Playground" alt="Playground" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-child fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Playground</h3>
                            <p class="lead">Area bermain outdoor yang aman dan dirancang khusus untuk anak berkebutuhan khusus dengan berbagai alat bermain yang mendukung perkembangan motorik dan sosial.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Permukaan lunak anti-slip</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pagar pengaman</li>
                                <li><i class="fas fa-check text-success me-2"></i>Alat bermain adaptif</li>
                                <li><i class="fas fa-check text-success me-2"></i>Area teduh</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pengawasan penuh</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ruang Konsultasi -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'ruang-konsultasi') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Konsultasi" alt="Ruang Konsultasi" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-user-friends fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Ruang Konsultasi</h3>
                            <p class="lead">Ruang konsultasi yang nyaman untuk sesi konsultasi dengan orang tua dan tim profesional.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Atmosfer yang menenangkan</li>
                                <li><i class="fas fa-check text-success me-2"></i>Privasi yang terjaga</li>
                                <li><i class="fas fa-check text-success me-2"></i>Alat permainan terapeutik</li>
                                <li><i class="fas fa-check text-success me-2"></i>Rekaman sesi (dengan izin)</li>
                                <li><i class="fas fa-check text-success me-2"></i>Konseling keluarga</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Toilet -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'toilet') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Toilet" alt="Toilet" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-toilet fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Toilet</h3>
                            <p class="lead">Fasilitas toilet yang dirancang khusus untuk anak berkebutuhan khusus dengan ukuran dan fitur yang sesuai kebutuhan.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Ukuran yang sesuai untuk anak</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pegangan pengaman</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pencahayaan yang baik</li>
                                <li><i class="fas fa-check text-success me-2"></i>Kebersihan terjaga</li>
                                <li><i class="fas fa-check text-success me-2"></i>Aksesibilitas penuh</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kolam Renang -->
            <div class="col-lg-6 mb-5">
                <a href="{{ route('fasilitas.show', 'kolam-renang') }}" class="text-decoration-none">
                    <div class="card h-100 facility-card">
                        <div class="facility-image">
                            <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Kolam+Renang" alt="Kolam Renang" class="img-fluid">
                            <div class="image-overlay">
                                <i class="fas fa-swimming-pool fa-3x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Kolam Renang</h3>
                            <p class="lead">Kolam renang khusus untuk terapi air dan aktivitas fisik yang mendukung perkembangan motorik anak berkebutuhan khusus.</p>
                            <!-- <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Kedalaman yang aman</li>
                                <li><i class="fas fa-check text-success me-2"></i>Suhu air yang nyaman</li>
                                <li><i class="fas fa-check text-success me-2"></i>Peralatan keselamatan lengkap</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pengawasan instruktur</li>
                                <li><i class="fas fa-check text-success me-2"></i>Terapi air terintegrasi</li>
                            </ul> -->
                            <div class="mt-3">
                                <span class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Safety & Security -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Keamanan & Keselamatan</h2>
        <p class="section-subtitle">Prioritas utama kami adalah keamanan dan keselamatan setiap anak</p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Keamanan 24/7</h4>
                    <p>Sistem keamanan berkelanjutan dengan CCTV dan petugas keamanan.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4>Tim Medis</h4>
                    <p>Tim medis yang siap siaga untuk menangani keadaan darurat.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-fire-extinguisher"></i>
                    </div>
                    <h4>Protokol Darurat</h4>
                    <p>Protokol keselamatan yang jelas untuk berbagai situasi darurat.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Pengawasan Ketat</h4>
                    <p>Rasio pengawasan yang optimal untuk memastikan keamanan setiap anak.</p>
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
                <h3 class="mb-3">Ingin Melihat Fasilitas Kami Secara Langsung?</h3>
                <p class="mb-0">Jadwalkan kunjungan ke Mulia Special Academy untuk melihat fasilitas kami dan bertemu dengan tim pengajar.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-calendar-alt me-2"></i>Jadwalkan Kunjungan
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
