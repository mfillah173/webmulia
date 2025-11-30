@extends('layouts.app')

@section('title', 'Fasilitas - Mulia Special Academy')
@section('description', 'Fasilitas lengkap dan modern untuk mendukung pembelajaran anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="section-title">OUR FACILITIES</h1>
                <p class="section-subtitle">Fasilitas lengkap dan modern yang dirancang khusus untuk mendukung pembelajaran dan perkembangan anak berkebutuhan khusus</p>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($fasilitas as $item)
            <!-- Facility Card -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    @if($item->gambar)
                    <div class="facility-image">
                        <img src="{{ asset('storage/images/media/' . $item->gambar) }}" alt="{{ $item->nama }}">
                    </div>
                    @else
                    <div class="facility-image facility-image-placeholder">
                        <i class="fas fa-building"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <h3 class="facility-title">{{ $item->nama }}</h3>
                    </div>
                </div>
            </div>
            @empty
            <!-- Default Facilities jika database kosong -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    <div class="facility-image facility-image-placeholder">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-body">
                        <h3 class="facility-title">BELUM ADA FASILITAS</h3>
                        <p class="facility-subtitle">Silakan tambahkan fasilitas dari panel admin</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>




@endsection

@section('styles')
<style>
/* ========== CSS RESET - Spesifik untuk Gambar Fasilitas Saja ========== */
/* Reset HANYA untuk image containers - tidak menyentuh Bootstrap */
.facility-image,
.facility-image img {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

/* Image rendering consistency */
.facility-image img {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    border: 0;
    outline: 0;
}

/* Normalize rendering untuk konsistensi cross-browser */
.facility-image {
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    text-size-adjust: 100%;
}

/* Page Header Section */
.page-header-section {
    padding-top: 5rem;
    padding-bottom: 2rem;
}

@media (min-width: 992px) {
    .page-header-section {
        padding-top: 6rem;
        padding-bottom: 2rem;
    }
}

@media (max-width: 768px) {
    .page-header-section {
        padding-top: 4rem;
        padding-bottom: 1.5rem;
    }
}

/* Facility Card Styling */
.facility-card {
    background: transparent;
    border-radius: 0;
    overflow: visible;
    box-shadow: none;
    transition: 0.35s ease;
    border: none;
}

.facility-card:hover {
    transform: translateY(0);
    box-shadow: none;
}

/* Facility Image - Landscape 16:9 */
.facility-image {
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
    background: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    margin-bottom: 20px;
}

.facility-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: .5s ease;
    image-rendering: auto;
    -ms-interpolation-mode: bicubic;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.facility-card:hover .facility-image img {
    transform: scale(1.0);
}

/* Card Body */
.facility-card .card-body {
    padding: 0 20px 30px 20px;
    text-align: center;
}

.facility-title {
    font-size: 1rem;
    font-weight: 600;
    color: #2b2b2b;
    margin-bottom: 10px;
    line-height: 1.4;
}

.facility-subtitle {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 0;
    font-weight: 400;
}

@media(max-width: 768px) {
    .section-title {
        font-size: 1.5rem !important;
    }

    .facility-image {
        aspect-ratio: 16/9;
        height: auto;
        min-height: 200px;
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .facility-card .card-body {
        padding: 0 20px 25px 20px;
        text-align: center;
    }

    .facility-title {
        font-size: 0.95rem;
    }

    .facility-subtitle {
        font-size: 0.95rem;
        line-height: 1.5;
    }
}
</style>
@endsection
