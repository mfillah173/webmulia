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
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Belajar+One-on-One" alt="Ruang Belajar One-on-One" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Ruang Belajar One-on-One</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Pencahayaan yang optimal</li>
                            <li><i class="fas fa-check text-success me-2"></i>Akustik yang terkontrol</li>
                            <li><i class="fas fa-check text-success me-2"></i>Furnitur yang dapat disesuaikan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Area khusus untuk sensory break</li>
                            <li><i class="fas fa-check text-success me-2"></i>Teknologi pembelajaran interaktif</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <!-- Ruang Terapi -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Terapi" alt="Ruang Terapi" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-hands-helping fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Ruang Terapi</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Ruang terapi okupasi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Ruang fisioterapi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Ruang terapi wicara</li>
                            <li><i class="fas fa-check text-success me-2"></i>Ruang terapi sensori</li>
                            <li><i class="fas fa-check text-success me-2"></i>Peralatan terapi modern</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <!-- Playground -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Playground" alt="Playground" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-child fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Playground</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Permukaan lunak anti-slip</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pagar pengaman</li>
                            <li><i class="fas fa-check text-success me-2"></i>Alat bermain adaptif</li>
                            <li><i class="fas fa-check text-success me-2"></i>Area teduh</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengawasan penuh</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <!-- Ruang Konsultasi -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Ruang+Konsultasi" alt="Ruang Konsultasi" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-user-friends fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Ruang Konsultasi</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Atmosfer yang menenangkan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Privasi yang terjaga</li>
                            <li><i class="fas fa-check text-success me-2"></i>Alat permainan terapeutik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Rekaman sesi (dengan izin)</li>
                            <li><i class="fas fa-check text-success me-2"></i>Konseling keluarga</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <!-- Toilet -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Toilet" alt="Toilet" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-toilet fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Toilet</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Ukuran yang sesuai untuk anak</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pegangan pengaman</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pencahayaan yang baik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kebersihan terjaga</li>
                            <li><i class="fas fa-check text-success me-2"></i>Aksesibilitas penuh</li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <!-- Kolam Renang -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image">
                        <img src="https://via.placeholder.com/400x250/ff8c00/ffffff?text=Kolam+Renang" alt="Kolam Renang" class="img-fluid">
                        <div class="image-overlay">
                            <i class="fas fa-swimming-pool fa-3x"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Kolam Renang</h3>
                        <!-- <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Kedalaman yang aman</li>
                            <li><i class="fas fa-check text-success me-2"></i>Suhu air yang nyaman</li>
                            <li><i class="fas fa-check text-success me-2"></i>Peralatan keselamatan lengkap</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengawasan instruktur</li>
                            <li><i class="fas fa-check text-success me-2"></i>Terapi air terintegrasi</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
