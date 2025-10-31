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
            @forelse($fasilitas as $item)
            <!-- Facility Card -->
            <div class="col-lg-6 mb-5">
                <div class="card h-100 facility-card">
                    @if($item->gambar)
                    <div class="facility-image">
                        <img src="{{ asset('storage/images/fasilitas/' . $item->gambar) }}" alt="{{ $item->nama }}">
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
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    border-radius: 8px;
    background: #fff;
}

.facility-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Facility Card Image - Auto Height untuk gambar full */
.facility-image {
    position: relative;
    width: 100%;
    overflow: hidden;
    background: #f5f5f5;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.facility-image img {
    width: 100%;
    height: auto;
    max-height: 600px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.facility-card:hover .facility-image img {
    transform: scale(1.05);
}

/* Placeholder jika tidak ada gambar */
.facility-image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
}

.facility-image-placeholder i {
    font-size: 5rem;
    color: rgba(255, 255, 255, 0.5);
}

/* Card Body - Simple & Clean */
.facility-card .card-body {
    padding: 2rem 1.5rem;
    background: #fff;
}

/* Facility Title - Bold seperti Program */
.facility-title {
    font-size: 1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1.3;
}

/* Facility Subtitle - Warna orange */
.facility-subtitle {
    font-size: 1rem;
    color: var(--primary-orange);
    font-weight: 500;
    margin-bottom: 0;
    line-height: 1.5;
}

/* Responsive - Tablet */
@media (max-width: 991.98px) {
    .facility-image {
        min-height: 250px;
    }
    
    .facility-image img {
        max-height: 500px;
    }
    
    .facility-title {
        font-size: 0.95rem;
    }
    
    .facility-card .card-body {
        padding: 1.5rem 1.25rem;
    }
}

/* Responsive - Mobile */
@media (max-width: 767.98px) {
    .facility-image {
        min-height: 350px;
    }
    
    .facility-image img {
        max-height: 600px;
        width: 100%;
    }
    
    .facility-title {
        font-size: 0.9rem;
    }
    
    .facility-subtitle {
        font-size: 0.85rem;
    }
    
    .facility-card .card-body {
        padding: 1.25rem 1rem;
    }
}
</style>
@endsection
