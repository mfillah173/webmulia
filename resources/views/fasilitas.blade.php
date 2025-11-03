@extends('layouts.app')

@section('title', 'Fasilitas - Mulia Special Academy')
@section('description', 'Fasilitas lengkap dan modern untuk mendukung pembelajaran anak berkebutuhan khusus di Mulia Special Academy')

@section('content')
<!-- Page Header -->
<section class="py-5">
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
/* Facility Card Styling - Simple & Clean seperti Program */
.facility-card {
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 10px 22px rgba(0,0,0,0.08);
    transition: 0.35s ease;
    border: 1px solid rgba(224, 200, 150, 0.35);
}

.facility-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.12);
}

/* Facility Card Image - Auto Height untuk gambar full */
.facility-image {
    width: 100%;
    aspect-ratio: 4/3; /* Rasio 4:3 untuk gambar lebih proporsional (landscape) */
    overflow: hidden;
    background: #f9f8f4;
    display: flex;
    justify-content: center;
    align-items: center;
}

.facility-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .5s ease;
}

.facility-card:hover .facility-image img {
    transform: scale(1.06);
}

/* Card Body - Simple & Clean */
.facility-card .card-body {
    padding: 18px 24px;
    background: #fff;
}

/* Facility Title - Bold seperti Program */
.facility-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2b2b2b;
    margin-bottom: 8px;
}

/* Facility Subtitle - Warna orange */
.facility-subtitle {
    font-size: .85rem;
    line-height: 1.4;
    color: #ff8c00;
    margin-bottom: 0;
}

@media(max-width: 768px) {
    .facility-image {
        aspect-ratio: 4/3; /* Rasio sama di mobile */
    }

    .facility-card .card-body {
        padding: 18px;
    }

    .facility-title {
        font-size: 1.15rem;
    }
}
</style>
@endsection
